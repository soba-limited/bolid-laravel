<?php

namespace App\Http\Controllers;

use App\Models\CBusinessInformaition;
use App\Models\CCard;
use App\Models\CCoupon;
use App\Models\CItem;
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
        }])->with('CTags')->limit(20)->get();

        $company = User::where('account_type', '1')->where('c_profile_id', '!=', null)->limit(12)->get();

        $user = User::where('account_type', '0')->where('c_profile_id', '!=', null)->limit(10)->get();

        $pr = CPr::with(['user'=>function ($query) {
            $query->with('CProfile');
        }])->withCount('CPrCounts')->with('CTags')->limit(12)->get();

        $salon = CSalon::limit(5)->get();

        $coupon = CCoupon::with(['CProfile'=>function ($query) {
            $query->with('user');
        }])->limit(12)->get();

        $president = CPresident::with(['CProfile'=>function ($query) {
            $query->with('user');
        }])->limit(12)->get();

        $bi = CBusinessInformaition::with(['CProfile'=>function ($query) {
            $query->with('user');
        }])->limit(12)->get();

        $card = CCard::with(['CProfile'=>function ($query) {
            $query->with('user');
        }])->limit(12)->get();

        $item = CItem::with(['CProfile'=>function ($query) {
            $query->with('user');
        }])->limit(12)->get();

        $sust = CSust::with(['CProfile'=>function ($query) {
            $query->with('user');
        }])->limit(12)->get();

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
        ];

        return $this->jsonResponse($allarray);
    }
}