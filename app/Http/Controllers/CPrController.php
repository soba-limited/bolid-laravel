<?php

namespace App\Http\Controllers;

use App\Models\CPr;
use App\Models\User;
use App\Http\Requests\StoreCPrRequest;
use App\Http\Requests\UpdateCPrRequest;
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

        $allarray = [
            'pr' => $pr,
            'page_max' => $page_max,
            'now_page' => 1,
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

        $allarray = [
            'pr' => $pr,
            'page_max' => $page_max,
            'now_page' => $request->page,
            'sort' => $request->sort,
            'tag_id' => $request->tag_id,
            's' => $request->s,
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
        return $this->jsonResponse($allarray);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CPr  $cPr
     * @return \Illuminate\Http\Response
     */
    public function edit(CPr $cPr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCPrRequest  $request
     * @param  \App\Models\CPr  $cPr
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCPrRequest $request, CPr $cPr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CPr  $cPr
     * @return \Illuminate\Http\Response
     */
    public function destroy(CPr $cPr)
    {
        //
    }
}