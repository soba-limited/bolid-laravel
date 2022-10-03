<?php

namespace App\Http\Controllers;

use App\Models\DOverview;
use App\Http\Requests\StoreDOverviewRequest;
use App\Http\Requests\UpdateDOverviewRequest;

class DOverviewController extends Controller
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
     * @param  \App\Http\Requests\StoreDOverviewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDOverviewRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DOverview  $dOverview
     * @return \Illuminate\Http\Response
     */
    public function show(DOverview $dOverview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DOverview  $dOverview
     * @return \Illuminate\Http\Response
     */
    public function edit(DOverview $dOverview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDOverviewRequest  $request
     * @param  \App\Models\DOverview  $dOverview
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDOverviewRequest $request, DOverview $dOverview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DOverview  $dOverview
     * @return \Illuminate\Http\Response
     */
    public function destroy(DOverview $dOverview)
    {
        //
    }
}
