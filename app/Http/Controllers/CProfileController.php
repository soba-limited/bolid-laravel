<?php

namespace App\Http\Controllers;

use App\Models\CProfile;
use App\Models\User;
use App\Http\Requests\StoreCProfileRequest;
use App\Http\Requests\UpdateCProfileRequest;
use App\Models\CBusinessInformaition;
use App\Models\CCard;
use App\Models\CComment;
use App\Models\CLike;
use App\Models\CPost;
use App\Models\CPostApp;
use App\Models\CPr;
use Illuminate\Http\Request;

class CProfileController extends Controller
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
     * @param  \App\Http\Requests\StoreCProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCProfileRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CProfile  $cProfile
     * @return \Illuminate\Http\Response
     */
    public function show(CProfile $cProfile)
    {
        //
    }

    public function company_show($user_id)
    {
        $user = User::withCount('CFolloweds')->find($user_id);
        if ($user->account_type >= 1 || $user->account_type == 3) {
            $profile = CProfile::with(['CCompanyProfile'=>function ($query) {
                $query->with('CCompanySocials');
            }])->with(['CTags'])->find($user->c_profile_id);
            $posts = CPost::where('user_id', $user_id)->with('CCat')->get();
            $business = CBusinessInformaition::where('c_profile_id', $profile->id)->get();
            $pr = CPr::where('user_id', $user_id)->withCount('CPrCounts')->get();
            $comments = CComment::where('to_user_id', $user_id)->with('user')->get();

            $allarray = [
                'user' => $user,
                'profile' => $profile,
                'posts' => $posts,
                'business' => $business,
                'pr' => $pr,
                'comments' => $comments,
            ];

            return $this->jsonResponse($allarray);
        } else {
            return false;
        }
    }

    public function user_show($user_id)
    {
        $user = User::withCount('CFolloweds')->find($user_id);
        if ($user->account_type == 0 || $user->account_type == 3) {
            $profile = CProfile::with(['CUserProfile'=>function ($query) {
                $query->with('CUserSocials', 'CUserSkills');
            }])->with(['CTags'])->find($user->c_profile_id);

            $posts = CPost::where('user_id', $user_id)->with('CCat')->get();

            $comments = CComment::where('to_user_id', $user_id)->with('user')->get();

            $cards = CCard::where('c_profile_id', $profile->id)->get();
            $likes = CLike::where('c_profile_id', $profile->id)->get();

            $allarray = [
                'user' => $user,
                'profile' => $profile,
                'posts' => $posts,
                'comments' => $comments,
                'cards' => $cards,
                'likes' => $likes,
            ];

            return $this->jsonResponse($allarray);
        } else {
            return false;
        }
    }

    public function matching(Request $request)
    {
        $myposts = CPost::where('user_id', $request->user_id)->pluck('id');
        $apps = CPostApp::whereIn('c_post_id', $myposts)->pluck('user_id')->unique();
        $users = User::whereIn('id', $apps)->with('CProfile')->with('CPostApps:id,title')->get();
        return $this->jsonResponse($users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CProfile  $cProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(CProfile $cProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCProfileRequest  $request
     * @param  \App\Models\CProfile  $cProfile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCProfileRequest $request, CProfile $cProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CProfile  $cProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(CProfile $cProfile)
    {
        //
    }

    public function allways(Request $request)
    {
        $profile_id = User::find($request->id)->c_profile_id;
        if (!empty($profile_id)) {
            $profile = CProfile::find($profile_id);
            return $this->jsonResponse($profile);
        } else {
            return false;
        }
    }
}