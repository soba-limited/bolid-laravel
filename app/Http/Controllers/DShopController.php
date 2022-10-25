<?php

namespace App\Http\Controllers;

use App\Models\DShop;
use App\Http\Requests\StoreDShopRequest;
use App\Http\Requests\UpdateDShopRequest;
use App\Models\DComment;
use App\Models\DMall;
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
        $shop = LShop::limit(28)->get();
        $allarray = [
            'shop' => $shop,
        ];
        return $this->jsonResponse($allarray);
    }

    public function sort(Request $request)
    {
        $shop = LShop::all();
        if (isset($request->sort)) {
            if ($request->sort == 'new') {
                $shop = $shop->orderBy('id', 'desc');
            } elseif ($request->sort == 'good') {
                $shop = $shop->withCount('DGood')->orderBy('DGood_count', 'desc');
            } elseif ($request->sort == 'mall') {
                $shop = $shop->withCount('DMall')->orderBy('DMall_count', 'desc');
            } elseif ($request->sort == 'commet') {
                $shop = $shop->withCount('DComments')->orderBy('DComments_count', 'desc');
            }
        }
        if (isset($request->acount)) {
            if ($request->acount == 'official') {
                $shop = $shop->where('official', '!=', null);
            } elseif ($request->acount == 'nonofficial') {
                $shop = $shop->where('official', null);
            }
        }
        $shop = $shop->limit(28)->get();
        return $this->jsonResponse($shop);
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
        $shop = DShop::with(['DTag','DComments','DGood','user','DOverviews','DInfos','DCoupons','DItems','DSocials','DInstaApiTokens'])->find($shop_id);
        $comments_count = $shop->DComments->count();
        $good_count = $shop->DGood->count();
        $mall_count = $shop->DMall->count();

        $allarray = [
            'shop' => $shop,
            'comments_count' => $comments_count,
            'good_count' => $good_count,
            'mall_count' => $mall_count,
        ];

        return $this->jsonResponse($allarray);
    }

    public function comment_add($shop_id)
    {
        $comment = DComment::where('shop_id', $shop_id)->get();
        return $this->jsonResponse($comment);
    }

    public function return_mall($user_id)
    {
        $mall = DMall::where('user_id', $user_id)->get();
        return $this->jsonResponse($mall);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DShop  $dShop
     * @return \Illuminate\Http\Response
     */
    public function edit(DShop $dShop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDShopRequest  $request
     * @param  \App\Models\DShop  $dShop
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDShopRequest $request, DShop $dShop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DShop  $dShop
     * @return \Illuminate\Http\Response
     */
    public function destroy(DShop $dShop)
    {
        //
    }
}
