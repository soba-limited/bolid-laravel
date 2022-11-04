<?php

namespace App\Http\Controllers;

use App\Models\DProfile;
use App\Models\User;
use App\Models\DShop;
use App\Http\Requests\StoreDProfileRequest;
use App\Http\Requests\UpdateDProfileRequest;
use Illuminate\Http\Request;

class DProfileController extends Controller
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
     * @param  \App\Http\Requests\StoreDProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDProfileRequest $request)
    {
        //
        $hasprofile = User::find($request->user_id);
        if (empty($hasprofile->d_profile_id)) {
            $d_profile = DProfile::create([
                'nicename' => $request->nicename,
                'profile' => $request->profile,
            ]);
            $id = $d_profile->id;
            $user = User::find($request->user_id)->update([
                'd_profile_id' => $id,
            ]);
            if ($request->hasFile('thumbs')) {
                $file_name = $request->file('thumbs')->getClientOriginalName();
                $request->file('thumbs')->storeAs('images/d_profile/'.$id, $file_name, 'public');
                $thumbs = 'images/d_profile/'.$id."/".$file_name;
                $d_profile->thumbs = $thumbs;
                $d_profile->save();
            }
            return $this->jsonResponse($d_profile);
        } else {
            return 'すでにプロフィールは作成済みです';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DProfile  $dProfile
     * @return \Illuminate\Http\Response
     */
    public function show(DProfile $dProfile, $user_id)
    {
        //
        $profile = User::find($user_id)->withCount('DFollowing')->withCount('DFollowed')->with('DProfile')->get()->makeVisible('profile');
        $create_shop = DShop::where('user_id', $user_id)->get();
        $allarray = [
            'profile' => $profile,
            'create_shop' => $create_shop,
        ];
        return $this->jsonResponse($allarray);
    }

    public function mypage(Request $request)
    {
        $profile = User::find($request->user_id)->withCount('DFollowing')->withCount('DFollowed')->with('DProfile')->get()->makeVisible('profile');
        $create_shop = DShop::where('user_id', $request->user_id)->get();
        $allarray = [
            'profile' => $profile,
            'create_shop' => $create_shop,
        ];
        return $this->jsonResponse($allarray);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DProfile  $dProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(DProfile $dProfile, $profile_id)
    {
        //
        $profile = DProfile::find($profile_id)->makeVisible('profile');
        return $this->jsonResponse($profile);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDProfileRequest  $request
     * @param  \App\Models\DProfile  $dProfile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDProfileRequest $request, DProfile $dProfile, $profile_id)
    {
        //
        $id = $request->user_id;
        if ($request->hasFile('thumbs')) {
            $file_name = $request->file('thumbs')->getClientOriginalName();
            $request->file('thumbs')->storeAs('images/d_profile/'.$id, $file_name, 'public');
            $thumbs = 'images/d_profile/'.$id."/".$file_name;
        } elseif ($request->thumbs == 'null') {
            $request->thumbs = null;
        }

        $d_profile = DProfile::find($profile_id);
        $d_profile->update([
            'nicename' => $request->nicename,
            'profile' => $request->profile,
            'thumbs' => $request->hasFile('thumbs') ? $thumbs : $request->thumbs,
        ]);

        return $this->jsonResponse($d_profile);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DProfile  $dProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(DProfile $dProfile)
    {
        //
    }

    public function create_shop(Request $request)
    {
        $shop = DShop::where('user_id', $request->user_id)->orderBy('id', 'desc')->get();
        return $this->jsonResponse($shop);
    }

    public function create_mall(Request $request)
    {
        $mall = DMall::where('user_id', $request->user_id)->orderBy('id', 'desc')->get();
        return $this->jsonResponse($mall);
    }

    public function save_shop(Request $request)
    {
        $shop = DShop::where('user_id', $request->user_id)->with(['user',function ($query) {
            $query->with('DProfile');
        }])->orderBy('id', 'desc')->get();
        return $this->jsonResponse($shop);
    }

    public function save_mall(Request $request)
    {
        $mall = DMall::where('user_id', $request->user_id)->with(['user',function ($query) {
            $query->with('DProfile');
        }])->orderBy('id', 'desc')->get();
        return $this->jsonResponse($mall);
    }

    public function send_comments(Request $request)
    {
        $comments = DComment::where('user_id', $request->user_id)->with(['DShop',function ($query) {
            $query->select(['id','name']);
        }])->get();
        return $this->jsonResponse($comments);
    }

    public function allways(Request $request)
    {
        $profile_id = User::find($request->id)->d_profile_id;
        $profile = DProfile::find($profile_id);
        return $this->jsonResponse($profile);
    }
}
