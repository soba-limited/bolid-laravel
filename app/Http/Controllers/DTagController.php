<?php

namespace App\Http\Controllers;

use App\Models\DTag;
use App\Http\Requests\StoreDTagRequest;
use App\Http\Requests\UpdateDTagRequest;

class DTagController extends Controller
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
     * @param  \App\Http\Requests\StoreDTagRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDTagRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DTag  $dTag
     * @return \Illuminate\Http\Response
     */
    public function show(DTag $dTag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DTag  $dTag
     * @return \Illuminate\Http\Response
     */
    public function edit(DTag $dTag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDTagRequest  $request
     * @param  \App\Models\DTag  $dTag
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDTagRequest $request, DTag $dTag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DTag  $dTag
     * @return \Illuminate\Http\Response
     */
    public function destroy(DTag $dTag)
    {
        //
    }
}
