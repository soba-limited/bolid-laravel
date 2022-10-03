<?php

namespace App\Http\Controllers;

use App\Models\DInstaApiToken;
use App\Http\Requests\StoreDInstaApiTokenRequest;
use App\Http\Requests\UpdateDInstaApiTokenRequest;

class DInstaApiTokenController extends Controller
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
     * @param  \App\Http\Requests\StoreDInstaApiTokenRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDInstaApiTokenRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DInstaApiToken  $dInstaApiToken
     * @return \Illuminate\Http\Response
     */
    public function show(DInstaApiToken $dInstaApiToken)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DInstaApiToken  $dInstaApiToken
     * @return \Illuminate\Http\Response
     */
    public function edit(DInstaApiToken $dInstaApiToken)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDInstaApiTokenRequest  $request
     * @param  \App\Models\DInstaApiToken  $dInstaApiToken
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDInstaApiTokenRequest $request, DInstaApiToken $dInstaApiToken)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DInstaApiToken  $dInstaApiToken
     * @return \Illuminate\Http\Response
     */
    public function destroy(DInstaApiToken $dInstaApiToken)
    {
        //
    }
}
