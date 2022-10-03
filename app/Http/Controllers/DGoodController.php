<?php

namespace App\Http\Controllers;

use App\Models\DGood;
use App\Http\Requests\StoreDGoodRequest;
use App\Http\Requests\UpdateDGoodRequest;

class DGoodController extends Controller
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
     * @param  \App\Http\Requests\StoreDGoodRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDGoodRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DGood  $dGood
     * @return \Illuminate\Http\Response
     */
    public function show(DGood $dGood)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DGood  $dGood
     * @return \Illuminate\Http\Response
     */
    public function edit(DGood $dGood)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDGoodRequest  $request
     * @param  \App\Models\DGood  $dGood
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDGoodRequest $request, DGood $dGood)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DGood  $dGood
     * @return \Illuminate\Http\Response
     */
    public function destroy(DGood $dGood)
    {
        //
    }
}
