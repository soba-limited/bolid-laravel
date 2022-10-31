<?php

namespace App\Http\Controllers;

use App\Models\LProfile;
use App\Models\User;
use App\Http\Requests\StoreLProfileRequest;
use App\Http\Requests\UpdateLProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LProfileController extends Controller
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
     * @param  \App\Http\Requests\StoreLProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLProfileRequest $request)
    {
        //
        $test = User::find($request->user_id);
        if (empty($test->l_profile_id)) {
            $l_profile = LProfile::create([
            'nicename' => $request->nicename,
            'sex' => $request->sex,
            'zipcode' => $request->zipcode,
            'zip' => $request->zip,
            'other_address' => $request->other_address,
            'age' => $request->age,
            'work_type' => $request->work_type,
            'industry' => $request->industry,
            'occupation' => $request->occupation,
        ]);
            $id = $l_profile->id;
            $user = User::find($request->user_id)->update([
                'l_profile_id' => $id,
            ]);
            if ($request->hasFile('thumbs')) {
                $file_name = $request->file('thumbs')->getClientOriginalName();
                $request->file('thumbs')->storeAs('images/l_profile/'.$id, $file_name, 'public');
                $thumbs = 'images/l_profile/'.$id."/".$file_name;
                $l_profile->thumbs = $thumbs;
                $l_profile->save();
            }
            return $this->jsonResponse($l_profile);
        } else {
            return 'すでにプロフィールは作成済みです';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LProfile  $lProfile
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LProfile  $lProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(LProfile $lProfile, $profile_id)
    {
        //
        $profile = User::with('LProfile')->with('LBookmark')->with('LPresent')->where('l_profile_id', $profile_id)->first();
        $profile->LProfile->makeVisible(['sex','zipcode','zip','other_address','age','work_type','industry','occupation']);
        return $this->jsonResponse($profile);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLProfileRequest  $request
     * @param  \App\Models\LProfile  $lProfile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLProfileRequest $request, $profile_id)
    {
        //
        $id = $request->user_id;
        if ($request->hasFile('thumbs')) {
            $file_name = $request->file('thumbs')->getClientOriginalName();
            $request->file('thumbs')->storeAs('images/l_profile/'.$id, $file_name, 'public');
            $thumbs = 'images/l_profile/'.$id."/".$file_name;
        } elseif ($request->thumbs == 'null') {
            $request->thumbs = null;
        }

        $l_profile = LProfile::find($profile_id);
        $l_profile->update([
            'nicename' => $request->nicename,
            'thumbs' => $request->hasFile('thumbs') ? $thumbs : $request->thumbs,
            'sex' => $request->sex,
            'zipcode' => $request->zipcode,
            'zip' => $request->zip,
            'other_address' => $request->other_address,
            'age' => $request->age,
            'work_type' => $request->work_type,
            'industry' => $request->industry,
            'occupation' => $request->occupation,
        ]);

        return $this->jsonResponse($l_profile);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LProfile  $lProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(LProfile $lProfile, $id)
    {
        //
        $profile_id = User::find($id)->Lprofile->id;
        LProfile::find($profile_id)->delete();
    }

    public function hasprofile($id)
    {
        $hasprofile = User::find($id)->LProfile;
        return isset($hasprofile) ? 1 : -1;
    }
}
