<?php

namespace App\Http\Controllers;

use App\Models\DComment;
use App\Http\Requests\StoreDCommentRequest;
use App\Http\Requests\UpdateDCommentRequest;

class DCommentController extends Controller
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
     * @param  \App\Http\Requests\StoreDCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDCommentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DComment  $dComment
     * @return \Illuminate\Http\Response
     */
    public function show(DComment $dComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DComment  $dComment
     * @return \Illuminate\Http\Response
     */
    public function edit(DComment $dComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDCommentRequest  $request
     * @param  \App\Models\DComment  $dComment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDCommentRequest $request, DComment $dComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DComment  $dComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(DComment $dComment)
    {
        //
    }
}
