<?php

namespace App\Http\Controllers;

use App\Models\CComment;
use App\Http\Requests\StoreCCommentRequest;
use App\Http\Requests\UpdateCCommentRequest;

class CCommentController extends Controller
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
     * @param  \App\Http\Requests\StoreCCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCCommentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CComment  $cComment
     * @return \Illuminate\Http\Response
     */
    public function show(CComment $cComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CComment  $cComment
     * @return \Illuminate\Http\Response
     */
    public function edit(CComment $cComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCCommentRequest  $request
     * @param  \App\Models\CComment  $cComment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCCommentRequest $request, CComment $cComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CComment  $cComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(CComment $cComment)
    {
        //
    }
}
