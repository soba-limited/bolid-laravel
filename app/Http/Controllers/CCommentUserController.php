<?php

namespace App\Http\Controllers;

use App\Models\CCommentUser;
use App\Http\Requests\StoreCCommentUserRequest;
use App\Http\Requests\UpdateCCommentUserRequest;

class CCommentUserController extends Controller
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
     * @param  \App\Http\Requests\StoreCCommentUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCCommentUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CCommentUser  $cCommentUser
     * @return \Illuminate\Http\Response
     */
    public function show(CCommentUser $cCommentUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CCommentUser  $cCommentUser
     * @return \Illuminate\Http\Response
     */
    public function edit(CCommentUser $cCommentUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCCommentUserRequest  $request
     * @param  \App\Models\CCommentUser  $cCommentUser
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCCommentUserRequest $request, CCommentUser $cCommentUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CCommentUser  $cCommentUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(CCommentUser $cCommentUser)
    {
        //
    }
}
