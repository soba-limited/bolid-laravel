<?php

namespace App\Http\Controllers;

use App\Models\CProfile;
use App\Http\Requests\StoreCProfileRequest;
use App\Http\Requests\UpdateCProfileRequest;

class CProfileController extends Controller
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
     * @param  \App\Http\Requests\StoreCProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCProfileRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CProfile  $cProfile
     * @return \Illuminate\Http\Response
     */
    public function show(CProfile $cProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CProfile  $cProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(CProfile $cProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCProfileRequest  $request
     * @param  \App\Models\CProfile  $cProfile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCProfileRequest $request, CProfile $cProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CProfile  $cProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(CProfile $cProfile)
    {
        //
    }
}
