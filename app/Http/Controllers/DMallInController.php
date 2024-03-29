<?php

namespace App\Http\Controllers;

use App\Models\DMallIn;
use App\Http\Requests\StoreDMallInRequest;
use App\Http\Requests\UpdateDMallInRequest;
use Illuminate\Http\Request;

class DMallInController extends Controller
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
     * @param  \App\Http\Requests\StoreDMallInRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDMallInRequest $request)
    {
        //
        $d_mall_in = DMallIn::create([
            'd_mall_id' => $request->d_mall_id,
            'd_shop_id' => $request->d_shop_id,
            'user_id' => $request->user_id,
        ]);

        return $this->jsonResponse($d_mall_in);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DMallIn  $dMallIn
     * @return \Illuminate\Http\Response
     */
    public function show(DMallIn $dMallIn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DMallIn  $dMallIn
     * @return \Illuminate\Http\Response
     */
    public function edit(DMallIn $dMallIn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDMallInRequest  $request
     * @param  \App\Models\DMallIn  $dMallIn
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDMallInRequest $request, DMallIn $dMallIn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DMallIn  $dMallIn
     * @return \Illuminate\Http\Response
     */
    public function destroy(DMallIn $dMallIn, Request $request)
    {
        //
        $mallin = DMallIn::where('d_mall_id', $request->d_mall_id)->where('d_shop_id', $request->d_shop_id)->first();
        $mallin->delete();
        return '解除しました';
    }
}