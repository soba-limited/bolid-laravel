<?php

namespace App\Http\Controllers;

use App\Models\CPostApp;
use App\Http\Requests\StoreCPostAppRequest;
use App\Http\Requests\UpdateCPostAppRequest;

class CPostAppController extends Controller
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
     * @param  \App\Http\Requests\StoreCPostAppRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCPostAppRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CPostApp  $cPostApp
     * @return \Illuminate\Http\Response
     */
    public function show(CPostApp $cPostApp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CPostApp  $cPostApp
     * @return \Illuminate\Http\Response
     */
    public function edit(CPostApp $cPostApp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCPostAppRequest  $request
     * @param  \App\Models\CPostApp  $cPostApp
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCPostAppRequest $request, CPostApp $cPostApp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CPostApp  $cPostApp
     * @return \Illuminate\Http\Response
     */
    public function destroy(CPostApp $cPostApp)
    {
        //
    }
}
