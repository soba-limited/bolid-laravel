<?php

namespace App\Http\Controllers;

use App\Models\DItem;
use App\Http\Requests\StoreDItemRequest;
use App\Http\Requests\UpdateDItemRequest;

class DItemController extends Controller
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
     * @param  \App\Http\Requests\StoreDItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DItem  $dItem
     * @return \Illuminate\Http\Response
     */
    public function show(DItem $dItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DItem  $dItem
     * @return \Illuminate\Http\Response
     */
    public function edit(DItem $dItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDItemRequest  $request
     * @param  \App\Models\DItem  $dItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDItemRequest $request, DItem $dItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DItem  $dItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(DItem $dItem)
    {
        //
    }
}
