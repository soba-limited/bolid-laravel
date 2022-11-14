<?php

namespace App\Http\Controllers;

use App\Models\CLike;
use App\Http\Requests\StoreCLikeRequest;
use App\Http\Requests\UpdateCLikeRequest;

class CLikeController extends Controller
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
     * @param  \App\Http\Requests\StoreCLikeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCLikeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CLike  $cLike
     * @return \Illuminate\Http\Response
     */
    public function show(CLike $cLike)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CLike  $cLike
     * @return \Illuminate\Http\Response
     */
    public function edit(CLike $cLike)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCLikeRequest  $request
     * @param  \App\Models\CLike  $cLike
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCLikeRequest $request, CLike $cLike)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CLike  $cLike
     * @return \Illuminate\Http\Response
     */
    public function destroy(CLike $cLike)
    {
        //
    }
}
