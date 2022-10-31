<?php

namespace App\Http\Controllers;

use App\Models\DPickup;
use App\Models\DShop;
use Illuminate\Http\Request;

class DIndexController extends Controller
{
    //

    public function index()
    {
        $popular = DShop::limit(10)->withCount('DGoods')->withCount('DShopBookmarks')->withCount('DComments')->get();
        $pick = DPickup::with(['DShop',function ($query) {
            $query->withCount('DGoods')->withCount('DShopBookmarks')->withCount('DComments');
        }])->limit(8)->get();
        $shop = DShop::limit(28)->withCount('DGoods')->withCount('DShopBookmarks')->withCount('DComments')->get();

        $allarray = [
            'popular' => $popular,
            'pick' => $pick,
            'shop' => $shop
        ];
        return $this->jsonResponse($allarray);
    }

    public function index_more($page)
    {
        $limit = 28;
        $skip = ($page - 1) * $limit;

        $count = DShop::all()->count();
        $page_max = $count % $limit > 0 ? floor($count / $limit) + 1: $count / $limit;
        $add_page = DShop::skip($skip)->limit($limit)->withCount('DGoods')->withCount('DShopBookmarks')->withCount('DComments')->get();

        $allarray = [
            'add_page' => $add_page,
            'page_max' => $page_max,
        ];

        return $this->jsonResponse($allarray);
    }
}
