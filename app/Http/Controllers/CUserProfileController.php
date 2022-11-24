<?php

namespace App\Http\Controllers;

use App\Models\CUserProfile;
use App\Http\Requests\StoreCUserProfileRequest;
use App\Http\Requests\UpdateCUserProfileRequest;

class CUserProfileController extends Controller
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
     * @param  \App\Http\Requests\StoreCUserProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCUserProfileRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CUserProfile  $cUserProfile
     * @return \Illuminate\Http\Response
     */
    public function show(CUserProfile $cUserProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CUserProfile  $cUserProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(CUserProfile $cUserProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCUserProfileRequest  $request
     * @param  \App\Models\CUserProfile  $cUserProfile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCUserProfileRequest $request, CUserProfile $cUserProfile, $c_user_profile_id)
    {
        //
        $c_user_profile = CUserProfile::find($c_user_profile_id);

        $id = $c_user_profile->id;

        if ($request->hasFile('appeal_image')) {
            $appeal_image_name = $request->file('appeal_image')->getClientOriginalName();
            $request->file('appeal_image')->storeAs('images/c_user_profile/'.$id, $appeal_image_name, 'public');
            $appeal_image = 'images/c_user_profile/'.$id."/".$appeal_image_name;
            $c_user_profile->appeal_image = $appeal_image;
        }

        $c_user_profile->update([
            'brand' => $request->brand,
            'appeal_text' => $request->appeal_text,
            'appeal_image' => $request->hasFile('appeal_image') ? $appeal_image : $request->appeal_image,
        ]);

        return $this->jsonResponse($c_user_profile);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CUserProfile  $cUserProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(CUserProfile $cUserProfile)
    {
        //
    }
}