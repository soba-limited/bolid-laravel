<?php

namespace App\Http\Controllers;

use App\Models\CPostBookmark;
use App\Http\Requests\StoreCPostBookmarkRequest;
use App\Http\Requests\UpdateCPostBookmarkRequest;
use Illuminate\Http\Request;

class CPostBookmarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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