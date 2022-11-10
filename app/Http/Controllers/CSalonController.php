<?php

namespace App\Http\Controllers;

use App\Models\CSalon;
use App\Http\Requests\StoreCSalonRequest;
use App\Http\Requests\UpdateCSalonRequest;

class CSalonController extends Controller
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
     * @param  \App\Http\Requests\StoreCSalonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCSalonRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CSalon  $cSalon
     * @return \Illuminate\Http\Response
     */
    public function show(CSalon $cSalon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CSalon  $cSalon
     * @return \Illuminate\Http\Response
     */
    public function edit(CSalon $cSalon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCSalonRequest  $request
     * @param  \App\Models\CSalon  $cSalon
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCSalonRequest $request, CSalon $cSalon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CSalon  $cSalon
     * @return \Illuminate\Http\Response
     */
    public function destroy(CSalon $cSalon)
    {
        //
    }
}
