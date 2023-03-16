<?php

namespace App\Http\Controllers;

use App\Models\DShop;
use App\Http\Requests\StoreDShopRequest;
use App\Http\Requests\UpdateDShopRequest;
use App\Models\CSalon;
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
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

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

        if (!empty($request->s)) {
            $shop = $shop->where('name', 'like', '%'.$request->s.'%')->orWhere('description', 'like', '%'.$request->s.'%');
        } elseif (!empty($request->tag_id)) {
            $shop = $shop::whereHas('DTags', function ($query) use ($request) {
                $query->where('d_tag_id', $request->tag_id);
            });
        }


        $limit = 28;
        $skip = ($page - 1) * $limit;

        $count = $shop->count();
        $page_max = $count % $limit > 0 ? floor($count / $limit) + 1: $count / $limit;

        $shop = $shop->limit($limit)->skip($skip)->with('DTags')->withCount('DGoods')->withCount('DMalls')->withCount('DComments')->get();

        $allarray = [
            'shop' => $shop,
            'page_max' => $page_max,
        ];

        return $this->jsonResponse($allarray);
    }

    public function search(Request $request, $page, $sort, $acount)
    {
        $shop = new DShop;

        if (!empty($request->s)) {
            $shop = $shop->where('name', 'like', '%'.$request->s.'%')->orWhere('description', 'like', '%'.$request->s.'%');
        } elseif (!empty($request->tag_id)) {
            $shop = $shop::whereHas('DTags', function ($query) use ($request) {
                $query->where('d_tag_id', $request->tag_id);
            });
        }

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

        $shop = $shop->limit($limit)->skip($skip)->withCount('DGoods')->withCount('DMalls')->withCount('DComments')->with(['user.DProfile','DOfficial.DProfile'])->get();

        $allarray = [
            'shop' => $shop,
            'page_max' => $page_max,
            'now_page' => $request->page,
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

        $data = file_get_contents($request->thumbs);
        $imgname = "images/d_post/".$id.$request->imgname;
        file_put_contents('./storage/'.$imgname, $data);
        $d_shop->thumbs = $imgname;
        $d_shop->save();

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
            $d_shop->DTags()->sync($tag_ids);
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
        $shop = DShop::with(['DTags','DGoods','user','DOverviews','DInfos','DCoupons','DItems','DSocials','DInstaApiTokens','DPickups'])->with(['DComments'=>function ($query) {
            $query->with(['user'=>function ($query) {
                $query->with('DProfile');
            }]);
        }])->find($shop_id)->makeVisible('description');
        $user_id = $shop->user->id;
        $comments_count = $shop->DComments->count();
        $good_count = $shop->DGoods->count();
        $mall_count = $shop->DMalls->count();
        $kanren = DShop::inRandomOrder()->limit(4)->get();
        $salon = null;
        if (!empty($shop->official_user_id)) {
            $salon = CSalon::where('user_id', $shop->official_user_id)->get();
        }

        $allarray = [
            'shop' => $shop,
            'comments_count' => $comments_count,
            'good_count' => $good_count,
            'mall_count' => $mall_count,
            'kanren' => $kanren,
            'salon' => $salon,
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
            $d_shop->DTags()->sync($tag_ids);
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
        $shop = DShop::find($shop_id);
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
        $page_check = DShop::where('url', $url)->first();
        if (!empty($page_check->id)) {
            return "すでにショップがあります";
        } else {
            $ctx = stream_context_create(
                array(
                    'http' => array(
                                'method' => 'GET',
                                'header' => 'User-Agent: Mozilla/5.0 (Windows NT 6.3; WOW64; Trident/7.0; Touch; rv:11.0) like Gecko')
                    )
            );

            $output = mb_convert_encoding(file_get_contents($url, false, $ctx), 'UTF-8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS,SJIS-WIN');

            preg_match('{<title>(.*?)</title>}s', $output, $title);
            preg_match('{<meta name="description" content="(.*?)"}s', $output, $description);
            preg_match('{<meta name="keywords" content="(.*?)"}s', $output, $keyword);

            $title = !empty($title)? $title[1]: null;
            $description = !empty($description)? $description[1]: null;
            $keyword = !empty($keyword)? $keyword[1]: null;

            $allarray = [
                'title'=>$title,
                'description'=>$description,
                'keyword'=>$keyword,
            ];

            /*
            $screenshot = Http::withToken("xlbYNVjnspZDsengFs4F6FmNuhjPMduZtYOhWeUh")->get("https://screendot.io/api/standard?url=".$request->url."&delay=5000&browserWidth=1400&browserHeight=2100&width=470&format=webp&refresh=true&response=json")->body();

            $imgsrc = json_decode($screenshot);

            $allarray = [
                'title'=>$title,
                'description'=>$description,
                'keyword'=>$keyword,
                'imgsrc' => $imgsrc->url,
                'imgname' => $imgsrc->id,
            ];

            */

            // set optional parameters (leave blank if unused)
            $params['width'] = '470';
            $params['viewport']  = '1400x2100';
            $params['format'] = 'jpg';
            $params['delay'] = '5';

            // capture
            $call = DShopController::screenshotlayer($url, $params);

            //dd($call);

            $screenshot = Http::get($call)->body();

            $allarray = [
                'title'=>$title,
                'description'=>$description,
                'keyword'=>$keyword,
                'imgsrc' => $call,
                'imgname' => substr(str_shuffle("ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz0123456789"), 0, 16),
            ];

            return $this->jsonResponse($allarray);
        }
    }

    public static function screenshotlayer($url, $args)
    {
        // set access key
        $access_key = "6a8fee5ff3253cbddf6564252ebef9d4";

        // set secret keyword (defined in account dashboard)
        $secret_keyword = "bolides20230303Japan";

        // encode target URL
        $params['url'] = urlencode($url);

        $params += $args;

        // create the query string based on the options
        foreach ($params as $key => $value) {
            $parts[] = "$key=$value";
        }

        // compile query string
        $query = implode("&", $parts);

        // generate secret key from target URL and secret keyword
        $secret_key = md5($url . $secret_keyword);

        return "https://api.screenshotlayer.com/api/capture?access_key=$access_key&secret_key=$secret_key&$query";
    }
}
