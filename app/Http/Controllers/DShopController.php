<?php

namespace App\Http\Controllers;

use App\Models\DShop;
use App\Http\Requests\StoreDShopRequest;
use App\Http\Requests\UpdateDShopRequest;
use App\Models\DComment;
use App\Models\DCoupon;
use App\Models\DInfo;
use App\Models\DInstaApiToken;
use App\Models\DItem;
use App\Models\DMall;
use App\Models\DOverview;
use App\Models\DSocial;
use App\Models\DTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class DShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $shop = DShop::limit(28)->get();
        $allarray = [
            'shop' => $shop,
        ];
        return $this->jsonResponse($allarray);
    }

    public function sort(Request $request, $page, $sort, $acount)
    {
        $shop = new DShop;
        if (isset($sort)) {
            if ($sort == 'new') {
                $shop = $shop->orderBy('id', 'desc');
            } elseif ($sort == 'good') {
                $shop = $shop->withCount('DGoods')->orderBy('d_goods_count', 'desc');
            } elseif ($sort == 'mall') {
                $shop = $shop->withCount('DMalls')->orderBy('d_malls_count', 'desc');
            } elseif ($sort == 'comment') {
                $shop = $shop->withCount('DComments')->orderBy('d_comments_count', 'desc');
            }
        }
        if (isset($acount)) {
            if ($acount == 'official') {
                $shop = $shop->where('official_user_id', '!=', null);
            } elseif ($acount == 'notofficial') {
                $shop = $shop->where('official_user_id', null);
            }
        }

        $limit = 28;
        $skip = ($page - 1) * $limit;

        $count = $shop->count();
        $page_max = $count % $limit > 0 ? floor($count / $limit) + 1: $count / $limit;

        $shop = $shop->limit($limit)->skip($skip)->withCount('DGoods')->withCount('DMalls')->withCount('DComments')->get();

        $allarray = [
            'shop' => $shop,
            'page_max' => $page_max,
        ];

        return $this->jsonResponse($allarray);
    }

    public function search(Request $request, $page, $sort, $acount)
    {
        $shop = new DShop;
        if (!empty($sort)) {
            if ($sort == 'new') {
                $shop = $shop->orderBy('id', 'desc');
            } elseif ($sort == 'good') {
                $shop = $shop->withCount('DGoods')->orderBy('d_goods_count', 'desc');
            } elseif ($sort == 'mall') {
                $shop = $shop->withCount('DMalls')->orderBy('d_malls_count', 'desc');
            } elseif ($sort == 'comment') {
                $shop = $shop->withCount('DComments')->orderBy('d_comments_count', 'desc');
            }
        }
        if (!empty($acount)) {
            if ($acount == 'official') {
                $shop = $shop->where('official_user_id', '!=', null);
            } elseif ($acount == 'notofficial') {
                $shop = $shop->where('official_user_id', null);
            }
        }

        $limit = 28;
        $skip = ($page - 1) * $limit;

        $count = $shop->count();
        $page_max = $count % $limit > 0 ? floor($count / $limit) + 1: $count / $limit;

        $shop = $shop->where('name', 'like', '%'.$request->s.'%')->orWhere('description', 'like', '%'.$request->s.'%');

        $shop = $shop->limit($limit)->skip($skip)->withCount('DGoods')->withCount('DMalls')->withCount('DComments')->get();

        $allarray = [
            'shop' => $shop,
            'page_max' => $page_max,
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
     * @param  \App\Http\Requests\StoreDShopRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDShopRequest $request)
    {
        //
        $d_shop = DShop::create([
            'user_id' => $request->user_id,
            'url' => $request->url,
            'name' => $request->name,
            'description' => $request->description,
            'image_permission' => 0,
        ]);

        $id = $d_shop->id;

        if ($request->hasFile('thumbs')) {
            $thumbs_name = $request->file('thumbs')->getClientOriginalName();
            $request->file('thumbs')->storeAs('images/d_shop/'.$id, $thumbs_name, 'public');
            $thumbs = 'images/d_shop/'.$id."/".$thumbs_name;
            $d_shop->thumbs = $thumbs;
        }

        if ($request->hasFile('thumbs')) {
            $d_shop->save();
        }

        $tag_ids = [];

        if (!empty($request->tag)) {
            $tags = explode(",", $request->tag);
            if ($d_shop->official_user_id == 0) {
                array_splice($tags, 3);
            }
            foreach ($tags as $tag) {
                $tag_single = DTag::firstOrCreate(['name'=>$tag]);
                array_push($tag_ids, $tag_single->id);
            }
            foreach ($tag_ids as $tag_id) {
                $d_shop->DTags()->attach($tag_id);
            }
        }

        return $this->jsonResponse($d_shop);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DShop  $dShop
     * @return \Illuminate\Http\Response
     */
    public function show(DShop $dShop, $shop_id)
    {
        //
        $shop = DShop::with(['DTags','DGoods','user','DOverviews','DInfos','DCoupons','DItems','DSocials','DInstaApiTokens'])->with(['DComments'=>function ($query) {
            $query->with(['user'=>function ($query) {
                $query->with('DProfile');
            }]);
        }])->find($shop_id)->makeVisible('description');
        $comments_count = $shop->DComments->count();
        $good_count = $shop->DGoods->count();
        $mall_count = $shop->DMalls->count();
        $kanren = DShop::inRandomOrder()->limit(4)->get();

        $allarray = [
            'shop' => $shop,
            'comments_count' => $comments_count,
            'good_count' => $good_count,
            'mall_count' => $mall_count,
            'kanren' => $kanren,
        ];

        return $this->jsonResponse($allarray);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DShop  $dShop
     * @return \Illuminate\Http\Response
     */
    public function edit(DShop $dShop, $shop_id)
    {
        //
        $shop = DShop::with('DTags')->find($shop_id)->makeVisible('description');
        return $this->jsonResponse($shop);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDShopRequest  $request
     * @param  \App\Models\DShop  $dShop
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDShopRequest $request, DShop $dShop, $shop_id)
    {
        //


        $d_shop = DShop::find($shop_id);
        $id = $shop_id;

        if ($request->hasFile('thumbs')) {
            $thumbs_name = $request->file('thumbs')->getClientOriginalName();
            $request->file('thumbs')->storeAs('images/d_post/'.$id, $thumbs_name, 'public');
            $thumbs = 'images/d_post/'.$id."/".$thumbs_name;
        }

        $d_shop->update([
            'user_id' => $request->user_id,
            'url' => $request->url,
            'name' => $request->name,
            'description' => $request->description,
            'thumbs' => $request->hasFile('thumbs') ? $thumbs : $request->thumbs,
        ]);

        $tag_ids = [];

        if (!empty($request->tag)) {
            $tags = explode(",", $request->tag);
            if ($d_shop->official_user_id == 0) {
                array_splice($tags, 3);
            }
            foreach ($tags as $tag) {
                $tag_single = DTag::firstOrCreate(['name'=>$tag]);
                array_push($tag_ids, $tag_single->id);
            }
            foreach ($tag_ids as $tag_id) {
                $d_shop->DTags()->syncWithoutDetaching($tag_id);
            }
        }

        return $this->jsonResponse($d_shop);
    }

    public function image_permission(Request $request)
    {
        $shop = DShop::find($request->d_shop_id);
        $shop = $shop->update([
            'image_permission' => $request->image_permission
        ]);
        return $this->jsonResponse($shop);
    }

    public function official_add(Request $request)
    {
        $shop = DShop::find($request->d_shop_id);
        $shop = $shop->update([
            'official_user_id' => $request->official_user_id
        ]);
        return $this->jsonResponse($shop);
    }

    public function official_cancel(Request $request)
    {
        $shop = DShop::find($request->d_shop_id);
        $shop = $shop->update([
            'official_user_id' => null
        ]);
        return $this->jsonResponse($shop);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DShop  $dShop
     * @return \Illuminate\Http\Response
     */
    public function destroy(DShop $dShop, $shop_id)
    {
        //
        $d_post = DShop::find($shop_id);
        $d_post->delete();
    }

    public function official($shop_id)
    {
        $shop = DShop::finde($shop_id);
        $overview = DOverview::where('d_shop_id', $shop_id)->get();
        $info = DInfo::where('d_shop_id', $shop_id)->get();
        $coupon = DCoupon::where('d_shop_id', $shop_id)->get();
        $item = DItem::where('d_shop_id', $shop_id)->get();
        $social = DSocial::where('d_shop_id', $shop_id)->get();
        $insta_api = DInstaApiToken::where('d_shop_id', $shop_id)->get();
        $allarray = [
            'shop' => $shop,
            'overview' => $overview,
            'info' => $info,
            'coupon' => $coupon,
            'item' => $item,
            'social' => $social,
            'insta_api' => $insta_api
        ];
        return $this->jsonResponse($allarray);
    }

    public function shop_create_url(Request $request)
    {
        $url = $request->url;
        $output = mb_convert_encoding(file_get_contents($url), "utf-8", "auto");
        preg_match('{<title>(.*?)</title>}', $output, $title);
        preg_match('{<meta name="description" content="(.*?)"}', $output, $description);
        preg_match('{<meta name="keywords" content="(.*?)"}', $output, $keyword);

        $title = !empty($title)? $title[1]: null;
        $description = !empty($description)? $description[1]: null;
        $keyword = !empty($keyword)? $keyword[1]: null;

        $allarray = [
            'title'=>$title,
            'description'=>$description,
            'keyword'=>$keyword,
        ];
        return $this->jsonResponse($allarray);
    }
}