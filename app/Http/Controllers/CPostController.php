<?php

namespace App\Http\Controllers;

use App\Models\CPost;
use App\Http\Requests\StoreCPostRequest;
use App\Http\Requests\UpdateCPostRequest;

class CPostController extends Controller
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
     * @param  \App\Http\Requests\StoreCPostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCPostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CPost  $cPost
     * @return \Illuminate\Http\Response
     */
    public function show(CPost $cPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CPost  $cPost
     * @return \Illuminate\Http\Response
     */
    public function edit(CPost $cPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCPostRequest  $request
     * @param  \App\Models\CPost  $cPost
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCPostRequest $request, CPost $cPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CPost  $cPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(CPost $cPost)
    {
        //
    }
}
