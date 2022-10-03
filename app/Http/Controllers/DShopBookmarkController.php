<?php

namespace App\Http\Controllers;

use App\Models\DShopBookmark;
use App\Http\Requests\StoreDShopBookmarkRequest;
use App\Http\Requests\UpdateDShopBookmarkRequest;

class DShopBookmarkController extends Controller
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
     * @param  \App\Http\Requests\StoreDShopBookmarkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDShopBookmarkRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DShopBookmark  $dShopBookmark
     * @return \Illuminate\Http\Response
     */
    public function show(DShopBookmark $dShopBookmark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DShopBookmark  $dShopBookmark
     * @return \Illuminate\Http\Response
     */
    public function edit(DShopBookmark $dShopBookmark)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDShopBookmarkRequest  $request
     * @param  \App\Models\DShopBookmark  $dShopBookmark
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDShopBookmarkRequest $request, DShopBookmark $dShopBookmark)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DShopBookmark  $dShopBookmark
     * @return \Illuminate\Http\Response
     */
    public function destroy(DShopBookmark $dShopBookmark)
    {
        //
    }
}
