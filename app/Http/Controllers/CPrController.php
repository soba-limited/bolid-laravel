<?php

namespace App\Http\Controllers;

use App\Models\CPr;
use App\Models\User;
use App\Http\Requests\StoreCPrRequest;
use App\Http\Requests\UpdateCPrRequest;
use App\Models\CTag;
use Illuminate\Http\Request;

class CPrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pr = new CPr;

        $pr = $pr->withCount('CPrCounts');

        $limit = 20;

        $count = $pr->count();
        $page_max = $count % $limit > 0 ? floor($count / $limit) + 1: $count / $limit;

        $pr = $pr->limit($limit)->with('CTags')->with(['user.CProfile'])->get();

        $tags = CTag::withCount('CPrs')->orderBy('c_prs_count', 'desc')->limit(10)->get();

        $allarray = [
            'pr' => $pr,
            'page_max' => $page_max,
            'now_page' => 1,
            'tags' => $tags,
        ];

        return $this->jsonResponse($allarray);
    }

    public function search(Request $request)
    {
        //
        $pr = new CPr;

        $pr = $pr->withCount('CPrCounts');

        if (!empty($request->s)) {
            $pr = $pr->where('title', 'like', '%'.$request->s.'%')->orWhere('content', 'like', '%'.$request->s.'%');
        }

        if (!empty($request->sort)) {
            if ($request->sort == 'new') {
                $pr = $pr->orderBy('created_at', 'desc');
            } elseif ($request->sort == 'bookmark') {
                $pr = $pr->orderBy('c_pr_counts_count', 'desc');
            }
        }

        if (!empty($request->tag_id)) {
            $pr = $pr->whereHas('CTags', function ($query) use ($request) {
                $query->where('c_tag_id', $request->tag_id);
            });
        }

        $limit = 12;

        if (!empty($request->page)) {
            $skip = ($request->page - 1) * $limit;
        } else {
            $skip = 0;
        }

        $count = $pr->count();
        $page_max = $count % $limit > 0 ? floor($count / $limit) + 1: $count / $limit;

        $pr = $pr->limit($limit)->skip($skip)->with('CTags')->with(['user.CProfile'])->get();

        $tags = CTag::withCount('CPrs')->orderBy('c_prs_count', 'desc')->limit(10)->get();

        $allarray = [
            'pr' => $pr,
            'page_max' => $page_max,
            'now_page' => $request->page,
            'sort' => $request->sort,
            'tag_id' => $request->tag_id,
            's' => $request->s,
            'tags' => $tags,
        ];

        return $this->jsonResponse($allarray);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCPrRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCPrRequest $request)
    {
        //
        $c_pr = CPr::create([
            'user_id'=>$request->user_id,
            'title'=>$request->title,
            'content'=>$request->content,
        ]);

        $id = $c_pr->id;

        if ($request->hasFile('thumbs')) {
            $thumbs_name = $request->file('thumbs')->getClientOriginalName();
            $request->file('thumbs')->storeAs('images/c_pr/'.$id, $thumbs_name, 'public');
            $thumbs = 'images/c_pr/'.$id."/".$thumbs_name;
            $c_pr->thumbs = $thumbs;
            $c_pr->save();
        }

        $tag_ids = [];

        if (!empty($request->tag)) {
            $tags = explode(",", $request->tag);
            foreach ($tags as $tag) {
                $tag_single = CTag::firstOrCreate(['name'=>$tag]);
                array_push($tag_ids, $tag_single->id);
            }
            foreach ($tag_ids as $tag_id) {
                $c_pr->CTags()->attach($tag_id);
            }
        }

        return $this->jsonResponse($c_pr);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CPr  $cPr
     * @return \Illuminate\Http\Response
     */
    public function show(CPr $cPr, $pr_id)
    {
        //
        $pr = CPr::find($pr_id);
        $user = User::with('CProfile')->find($pr->user_id);
        $allarray = [
            'pr' => $pr,
            'user' => $user,
        ];
        $pr->count = intval($pr->count) + 1;
        $pr->save();
        return $this->jsonResponse($allarray);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CPr  $cPr
     * @return \Illuminate\Http\Response
     */
    public function edit(CPr $cPr, $c_pr_id)
    {
        //
        $c_pr = CPr::with('CTags')->find($c_pr_id);
        return $this->jsonResponse($c_pr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCPrRequest  $request
     * @param  \App\Models\CPr  $cPr
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCPrRequest $request, CPr $cPr, $c_pr_id)
    {
        //
        $c_pr = CSalon::find($c_pr_id);

        if ($request->hasFile('thumbs')) {
            $thumbs_name = $request->file('thumbs')->getClientOriginalName();
            $request->file('thumbs')->storeAs('images/c_pr/'.$c_pr_id, $thumbs_name, 'public');
            $thumbs = 'images/c_pr/'.$c_pr_id."/".$thumbs_name;
        }

        $c_pr->update([
            'user_id'=>$request->user_id,
            'title'=>$request->title,
            'content'=>$request->content,
            'thumbs' => $request->hasFile('thumbs') ? $thumbs : $request->thumbs,
        ]);

        $tag_ids = [];

        if (!empty($request->tag)) {
            $tags = explode(",", $request->tag);
            foreach ($tags as $tag) {
                $tag_single = CTag::firstOrCreate(['name'=>$tag]);
                array_push($tag_ids, $tag_single->id);
            }
            foreach ($tag_ids as $tag_id) {
                $c_pr->CTags()->syncWithoutDetaching($tag_id);
            }
        }

        return $this->jsonResponse($c_pr);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CPr  $cPr
     * @return \Illuminate\Http\Response
     */
    public function destroy(CPr $cPr, Request $request)
    {
        //
        $c_pr = CPr::find($request->c_pr_id);
        $c_pr->delete();
        $c_prs = CPr::with('CTags')->with(['user.CProfile'])->where('user_id', $request->user_id);
        return $this->jsonResponse($c_prs);
    }
}