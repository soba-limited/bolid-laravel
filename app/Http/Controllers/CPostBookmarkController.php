<?php

namespace App\Http\Controllers;

use App\Models\CPostBookmark;
use App\Http\Requests\StoreCPostBookmarkRequest;
use App\Http\Requests\UpdateCPostBookmarkRequest;

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
    public function destroy(CPostBookmark $cPostBookmark)
    {
        //
    }
}
