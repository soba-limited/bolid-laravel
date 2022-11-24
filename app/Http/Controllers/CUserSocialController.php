<?php

namespace App\Http\Controllers;

use App\Models\CUserSocial;
use App\Http\Requests\StoreCUserSocialRequest;
use App\Http\Requests\UpdateCUserSocialRequest;
use App\Models\CUserProfile;
use Illuminate\Http\Request;

class CUserSocialController extends Controller
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
     * @param  \App\Http\Requests\StoreCUserSocialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCUserSocialRequest $request)
    {
        //
        $c_user_social = CUserSocial::create([
            'c_user_profile_id' => $request->c_user_profile_id,
            'name' => $request->name,
            'url' => $request->url,
            'follower' => $request->follower,
        ]);
        $c_user_socials = CUserSocial::where('c_user_profile_id', $request->c_user_profile_id)->get();

        $max_follower = CUserSocial::where('c_user_profile_id', $request->c_user_profile_id)->max('follower');
        $c_user_profile = CUserProfile::find($request->c_user_profile_id);
        $c_user_profile->maximum_follower = intval($max_follower);
        $c_user_profile->save();
        return $this->jsonResponse($c_user_socials);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CUserSocial  $cUserSocial
     * @return \Illuminate\Http\Response
     */
    public function show(CUserSocial $cUserSocial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CUserSocial  $cUserSocial
     * @return \Illuminate\Http\Response
     */
    public function edit(CUserSocial $cUserSocial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCUserSocialRequest  $request
     * @param  \App\Models\CUserSocial  $cUserSocial
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCUserSocialRequest $request, CUserSocial $cUserSocial, $c_user_social_id)
    {
        //
        $c_user_social = CUserSocial::find($c_user_social_id);

        $c_user_social->update([
            'name' => $request->name,
            'url' => $request->url,
        ]);
        $c_user_socials = CUserSocial::where('c_user_profile_id', $c_user_social->c_user_profile_id)->get();

        $max_follower = CUserSocial::where('c_user_profile_id', $c_user_social->c_user_profile_id)->max('follower');
        $c_user_profile = CUserProfile::find($c_user_social->c_user_profile_id);
        $c_user_profile->maximum_follower = intval($max_follower);
        $c_user_profile->save();

        return $this->jsonResponse($c_user_socials);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CUserSocial  $cUserSocial
     * @return \Illuminate\Http\Response
     */
    public function destroy(CUserSocial $cUserSocial, Request $request)
    {
        //
        $c_user_social = CUserSocial::find($request->c_user_social_id);
        $c_user_profile_id = $c_user_social->c_user_profile_id;
        $c_user_social->delete();

        $c_user_socials = CUserSocial::where('c_user_profile_id', $c_user_profile_id)->get();

        $max_follower = CUserSocial::where('c_user_profile_id', $c_user_profile_id)->max('follower');
        $c_user_profile = CUserProfile::find($c_user_profile_id);
        $c_user_profile->maximum_follower = intval($max_follower);
        $c_user_profile->save();

        return $this->jsonResponse($c_user_socials);
    }
}