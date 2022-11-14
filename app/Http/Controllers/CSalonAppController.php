<?php

namespace App\Http\Controllers;

use App\Models\CSalonApp;
use App\Http\Requests\StoreCSalonAppRequest;
use App\Http\Requests\UpdateCSalonAppRequest;

class CSalonAppController extends Controller
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
     * @param  \App\Http\Requests\StoreCSalonAppRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCSalonAppRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CSalonApp  $cSalonApp
     * @return \Illuminate\Http\Response
     */
    public function show(CSalonApp $cSalonApp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CSalonApp  $cSalonApp
     * @return \Illuminate\Http\Response
     */
    public function edit(CSalonApp $cSalonApp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCSalonAppRequest  $request
     * @param  \App\Models\CSalonApp  $cSalonApp
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCSalonAppRequest $request, CSalonApp $cSalonApp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CSalonApp  $cSalonApp
     * @return \Illuminate\Http\Response
     */
    public function destroy(CSalonApp $cSalonApp)
    {
        //
    }
}
