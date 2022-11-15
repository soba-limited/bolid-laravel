<?php

namespace App\Http\Controllers;

use App\Models\DCoupon;
use App\Http\Requests\StoreDCouponRequest;
use App\Http\Requests\UpdateDCouponRequest;

class DCouponController extends Controller
{
    /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */
    public function index($shop_id)
    {
        //
        $d_coupon = DCoupon::where('d_shop_id', $shop_id)->get();
        return $this->jsonResponse($d_coupon);
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
     * @param  \App\Http\Requests\StoreDCouponRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDCouponRequest $request, $shop_id)
    {
        //
        $d_coupon = DCoupon::create([
            'd_shop_id' => $shop_id,
            'title' => $request->title,
            'content' => $request->content,
            'limit' => $request->limit
        ]);
        $d_coupons = DCoupon::where('d_shop_id', $d_coupon->d_shop_id)->get();
        return $this->jsonResponse($d_coupons);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DCoupon  $dCoupon
     * @return \Illuminate\Http\Response
     */
    public function show(DCoupon $dCoupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DCoupon  $dCoupon
     * @return \Illuminate\Http\Response
     */
    public function edit(DCoupon $dCoupon, $id)
    {
        //
        $d_coupon = DCoupon::find($id);
        return $this->jsonResponse($d_coupon);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDCouponRequest  $request
     * @param  \App\Models\DCoupon  $dCoupon
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDCouponRequest $request, DCoupon $dCoupon, $id)
    {
        //
        $d_coupon = DCoupon::find($id);
        $d_coupon->update([
            'title' => $request->title,
            'content' => $request->content,
            'limit' => $request->limit,
        ]);
        $d_coupons = DCoupon::where('d_shop_id', $d_coupon->d_shop_id)->get();
        return $this->jsonResponse($d_coupons);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DCoupon  $dCoupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(DCoupon $dCoupon, $id)
    {
        //
        $d_coupon = DCoupon::find($id);
        $d_shop_id = $d_coupon->d_shop_id;
        $d_coupon->delete();
        $d_coupons = DCoupon::where('d_shop_id', $d_shop_id)->get();
        return $this->jsonResponse($d_coupons);
    }
}