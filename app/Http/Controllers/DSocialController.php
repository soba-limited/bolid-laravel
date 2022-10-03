<?php

namespace App\Http\Controllers;

use App\Models\DSocial;
use App\Http\Requests\StoreDSocialRequest;
use App\Http\Requests\UpdateDSocialRequest;

class DSocialController extends Controller
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
     * @param  \App\Http\Requests\StoreDSocialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDSocialRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DSocial  $dSocial
     * @return \Illuminate\Http\Response
     */
    public function show(DSocial $dSocial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DSocial  $dSocial
     * @return \Illuminate\Http\Response
     */
    public function edit(DSocial $dSocial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDSocialRequest  $request
     * @param  \App\Models\DSocial  $dSocial
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDSocialRequest $request, DSocial $dSocial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DSocial  $dSocial
     * @return \Illuminate\Http\Response
     */
    public function destroy(DSocial $dSocial)
    {
        //
    }
}
