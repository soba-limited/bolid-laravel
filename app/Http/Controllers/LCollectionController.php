<?php

namespace App\Http\Controllers;

use App\Models\LCollection;
use App\Http\Requests\StoreLCollectionRequest;
use App\Http\Requests\UpdateLCollectionRequest;

class LCollectionController extends Controller
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
     * @param  \App\Http\Requests\StoreLCollectionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLCollectionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LCollection  $lCollection
     * @return \Illuminate\Http\Response
     */
    public function show(LCollection $lCollection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LCollection  $lCollection
     * @return \Illuminate\Http\Response
     */
    public function edit(LCollection $lCollection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLCollectionRequest  $request
     * @param  \App\Models\LCollection  $lCollection
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLCollectionRequest $request, LCollection $lCollection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LCollection  $lCollection
     * @return \Illuminate\Http\Response
     */
    public function destroy(LCollection $lCollection)
    {
        //
    }
}
