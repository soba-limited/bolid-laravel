<?php

namespace App\Http\Controllers;

use App\Models\CPost;
use App\Models\User;
use App\Http\Requests\StoreCPostRequest;
use App\Http\Requests\UpdateCPostRequest;
use Illuminate\Http\Request;

class CPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $post = new CPost;

        $limit = 12;

        $count = $post->count();
        $page_max = $count % $limit > 0 ? floor($count / $limit) + 1: $count / $limit;

        $post = $post->limit($limit)->with('CTags')->with(['user.CProfile'])->get();

        $allarray = [
            'post' => $post,
            'page_max' => $page_max,
            'now_page' => 1,
        ];

        return $this->jsonResponse($allarray);
    }

    public function search(Request $request)
    {
        $post = new CPost;

        if (!empty($request->s)) {
            $post = $post->where('title', 'like', '%'.$request->s.'%')->orWhere('content', 'like', '%'.$request->s.'%');
        }

        if (!empty($request->zip)) {
            $post = $post->whereHas('user', function ($query) use ($request) {
                $query->whereHas('CProfile', function ($query) use ($request) {
                    $query->where('zip', $request->zip);
                });
            });
        }

        if (!empty($request->cat)) {
            $post = $post->where('c_cat_id', $request->cat);
        }

        if (!empty($request->reward)) {
            $post = $post->where('reward', ">=", $request->reward);
        }

        if (!empty($request->tag)) {
            $post = $post->whereHas('CTags', function ($query) use ($request) {
                $query->where('c_tag_id', $request->tag);
            });
        }

        if (!empty($request->sort)) {
            if ($request->sort == 'new') {
                $post = $post->orderBy('id', 'desc');
            } elseif ($request->sort == 'old') {
                $post = $post->orderBy('id', 'asc');
            } elseif ($request->sort == 'reward') {
                $post = $post->orderBy('reward', 'desc');
            } elseif ($request->sort == 'limit_asc') {
                $post= $post->orderBy(CPost::raw('abs(datediff(CURDATE(), limite_date))'), "ASC");
            } elseif ($request->sort == 'limit_desc') {
                $post= $post->orderBy(CPost::raw('abs(datediff(CURDATE(), limite_date))'), "DESC");
            }
        }

        if (!empty($request->state)) {
            $post = $post->where('state', 1);
        }

        $limit = 12;

        $count = $post->count();
        $page_max = $count % $limit > 0 ? floor($count / $limit) + 1: $count / $limit;

        $post = $post->limit($limit)->with('CTags')->with(['user.CProfile'])->get();

        $allarray = [
            'post' => $post,
            'page_max' => $page_max,
            'now_page' => 1,
            's' => $request->s,
            'zip' => $request->zip,
            'cat' => $request->cat,
            'reward' => $request->reward,
            'tag' => $request->tag,
            'sort' => $request->sort,
            'state' => $request->state,
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
     * @param  \App\Http\Requests\StoreCPostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCPostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CPost  $cPost
     * @return \Illuminate\Http\Response
     */
    public function show(CPost $cPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CPost  $cPost
     * @return \Illuminate\Http\Response
     */
    public function edit(CPost $cPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCPostRequest  $request
     * @param  \App\Models\CPost  $cPost
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCPostRequest $request, CPost $cPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CPost  $cPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(CPost $cPost)
    {
        //
    }
}