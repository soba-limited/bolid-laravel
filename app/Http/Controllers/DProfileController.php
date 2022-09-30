<?php

namespace App\Http\Controllers;

use App\Models\DProfile;
use App\Http\Requests\StoreDProfileRequest;
use App\Http\Requests\UpdateDProfileRequest;

class DProfileController extends Controller
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
     * @param  \App\Http\Requests\StoreDProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDProfileRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DProfile  $dProfile
     * @return \Illuminate\Http\Response
     */
    public function show(DProfile $dProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DProfile  $dProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(DProfile $dProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDProfileRequest  $request
     * @param  \App\Models\DProfile  $dProfile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDProfileRequest $request, DProfile $dProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DProfile  $dProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(DProfile $dProfile)
    {
        //
    }
}
