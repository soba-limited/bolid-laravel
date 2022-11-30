<?php

namespace App\Http\Controllers;

use App\Models\CPostBookmark;
use App\Http\Requests\StoreCPostBookmarkRequest;
use App\Http\Requests\UpdateCPostBookmarkRequest;
use App\Models\CCat;
use App\Models\CTag;
use Illuminate\Http\Request;

class CPostBookmarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        //
        $cat_list = CCat::get();
        $post = new CPost;
        $tag_list = CTag::withCount('CPosts')->orderBy('c_posts_count', 'desc')->limit(20)->get();

        $post = $post->whereHas('CPostBookmarks', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        });

        $limit = 12;

        $count = $post->count();
        $page_max = $count % $limit > 0 ? floor($count / $limit) + 1: $count / $limit;

        $post = $post->limit($limit)->with('CTags')->with(['user.CProfile'])->get();

        $allarray = [
            'post' => $post,
            'page_max' => $page_max,
            'now_page' => 1,
            'cat_list' => $cat_list,
            'tag_list' => $tag_list,
        ];

        return $this->jsonResponse($allarray);
    }

    public function search(Request $request, $user_id)
    {
        $cat_list = CCat::get();
        $post = new CPost;
        $tag_list = CTag::withCount('CPosts')->orderBy('c_posts_count', 'desc')->limit(20)->get();

        $post = $post->whereHas('CPostBookmarks', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        });


        $limit = 12;
        $page = $request->page;
        $skip = ($page - 1) * $limit;

        $count = $post->count();
        $page_max = $count % $limit > 0 ? floor($count / $limit) + 1: $count / $limit;

        $post = $post->limit($limit)->skip($skip)->with('CTags')->with(['user.CProfile'])->get();

        $allarray = [
            'post' => $post,
            'page_max' => $page_max,
            'now_page' => $page,
            'cat_list' => $cat_list,
            'tag_list' => $tag_list,
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
     * @param  \App\Http\Requests\StoreCPostBookmarkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCPostBookmarkRequest $request)
    {
        //
        $c_post_bookmark = CPostBookmark::create([
            'user_id'=>$request->user_id,
            'c_post_id'=>$request->c_post_id,
        ]);
        $c_post_bookmarks = CPostBookmark::where('user_id', $request->user_id)->pluck('c_post_id');
        return $this->jsonResponse($c_post_bookmarks);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CPostBookmark  $cPostBookmark
     * @return \Illuminate\Http\Response
     */
    public function show(CPostBookmark $cPostBookmark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CPostBookmark  $cPostBookmark
     * @return \Illuminate\Http\Response
     */
    public function edit(CPostBookmark $cPostBookmark)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCPostBookmarkRequest  $request
     * @param  \App\Models\CPostBookmark  $cPostBookmark
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCPostBookmarkRequest $request, CPostBookmark $cPostBookmark)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CPostBookmark  $cPostBookmark
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $c_post_bookmark = CPostBookmark::where('user_id', $request->user_id)->where('c_post_id', $request->c_post_id)->first();
        $c_post_bookmark->delete();
        $c_post_bookmarks = CPostBookmark::where('user_id', $request->user_id)->pluck('c_post_id');
        return $this->jsonResponse($c_post_bookmarks);
    }

    public function check(Request $request)
    {
        $c_post_bookmark = CPostBookmark::where('user_id', $request->user_id)->pluck('c_post_id');
        return $this->jsonResponse($c_post_bookmark);
    }
}