<?php

namespace App\Http\Controllers;

use App\Models\DMall;
use App\Http\Requests\StoreDMallRequest;
use App\Http\Requests\UpdateDMallRequest;

class DMallController extends Controller
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
     * @param  \App\Http\Requests\StoreDMallRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDMallRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DMall  $dMall
     * @return \Illuminate\Http\Response
     */
    public function show(DMall $dMall)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DMall  $dMall
     * @return \Illuminate\Http\Response
     */
    public function edit(DMall $dMall)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDMallRequest  $request
     * @param  \App\Models\DMall  $dMall
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDMallRequest $request, DMall $dMall)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DMall  $dMall
     * @return \Illuminate\Http\Response
     */
    public function destroy(DMall $dMall)
    {
        //
    }
}
