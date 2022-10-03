<?php

namespace App\Http\Controllers;

use App\Models\DInfo;
use App\Http\Requests\StoreDInfoRequest;
use App\Http\Requests\UpdateDInfoRequest;

class DInfoController extends Controller
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
     * @param  \App\Http\Requests\StoreDInfoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDInfoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DInfo  $dInfo
     * @return \Illuminate\Http\Response
     */
    public function show(DInfo $dInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DInfo  $dInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(DInfo $dInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDInfoRequest  $request
     * @param  \App\Models\DInfo  $dInfo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDInfoRequest $request, DInfo $dInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DInfo  $dInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(DInfo $dInfo)
    {
        //
    }
}
