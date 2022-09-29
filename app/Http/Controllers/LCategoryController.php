<?php

namespace App\Http\Controllers;

use App\Models\LCategory;
use App\Http\Requests\StoreLCategoryRequest;
use App\Http\Requests\UpdateLCategoryRequest;

class LCategoryController extends Controller
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
     * @param  \App\Http\Requests\StoreLCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LCategory  $lCategory
     * @return \Illuminate\Http\Response
     */
    public function show(LCategory $lCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LCategory  $lCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(LCategory $lCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLCategoryRequest  $request
     * @param  \App\Models\LCategory  $lCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLCategoryRequest $request, LCategory $lCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LCategory  $lCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(LCategory $lCategory)
    {
        //
    }
}
