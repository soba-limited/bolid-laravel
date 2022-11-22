<?php

namespace App\Http\Controllers;

use App\Models\CProfile;
use App\Models\CCompanyProfile;
use App\Models\CUserProfile;
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
use App\Models\CTag;
use App\Models\CUserSkill;
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

    public function company_index()
    {
        $company = new CProfile;
        $tag_list = CTag::withCount('CPosts')->orderBy('c_posts_count', 'desc')->limit(20)->get();

        $company = $company->whereHas('user', function ($query) {
            $query->where('account_type', 1);
        });

        $company = $company->withCount('CSusts')->withCount('CLikes')->withCount('COffices')->withCount('CCards')->withCount('CCoupons')->withCount('CItems')->withCount('CPresident')->withCount('CBusinessInformaitions');

        $limit = 20;

        $count = $company->count();
        $page_max = $count % $limit > 0 ? floor($count / $limit) + 1: $count / $limit;

        $company = $company->with('user', 'CTags', 'CCompanyProfile')->limit($limit)->get();

        $allarray = [
            'company' => $company,
            'page_max' => $page_max,
            'now_page' => 1,
            'tag_list' => $tag_list,
        ];

        return $this->jsonResponse($allarray);
    }

    public function company_search(Request $request)
    {
        $company = new CProfile;
        $tag_list = CTag::withCount('CPosts')->orderBy('c_posts_count', 'desc')->limit(20)->get();

        $company = $company->whereHas('user', function ($query) {
            $query->where('account_type', 1);
        });

        $company = $company->with(['user'=>function ($query) {
            $query->withCount('CFolloweds');
        }]);

        $company = $company->withCount('CSusts')->withCount('CLikes')->withCount('COffices')->withCount('CCards')->withCount('CCoupons')->withCount('CItems')->withCount('CPresident')->withCount('CBusinessInformaitions');

        if (!empty($request->s)) {
            $company = $company->where('nicename', 'like', '%'.$request->s.'%')->orWhere('profile', 'like', '%'.$request->s.'%');
        }

        if (!empty($request->zip)) {
            $company = $company->where('zip', $request->zip);
        }

        if (!empty($request->office)) {
            $company = $company->where('c_offices_count', '>', '0');
        }

        if (!empty($request->president)) {
            $company = $company->where('c_presidents_count', '>', '0');
        }

        if (!empty($request->item)) {
            $company = $company->where('c_items_count', '>', '0');
        }

        if (!empty($request->sust)) {
            $company = $company->where('c_susts_count', '>', '0');
        }

        if (!empty($request->card)) {
            $company = $company->where('c_cards_count', '>', '0');
        }

        if (!empty($request->like)) {
            $company = $company->where('c_likes_count', '>', '0');
        }

        if (!empty($request->business_informaition)) {
            $company = $company->where('c_business_informaitions_count', '>', '0');
        }

        if (!empty($request->tag)) {
            $company = $company->whereHas('CTags', function ($query) use ($request) {
                $query->where('c_tag_id', $request->tag);
            });
        }

        if (!empty($request->sort)) {
            if ($request->sort == 'new') {
                $company = $company->orderBy('id', 'desc');
            } elseif ($request->sort == 'old') {
                $company = $company->orderBy('id', 'asc');
            } elseif ($request->sort == 'follow') {
                $company = $company->with(['user' => function ($query) {
                    $query->withCount('CFolloweds')->orderBy('c_followeds_count', 'desc');
                }]);
            }
        }


        $limit = 20;

        $count = $company->count();
        $page_max = $count % $limit > 0 ? floor($count / $limit) + 1: $count / $limit;

        $company = $company->with('CTags', 'CCompanyProfile')->limit($limit)->get();

        $allarray = [
            'company' => $company,
            'page_max' => $page_max,
            'now_page' => 1,
            'tag_list' => $tag_list,
        ];

        return $this->jsonResponse($allarray);
    }

    public function user_index()
    {
        $user = new CProfile;
        $skill = CUserSkill::get();
        $tag_list = CTag::withCount('CPosts')->orderBy('c_posts_count', 'desc')->limit(20)->get();

        $user = $user->whereHas('user', function ($query) {
            $query->where('account_type', 0);
        });

        $user = $user->withCount('CLikes')->withCount('CCards');

        $limit = 20;

        $count = $user->count();
        $page_max = $count % $limit > 0 ? floor($count / $limit) + 1: $count / $limit;

        $user = $user->with('user', 'CTags', 'CUserProfile')->limit($limit)->get();

        $allarray = [
            'user' => $user,
            'page_max' => $page_max,
            'now_page' => 1,
            'skill' => $skill,
            'tag_list' => $tag_list,
        ];

        return $this->jsonResponse($allarray);
    }

    public function user_search(Request $request)
    {
        $user = new CProfile;
        $skill = CUserSkill::get();
        $tag_list = CTag::withCount('CPosts')->orderBy('c_posts_count', 'desc')->limit(20)->get();

        $user = $user->whereHas('user', function ($query) {
            $query->where('account_type', 0);
        });

        $user = $user->with(['user'=>function ($query) {
            $query->withCount('CFolloweds');
        }])->with('CUserProfile.CUserSocials');

        $user = $user->withCount('CLikes')->withCount('CCards');

        if (!empty($request->s)) {
            $user = $user->where('nicename', 'like', '%'.$request->s.'%')->orWhere('profile', 'like', '%'.$request->s.'%');
        }

        if (!empty($request->zip)) {
            $user = $user->where('zip', $request->zip);
        }

        if (!empty($request->skill)) {
            $user = $user->whereHas('CUserProfile', function ($query) use ($request) {
                $query->whereHas('CUserSkills', function ($query) use ($request) {
                    $query->where('c_user_skill_id', $request->skill);
                });
            });
        }

        if (!empty($request->sns)) {
            $user = $user->whereHas('CUserProfile', function ($query) use ($request) {
                $query->whereHas('CUserSocials', function ($query) use ($request) {
                    $query->where('name', $request->sns);
                });
            });
        }

        if (!empty($request->sns_follower)) {
            $user = $user->whereHas('CUserProfile', function ($query) use ($request) {
                $query->whereHas('CUserSocials', function ($query) use ($request) {
                    $query->where('follower', ">=", intval($request->sns_follower));
                });
            });
        }


        if (!empty($request->tag)) {
            $user = $user->whereHas('CTags', function ($query) use ($request) {
                $query->where('c_tag_id', $request->tag);
            });
        }

        if (!empty($request->sort)) {
            if ($request->sort == 'new') {
                $user = $user->orderBy('id', 'desc');
            } elseif ($request->sort == 'old') {
                $user = $user->orderBy('id', 'asc');
            }
        }

        $limit = 20;

        $count = $user->count();
        $page_max = $count % $limit > 0 ? floor($count / $limit) + 1: $count / $limit;


        $user = $user->with('CTags')->limit($limit)->get();

        if ($request->sort == 'follow') {
            $user = $user->sortByDesc('user.c_followeds_count')->values();
        }
        if ($request->sort == 'sns_follower') {
            $user = $user->sortByDesc('CUserProfile.maximum_follower')->values();
        }


        $allarray = [
            'user' => $user,
            'page_max' => $page_max,
            'now_page' => 1,
            'skill' => $skill,
            'tag_list' => $tag_list,
        ];

        return $this->jsonResponse($allarray);
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
            $companys = CPost::where('user_id', $user_id)->with('CCat')->get();
            $business = CBusinessInformaition::where('c_profile_id', $profile->id)->get();
            $pr = CPr::where('user_id', $user_id)->withCount('CPrCounts')->get();
            $comments = CComment::where('to_user_id', $user_id)->with('user.CProfile')->get();

            $allarray = [
                'user' => $user,
                'profile' => $profile,
                'posts' => $companys,
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

            $companys = CPost::where('user_id', $user_id)->with('CCat')->get();

            $comments = CComment::where('to_user_id', $user_id)->with('user.CProfile')->get();

            $cards = CCard::where('c_profile_id', $profile->id)->get();
            $likes = CLike::where('c_profile_id', $profile->id)->get();

            $allarray = [
                'user' => $user,
                'profile' => $profile,
                'posts' => $companys,
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