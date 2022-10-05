<?php

/*
共通読み込み事項
*/

namespace App\Libs;

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Facade;

use \App\Models\LSidebar;
use \App\Models\LPickup;
use \App\Models\LCategory;
use \App\Models\LPost;

class Commons extends Facade
{
    public static function LCommons($allarray)
    {
        $side = LSidebar::where('state', 1)->orderBy('order', 'desc')->limit(5)->get();
        $allarray = array_merge($allarray, array('sidebars'=>$side));
        $pickup = LPickup::with(['LPost'=>function ($query) {
            $query->with(['user'=>function ($query) {
                $query->with('LProfile');
            }])->with('LCategory');
        }])->inRandomOrder()->limit(5)->orderBy('id', 'desc')->get();
        $allarray = array_merge($allarray, array('pickups'=>$pickup));
        return $allarray;
    }

    public static function LPost_Category($category)
    {
        $categoryIds = LCategory::where('slug', $category)->orWhere('parent_slug', $category)->pluck('id')->toArray();
        $categorysingle = LCategory::where('slug', $category)->first();
        $posts = LPost::with('LCategory')->with(['user'=>function ($query) {
            $query->with(['LProfile']);
        }])->whereIn('l_category_id', $categoryIds)->limit(10)->orderBy('id', 'desc')->get();
        $return =[
            'id' => $categorysingle->id,
            'name' => $categorysingle->name,
            'slug' => $categorysingle->slug,
            'l_post' => $posts
        ];
        return $return;
    }
}