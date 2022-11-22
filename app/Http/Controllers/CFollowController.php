<?php

namespace App\Http\Controllers;

use App\Models\CFollow;
use App\Http\Requests\StoreCFollowRequest;
use App\Http\Requests\UpdateCFollowRequest;
use Illuminate\Http\Request;

class CFollowController extends Controller
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
     * @param  \App\Http\Requests\StoreCFollowRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCFollowRequest $request)
    {
        //
        $follow = CFollow::create([
            'following_user_id'=>$request->following_user_id,
            'followed_user_id'=>$request->followed_user_id,
        ]);
        return $this->jsonResponse($follow);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CFollow  $cFollow
     * @return \Illuminate\Http\Response
     */
    public function show(CFollow $cFollow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CFollow  $cFollow
     * @return \Illuminate\Http\Response
     */
    public function edit(CFollow $cFollow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCFollowRequest  $request
     * @param  \App\Models\CFollow  $cFollow
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCFollowRequest $request, CFollow $cFollow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CFollow  $cFollow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $follow = CFollow::where('following_user_id', $request->following_user_id)->where('followed_user_id', $request->followed_user_id)->first();
        $follow->delete();
        return 'フォローを解除しました';
    }

    public function check(Request $request)
    {
        $check = CFollow::where('following_user_id', $request->user_id)->pluck('followed_user_id');
        return $this->jsonResponse($check);
    }
}