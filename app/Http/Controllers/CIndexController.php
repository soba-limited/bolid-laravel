<?php

namespace App\Http\Controllers;

use App\Models\CBusinessInformaition;
use App\Models\CCard;
use App\Models\CCoupon;
use App\Models\CItem;
use App\Models\CLike;
use App\Models\CPost;
use App\Models\CPr;
use App\Models\CPresident;
use App\Models\CSalon;
use App\Models\CSust;
use App\Models\User;
use Illuminate\Http\Request;

class CIndexController extends Controller
{
    //

    public function index()
    {
        $posts = CPost::with(['user'=>function ($query) {
            $query->with(['CProfile']);
        }])->with('CTags', 'CCat')->orderBy('id', 'desc')->limit(20)->get();

        $company = User::where('account_type', '1')->where('c_profile_id', '!=', null)->limit(12)->with(['CProfile'=>function ($query) {
            $query->with('CCompanyProfile', 'CTags');
        }])->orderBy('id', 'desc')->get();

        $user = User::where('account_type', '0')->where('c_profile_id', '!=', null)->orderBy('id', 'desc')->limit(10)->with('CProfile')->get();

        $pr = CPr::with(['user'=>function ($query) {
            $query->with('CProfile');
        }])->withCount('CPrCounts')->with('CTags')->orderBy('id', 'desc')->limit(12)->get();

        $salon = CSalon::limit(5)->get();

        $coupon = CCoupon::with(['CProfile'=>function ($query) {
            $query->with('user');
        }])->orderBy('id', 'desc')->limit(12)->get();

        $president = CPresident::with(['CProfile'=>function ($query) {
            $query->with('user');
        }])->orderBy('id', 'desc')->limit(12)->get();

        $bi = CBusinessInformaition::with(['CProfile'=>function ($query) {
            $query->with('user');
        }])->orderBy('id', 'desc')->limit(12)->get();

        $card = CCard::with(['CProfile'=>function ($query) {
            $query->with('user');
        }])->orderBy('id', 'desc')->limit(12)->get();

        $item = CItem::with(['CProfile'=>function ($query) {
            $query->with('user');
        }])->orderBy('id', 'desc')->limit(12)->get();

        $sust = CSust::with(['CProfile'=>function ($query) {
            $query->with('user');
        }])->orderBy('id', 'desc')->limit(12)->get();

        $sponsor = CLike::whereHas('CProfile', function ($query) {
            $query->whereHas('user', function ($query) {
                $query->where('account_type', 1);
            });
        })->with('CProfile')->orderBy('id', 'desc')->limit(5)->get();

        $like = CLike::whereHas('CProfile', function ($query) {
            $query->whereHas('user', function ($query) {
                $query->where('account_type', 0);
            });
        })->with('CProfile')->orderBy('id', 'desc')->limit(5)->get();


        $allarray = [
            'post' => $posts,
            'company' => $company,
            'user' => $user,
            'pr' => $pr,
            'salon' => $salon,
            'coupon' => $coupon,
            'president' => $president,
            'bi' => $bi,
            'card' => $card,
            'item' => $item,
            'sust' => $sust,
            'sponsor' => $sponsor,
            'like' => $like,
        ];

        return $this->jsonResponse($allarray);
    }
}