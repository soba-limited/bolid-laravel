<?php

namespace App\Http\Controllers;

use App\Models\CTag;
use App\Http\Requests\StoreCTagRequest;
use App\Http\Requests\UpdateCTagRequest;

class CTagController extends Controller
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
     * @param  \App\Http\Requests\StoreCTagRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCTagRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CTag  $cTag
     * @return \Illuminate\Http\Response
     */
    public function show(CTag $cTag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CTag  $cTag
     * @return \Illuminate\Http\Response
     */
    public function edit(CTag $cTag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCTagRequest  $request
     * @param  \App\Models\CTag  $cTag
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCTagRequest $request, CTag $cTag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CTag  $cTag
     * @return \Illuminate\Http\Response
     */
    public function destroy(CTag $cTag)
    {
        //
    }
}
