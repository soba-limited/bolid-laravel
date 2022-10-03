<?php

namespace App\Http\Controllers;

use App\Models\DOfficial;
use App\Http\Requests\StoreDOfficialRequest;
use App\Http\Requests\UpdateDOfficialRequest;

class DOfficialController extends Controller
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
     * @param  \App\Http\Requests\StoreDOfficialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDOfficialRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DOfficial  $dOfficial
     * @return \Illuminate\Http\Response
     */
    public function show(DOfficial $dOfficial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DOfficial  $dOfficial
     * @return \Illuminate\Http\Response
     */
    public function edit(DOfficial $dOfficial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDOfficialRequest  $request
     * @param  \App\Models\DOfficial  $dOfficial
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDOfficialRequest $request, DOfficial $dOfficial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DOfficial  $dOfficial
     * @return \Illuminate\Http\Response
     */
    public function destroy(DOfficial $dOfficial)
    {
        //
    }
}
