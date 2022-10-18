<?php

namespace App\Http\Controllers;

use App\Models\LPostUser;
use App\Http\Requests\StoreLPostUserRequest;
use App\Http\Requests\UpdateLPostUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LPostUserController extends Controller
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
     * @param  \App\Http\Requests\StoreLPostUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLPostUserRequest $request, $id)
    {
        //
        $bookmark = LPostUser::create([
            'user_id' => $request->user_id,
            'l_post_id' => $id,
        ]);
        return 'この記事をブックマークしました';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LPostUser  $LPostUser
     * @return \Illuminate\Http\Response
     */
    public function show(LPostUser $LPostUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LPostUser  $LPostUser
     * @return \Illuminate\Http\Response
     */
    public function edit(LPostUser $LPostUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLPostUserRequest  $request
     * @param  \App\Models\LPostUser  $LPostUser
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLPostUserRequest $request, LPostUser $LPostUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LPostUser  $LPostUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(LPostUser $LPostUser, $id, Request $request)
    {
        //
        $l_post_user = LPostUser::where('user_id', $request->user_id)->where('l_post_id', $id)->first()->delete();
        return 'この記事のブックマークを解除しました';
    }
}