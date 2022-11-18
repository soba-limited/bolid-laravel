<?php

namespace App\Http\Controllers;

use App\Models\CPrCounts;
use App\Http\Requests\StoreCPrCountsRequest;
use App\Http\Requests\UpdateCPrCountsRequest;

class CPrCountsController extends Controller
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
     * @param  \App\Http\Requests\StoreCPrCountsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCPrCountsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CPrCounts  $cPrCounts
     * @return \Illuminate\Http\Response
     */
    public function show(CPrCounts $cPrCounts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CPrCounts  $cPrCounts
     * @return \Illuminate\Http\Response
     */
    public function edit(CPrCounts $cPrCounts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCPrCountsRequest  $request
     * @param  \App\Models\CPrCounts  $cPrCounts
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCPrCountsRequest $request, CPrCounts $cPrCounts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CPrCounts  $cPrCounts
     * @return \Illuminate\Http\Response
     */
    public function destroy(CPrCounts $cPrCounts)
    {
        //
    }
}
