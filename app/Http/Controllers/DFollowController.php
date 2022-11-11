<?php

namespace App\Http\Controllers;

use App\Models\DFollow;
use App\Http\Requests\StoreDFollowRequest;
use App\Http\Requests\UpdateDFollowRequest;
use Illuminate\Http\Request;

class DFollowController extends Controller
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
     * @param  \App\Http\Requests\StoreDFollowRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDFollowRequest $request)
    {
        //
        $follow = DFollow::create([
            'following_user_id'=>$request->following_user_id,
            'followed_user_id=>'=>$request->followed_user_id,
        ]);
        return $this->jsonResponse($follow);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DFollow  $dFollow
     * @return \Illuminate\Http\Response
     */
    public function show(DFollow $dFollow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DFollow  $dFollow
     * @return \Illuminate\Http\Response
     */
    public function edit(DFollow $dFollow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDFollowRequest  $request
     * @param  \App\Models\DFollow  $dFollow
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDFollowRequest $request, DFollow $dFollow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DFollow  $dFollow
     * @return \Illuminate\Http\Response
     */
    public function destroy(DFollow $dFollow, Request $request)
    {
        //
        $follow = DFollow::where('following_user_id', $request->following_user_id)->where('followed_user_id', $request->followed_user_id)->first();
        $follow->delete();
        return 'フォローを解除しました';
    }

    public function check(Request $request)
    {
        $check = DFollow::where('followed_user_id', $request->user_id)->pluck('following_user_id');
        return $this->jsonResponse($check);
    }
}