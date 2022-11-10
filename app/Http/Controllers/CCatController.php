<?php

namespace App\Http\Controllers;

use App\Models\CCat;
use App\Http\Requests\StoreCCatRequest;
use App\Http\Requests\UpdateCCatRequest;

class CCatController extends Controller
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
     * @param  \App\Http\Requests\StoreCCatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCCatRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CCat  $cCat
     * @return \Illuminate\Http\Response
     */
    public function show(CCat $cCat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CCat  $cCat
     * @return \Illuminate\Http\Response
     */
    public function edit(CCat $cCat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCCatRequest  $request
     * @param  \App\Models\CCat  $cCat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCCatRequest $request, CCat $cCat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CCat  $cCat
     * @return \Illuminate\Http\Response
     */
    public function destroy(CCat $cCat)
    {
        //
    }
}
