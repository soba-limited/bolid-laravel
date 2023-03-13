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
use App\Models\CCoupon;
use App\Models\CFollow;
use App\Models\CItem;
use App\Models\CLike;
use App\Models\COffice;
use App\Models\CPost;
use App\Models\CPostApp;
use App\Models\CPr;
use App\Models\CPresident;
use App\Models\CSust;
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

        //dd($company);

        if (!empty($request->zip)) {
            $company = $company->where('zip', $request->zip);
        }

        if (!empty($request->office)) {
            $company = $company->having('c_offices_count', '>', 0);
        }

        if (!empty($request->president)) {
            $company = $company->having('c_president_count', '>', 0);
        }

        if (!empty($request->item)) {
            $company = $company->having('c_items_count', '>', 0);
        }

        if (!empty($request->sust)) {
            $company = $company->having('c_susts_count', '>', 0);
        }

        if (!empty($request->card)) {
            $company = $company->having('c_cards_count', '>', 0);
        }

        if (!empty($request->like)) {
            $company = $company->having('c_likes_count', '>', 0);
        }

        if (!empty($request->coupon)) {
            $company = $company->having('c_coupons_count', '>', 0);
        }

        if (!empty($request->business_informaition)) {
            $company = $company->having('c_business_informaitions_count', '>', 0);
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

        if (!empty($request->s)) {
            $company = $company->where('nicename', 'like', '%'.$request->s.'%')->orWhere('profile', 'like', '%'.$request->s.'%');
        }


        //dd($company->get());

        $limit = 20;
        $page = $request->page;
        $skip = ($page - 1) * $limit;

        $count = $company->count();
        $page_max = $count % $limit > 0 ? floor($count / $limit) + 1: $count / $limit;

        $company = $company->with('CTags', 'CCompanyProfile')->limit($limit)->skip($skip)->get();

        $allarray = [
            'company' => $company,
            'page_max' => $page_max,
            'now_page' => $page,
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

        if (!empty($request->card)) {
            $user = $user->having('c_cards_count', '>', 0);
        }

        if (!empty($request->like)) {
            $user = $user->having('c_likes_count', '>', 0);
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
        $page = $request->page;
        $skip = ($page - 1) * $limit;

        $count = $user->count();
        $page_max = $count % $limit > 0 ? floor($count / $limit) + 1: $count / $limit;


        $user = $user->with('CTags')->limit($limit)->skip($skip)->get();

        if ($request->sort == 'follow') {
            $user = $user->sortByDesc('user.c_followeds_count')->values();
        }
        if ($request->sort == 'sns_follower') {
            $user = $user->sortByDesc('CUserProfile.maximum_follower')->values();
        }


        $allarray = [
            'user' => $user,
            'page_max' => $page_max,
            'now_page' => $page,
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
    public function create(Request $request)
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
        $c_profile = CProfile::create([
            'nicename' => $request->nicename,
            'profile' => $request->profile,
            'zip' => $request->zip,
            'title' => $request->title,
        ]);

        $id = $c_profile->id;

        $user = User::find($request->user_id)->update([
                'c_profile_id' => $id,
        ]);

        if ($request->hasFile('thumbs')) {
            $thumbs_name = $request->file('thumbs')->getClientOriginalName();
            $request->file('thumbs')->storeAs('images/c_profile/'.$id, $thumbs_name, 'public');
            $thumbs = 'images/c_profile/'.$id."/".$thumbs_name;
            $c_profile->thumbs = $thumbs;
        }

        if ($request->hasFile('image1')) {
            $image1_name = $request->file('image1')->getClientOriginalName();
            $request->file('image1')->storeAs('images/c_profile/'.$id, $image1_name, 'public');
            $image1 = 'images/c_profile/'.$id."/".$image1_name;
            $c_profile->image1 = $image1;
        }

        if ($request->hasFile('image2')) {
            $image2_name = $request->file('image2')->getClientOriginalName();
            $request->file('image2')->storeAs('images/c_profile/'.$id, $image2_name, 'public');
            $image2 = 'images/c_profile/'.$id."/".$image2_name;
            $c_profile->image2 = $image2;
        }

        if ($request->hasFile('image3')) {
            $image3_name = $request->file('image3')->getClientOriginalName();
            $request->file('image3')->storeAs('images/c_profile/'.$id, $image3_name, 'public');
            $image3 = 'images/c_profile/'.$id."/".$image3_name;
            $c_profile->image3 = $image3;
        }

        if ($request->hasFile('thumbs') || $request->hasFile('image1') || $request->hasFile('image2') || $request->hasFile('image3')) {
            $c_profile->save();
        }

        $tag_ids = [];

        if (!empty($request->tag)) {
            $tags = explode(",", $request->tag);
            foreach ($tags as $tag) {
                $tag_single = CTag::firstOrCreate(['name'=>$tag]);
                array_push($tag_ids, $tag_single->id);
            }
            foreach ($tag_ids as $tag_id) {
                $c_profile->CTags()->attach($tag_id);
            }
        }


        if ($c_profile->user->account_type == '0') {
            $c_user_profile = CUserProfile::create([
                'c_profile_id' => $id,
            ]);
        } elseif ($c_profile->user->account_type == '1') {
            $c_company_profile = CCompanyProfile::create([
                'c_profile_id' => $id,
            ]);
        }

        return $this->jsonResponse($c_profile);
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
            $companys = CPost::where('user_id', $user_id)->with('CCat')->orderBy('created_at', 'desc')->get();
            $business = CBusinessInformaition::where('c_profile_id', $profile->id)->orderBy('created_at', 'desc')->get();
            $pr = CPr::where('user_id', $user_id)->withCount('CPrCounts')->orderBy('created_at', 'desc')->get();
            $comments = CComment::where('to_user_id', $user_id)->with('user.CProfile')->orderBy('created_at', 'desc')->get();

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

            $companys = CPost::where('user_id', $user_id)->with('CCat')->orderBy('created_at', 'desc')->get();

            $comments = CComment::where('to_user_id', $user_id)->with('user.CProfile')->orderBy('created_at', 'desc')->get();

            $cards = CCard::where('c_profile_id', $profile->id)->orderBy('created_at', 'desc')->get();
            $likes = CLike::where('c_profile_id', $profile->id)->orderBy('created_at', 'desc')->get();

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

    public function matching_user(Request $request)
    {
        $myposts = User::with('CPostApps.user.CProfile')->find($request->user_id);
        return $this->jsonResponse($myposts);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CProfile  $cProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(CProfile $cProfile, $c_profile_id)
    {
        //
        $c_profile = CProfile::with('CTags')->find($c_profile_id);
        $c_profile_option = null;
        $allarray = [];
        if ($c_profile->user->account_type == 0) {
            $c_profile_option = CUserProfile::where('c_profile_id', $c_profile->id)->with('CUserSocials', 'CUserSkills')->first();
            $c_cards = CCard::where('c_profile_id', $c_profile->id)->orderBy('created_at', 'desc')->get();
            $c_likes = CLike::where('c_profile_id', $c_profile->id)->orderBy('created_at', 'desc')->get();
            $allarray = [
                'c_profile' => $c_profile,
                'c_profile_option' => $c_profile_option,
                'c_cards' => $c_cards,
                'c_likes' => $c_likes,
            ];
        } elseif ($c_profile->user->account_type == 1) {
            $c_profile_option = CCompanyProfile::where('c_profile_id', $c_profile->id)->with('CCompanySocials')->first();
            $c_president = CPresident::where('c_profile_id', $c_profile->id)->orderBy('created_at', 'desc')->get();
            $c_likes = CLike::where('c_profile_id', $c_profile->id)->orderBy('created_at', 'desc')->get();
            $c_susts = CSust::where('c_profile_id', $c_profile->id)->orderBy('created_at', 'desc')->get();
            $c_offices = COffice::where('c_profile_id', $c_profile->id)->orderBy('created_at', 'desc')->get();
            $c_coupons = CCoupon::where('c_profile_id', $c_profile->id)->orderBy('created_at', 'desc')->get();
            $c_cards = CCard::where('c_profile_id', $c_profile->id)->orderBy('created_at', 'desc')->get();
            $c_items = CItem::where('c_profile_id', $c_profile->id)->orderBy('created_at', 'desc')->get();
            $c_business_informations = CBusinessInformaition::where('c_profile_id', $c_profile->id)->orderBy('created_at', 'desc')->get();

            $allarray = [
                'c_profile' => $c_profile,
                'c_profile_option' => $c_profile_option,
                'c_president' => $c_president,
                'c_susts' => $c_susts,
                'c_offices' => $c_offices,
                'c_coupons' => $c_coupons,
                'c_cards' => $c_cards,
                'c_items' => $c_items,
                'c_likes' => $c_likes,
                'c_business_informations' => $c_business_informations,
            ];
        }

        return $this->jsonResponse($allarray);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCProfileRequest  $request
     * @param  \App\Models\CProfile  $cProfile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCProfileRequest $request, CProfile $cProfile, $c_profile_id)
    {
        //
        $c_profile = CProfile::find($c_profile_id);

        $id = $c_profile->id;

        if ($request->hasFile('thumbs')) {
            $thumbs_name = $request->file('thumbs')->getClientOriginalName();
            $request->file('thumbs')->storeAs('images/c_profile/'.$id, $thumbs_name, 'public');
            $thumbs = 'images/c_profile/'.$id."/".$thumbs_name;
            $c_profile->thumbs = $thumbs;
        }

        if ($request->hasFile('image1')) {
            $image1_name = $request->file('image1')->getClientOriginalName();
            $request->file('image1')->storeAs('images/c_profile/'.$id, $image1_name, 'public');
            $image1 = 'images/c_profile/'.$id."/".$image1_name;
            $c_profile->image1 = $image1;
        }

        if ($request->hasFile('image2')) {
            $image2_name = $request->file('image2')->getClientOriginalName();
            $request->file('image2')->storeAs('images/c_profile/'.$id, $image2_name, 'public');
            $image2 = 'images/c_profile/'.$id."/".$image2_name;
            $c_profile->image2 = $image2;
        }

        if ($request->hasFile('image3')) {
            $image3_name = $request->file('image3')->getClientOriginalName();
            $request->file('image3')->storeAs('images/c_profile/'.$id, $image3_name, 'public');
            $image3 = 'images/c_profile/'.$id."/".$image3_name;
            $c_profile->image3 = $image3;
        }

        $c_profile->update([
            'nicename' => $request->nicename,
            'profile' => $request->profile,
            'zip' => $request->zip,
            'title' => $request->title,
            'thumbs' => $request->hasFile('thumbs') ? $thumbs : $request->thumbs,
            'image1' => $request->hasFile('image1') ? $image1 : $request->image1,
            'image2' => $request->hasFile('image2') ? $image2 : $request->image2,
            'image3' => $request->hasFile('image3') ? $image3 : $request->image3,
        ]);

        $tag_ids = [];

        if (!empty($request->tag)) {
            $tags = explode(",", $request->tag);
            foreach ($tags as $tag) {
                $tag_single = CTag::firstOrCreate(['name'=>$tag]);
                array_push($tag_ids, $tag_single->id);
            }
            foreach ($tag_ids as $tag_id) {
                $c_profile->CTags()->syncWithoutDetaching($tag_id);
            }
        }

        $allarray = [
            'c_profile' => $c_profile,
            'c_tags' => $c_profile->CTags
        ];

        return $this->jsonResponse($allarray);
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
            $profile = CProfile::with(['user'=>function ($query) {
                $query->withCount('CFolloweds')->withCount('CFollowings');
            }])->where('id', $profile_id)->first();
            return $this->jsonResponse($profile);
        } else {
            return false;
        }
    }

    public function follower($user_id)
    {
        $follower = CFollow::where('followed_user_id', $user_id)->with('Following.CProfile')->orderBy('id', 'desc');
        $limit = 20;
        $count = $follower->count();
        $page_max = $count % $limit > 0 ? floor($count / $limit) + 1: $count / $limit;
        $follows = $follower->limit($limit)->get();
        $allarray = [
            'follows' => $follows,
            'page_max' => $page_max
        ];
        return $this->jsonResponse($allarray);
    }

    public function follower_more($user_id, Request $request)
    {
        $skip = ($request->page - 1) * 20;
        $follower = CFollow::where('followed_user_id', $user_id)->with('Following.CProfile')->orderBy('id', 'desc');
        $limit = 20;
        $count = $follower->count();
        $page_max = $count % $limit > 0 ? floor($count / $limit) + 1: $count / $limit;
        $follows = $follower->skip($skip)->limit($limit)->get();
        $allarray = [
            'follows' => $follows,
            'page_max' => $page_max
        ];
        return $this->jsonResponse($allarray);
    }

    public function following($user_id)
    {
        $following = CFollow::where('following_user_id', $user_id)->with('Followed.CProfile')->orderBy('id', 'desc');
        $limit = 20;
        $count = $following->count();
        $page_max = $count % $limit > 0 ? floor($count / $limit) + 1: $count / $limit;
        $follows = $following->limit($limit)->get();
        $allarray = [
            'follows' => $follows,
            'page_max' => $page_max
        ];
        return $this->jsonResponse($allarray);
    }

    public function following_more($user_id, Request $request)
    {
        $skip = ($request->page - 1) * 20;
        $following = CFollow::where('following_user_id', $user_id)->with('Followed.CProfile')->orderBy('id', 'desc');
        $limit = 20;
        $count = $following->count();
        $page_max = $count % $limit > 0 ? floor($count / $limit) + 1: $count / $limit;
        $follows = $following->skip($skip)->limit($limit)->get();
        $allarray = [
            'follows' => $follows,
            'page_max' => $page_max
        ];
        return $this->jsonResponse($allarray);
    }
}
