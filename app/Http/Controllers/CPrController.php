<?php

namespace App\Http\Controllers;

use App\Models\CPr;
use App\Http\Requests\StoreCPrRequest;
use App\Http\Requests\UpdateCPrRequest;

class CPrController extends Controller
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
     * @param  \App\Http\Requests\StoreCPrRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCPrRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CPr  $cPr
     * @return \Illuminate\Http\Response
     */
    public function show(CPr $cPr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CPr  $cPr
     * @return \Illuminate\Http\Response
     */
    public function edit(CPr $cPr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCPrRequest  $request
     * @param  \App\Models\CPr  $cPr
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCPrRequest $request, CPr $cPr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CPr  $cPr
     * @return \Illuminate\Http\Response
     */
    public function destroy(CPr $cPr)
    {
        //
    }
}
