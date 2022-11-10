<?php

namespace App\Http\Controllers;

use App\Models\DInstaApiToken;
use App\Http\Requests\StoreDInstaApiTokenRequest;
use App\Http\Requests\UpdateDInstaApiTokenRequest;

class DInstaApiTokenController extends Controller
{
    /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */
    public function index($shop_id)
    {
        //
        $d_insta = DInstaApiToken::where('d_shop_id', $shop_id)->get();
        return $this->jsonResponse($d_insta);
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
     * @param  \App\Http\Requests\StoreDInstaApiTokenRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDInstaApiTokenRequest $request, $shop_id)
    {
        //
        $d_insta = DInstaApiToken::create([
            'd_shop_id' => $shop_id,
            'account_name' => $request->account_name,
            'user_name' => $request->user_name,
            'api_token' => $request->api_token,
        ]);
        return $this->jsonResponse($d_insta);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DInstaApiToken  $dInstaApiToken
     * @return \Illuminate\Http\Response
     */
    public function show(DInstaApiToken $dInstaApiToken)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DInstaApiToken  $dInstaApiToken
     * @return \Illuminate\Http\Response
     */
    public function edit(DInstaApiToken $dInstaApiToken, $id)
    {
        //
        $d_insta = DInstaApiToken::find($id);
        return $this->jsonResponse($d_insta);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDInstaApiTokenRequest  $request
     * @param  \App\Models\DInstaApiToken  $dInstaApiToken
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDInstaApiTokenRequest $request, DInstaApiToken $dInstaApiToken, $id)
    {
        //
        $d_insta = DInstaApiToken::find($id);
        $d_insta = $d_insta->update([
            'account_name' => $request->account_name,
            'user_name' => $request->user_name,
            'api_token' => $request->api_token,
        ]);
        return $this->jsonResponse($d_insta);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DInstaApiToken  $dInstaApiToken
     * @return \Illuminate\Http\Response
     */
    public function destroy(DInstaApiToken $dInstaApiToken, $id)
    {
        //
        $d_insta = DInstaApiToken::find($id);
        $d_insta->delete();
        return '削除しました';
    }
}