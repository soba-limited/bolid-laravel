<?php

namespace App\Http\Controllers;

use App\Models\DMall;
use App\Models\DMallIn;
use App\Models\User;
use App\Http\Requests\StoreDMallRequest;
use App\Http\Requests\UpdateDMallRequest;
use Illuminate\Http\Request;

class DMallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
    }

    public function return_mall(Request $request)
    {
        $mall = DMall::where('user_id', $request->user_id)->get();
        $mall_in = DMallIn::where('user_id', $request->user_id)->where('d_shop_id', $request->d_shop_id)->pluck('d_mall_id');
        $allarray = [
            'mall' => $mall,
            'mall_in' => $mall_in,
        ];
        return $this->jsonResponse($allarray);
    }

    public function mycreate(Request $request)
    {
        $mall = DMall::where('user_id', $request->user_id)->with(['DMallIn',function ($query) {
            $query->limit(4);
        }])->withCount('DMallIn')->get();
        return $this->jsonResponse($mall);
    }

    public function bookmarks(Request $request)
    {
        $user = User::find($request->user_id);
        $mall = $user->DMallBookmark->with(['DMallIn',function ($query) {
            $query->limit(4);
        }])->withCount('DMallIn')->with('user')->get();
        return $this->jsonResponse($mall);
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
     * @param  \App\Http\Requests\StoreDMallRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDMallRequest $request)
    {
        //
        DMall::create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'lock' => $request->lock
        ]);

        $mall = DMall::where('user_id', $request->user_id)->get();
        $mall_in = DMallIn::where('user_id', $request->user_id)->where('d_shop_id', $request->d_shop_id)->pluck('d_mall_id');
        $allarray = [
            'mall' => $mall,
            'mall_in' => $mall_in,
        ];
        return $this->jsonResponse($allarray);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DMall  $dMall
     * @return \Illuminate\Http\Response
     */
    public function show(DMall $dMall, $mall_id)
    {
        //
        $mall = DMall::with('DMallIn')->with(['user',function ($query) {
            $query->with('DProfile');
        }])->find($mall_id);
        return $this->jsonResponse($mall);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DMall  $dMall
     * @return \Illuminate\Http\Response
     */
    public function edit(DMall $dMall, $mall_id)
    {
        //
        $d_mall = DMall::find($mall_id);

        return $this->jsonResponse($d_mall);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDMallRequest  $request
     * @param  \App\Models\DMall  $dMall
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDMallRequest $request, DMall $dMall, $mall_id)
    {
        //
        $d_mall = DMall::find($mall_id);
        $d_mall = $d_mall->update([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'lock' => $request->lock
        ]);
        return $this->jsonResponse($d_mall);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DMall  $dMall
     * @return \Illuminate\Http\Response
     */
    public function destroy(DMall $dMall)
    {
        //
    }

    public function mall_in_all(Request $request)
    {
        $mall_in_shop = DMall::find($request->mall_id)->DMallIn;
        return $this->jsonResponse($mall_in_shop);
    }
}