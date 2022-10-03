<?php

namespace App\Http\Controllers;

use App\Models\DPickup;
use App\Http\Requests\StoreDPickupRequest;
use App\Http\Requests\UpdateDPickupRequest;

class DPickupController extends Controller
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
     * @param  \App\Http\Requests\StoreDPickupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDPickupRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DPickup  $dPickup
     * @return \Illuminate\Http\Response
     */
    public function show(DPickup $dPickup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DPickup  $dPickup
     * @return \Illuminate\Http\Response
     */
    public function edit(DPickup $dPickup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDPickupRequest  $request
     * @param  \App\Models\DPickup  $dPickup
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDPickupRequest $request, DPickup $dPickup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DPickup  $dPickup
     * @return \Illuminate\Http\Response
     */
    public function destroy(DPickup $dPickup)
    {
        //
    }
}
