<?php

namespace App\Http\Controllers;

use App\Models\DMallBookmarks;
use App\Http\Requests\StoreDMallBookmarksRequest;
use App\Http\Requests\UpdateDMallBookmarksRequest;
use Illuminate\Http\Request;

class DMallBookmarksController extends Controller
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
     * @param  \App\Http\Requests\StoreDMallBookmarksRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDMallBookmarksRequest $request)
    {
        //
        $d_mall_bookmark = DMallBookmarks::create([
            'user_id' => $request->user_id,
            'd_mall_id' => $request->d_mall_id,
        ]);
        return 'このモールをブックマークしました';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DMallBookmarks  $dMallBookmarks
     * @return \Illuminate\Http\Response
     */
    public function show(DMallBookmarks $dMallBookmarks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DMallBookmarks  $dMallBookmarks
     * @return \Illuminate\Http\Response
     */
    public function edit(DMallBookmarks $dMallBookmarks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDMallBookmarksRequest  $request
     * @param  \App\Models\DMallBookmarks  $dMallBookmarks
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDMallBookmarksRequest $request, DMallBookmarks $dMallBookmarks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DMallBookmarks  $dMallBookmarks
     * @return \Illuminate\Http\Response
     */
    public function destroy(DMallBookmarks $dMallBookmarks, Request $request)
    {
        //
        $d_post = DMallBookmarks::find($request->shop_id);
        $d_post->delete();
    }
}
