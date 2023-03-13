<?php

namespace App\Http\Controllers;

use App\Models\CCoupon;
use App\Http\Requests\StoreCCouponRequest;
use App\Http\Requests\UpdateCCouponRequest;
use Illuminate\Http\Request;

class CCouponController extends Controller
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
     * @param  \App\Http\Requests\StoreCCouponRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCCouponRequest $request)
    {
        //
        $c_coupon = CCoupon::create([
            'c_profile_id' => $request->c_profile_id,
            'title' => $request->title,
            'limit' => $request->limit,
        ]);

        $id = $c_coupon->id;

        if ($request->hasFile('thumbs')) {
            $thumbs_name = $request->file('thumbs')->getClientOriginalName();
            $request->file('thumbs')->storeAs('images/c_coupon/'.$id, $thumbs_name, 'public');
            $thumbs = 'images/c_coupon/'.$id."/".$thumbs_name;
            $c_coupon->thumbs = $thumbs;
            $c_coupon->save();
        }

        $c_coupons = CCoupon::where('c_profile_id', $request->c_profile_id)->orderBy('created_at', 'desc')->get();
        return $this->jsonResponse($c_coupons);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CCoupon  $cCoupon
     * @return \Illuminate\Http\Response
     */
    public function show(CCoupon $cCoupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CCoupon  $cCoupon
     * @return \Illuminate\Http\Response
     */
    public function edit(CCoupon $cCoupon, $c_coupon_id)
    {
        //
        $c_coupon = CCoupon::find($c_coupon_id);
        return $this->jsonResponse($c_coupon);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCCouponRequest  $request
     * @param  \App\Models\CCoupon  $cCoupon
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCCouponRequest $request, CCoupon $cCoupon, $c_coupon_id)
    {
        //
        $c_coupon = CCoupon::find($c_coupon_id);
        $id = $c_coupon->id;

        if ($request->hasFile('thumbs')) {
            $thumbs_name = $request->file('thumbs')->getClientOriginalName();
            $request->file('thumbs')->storeAs('images/c_coupon/'.$id, $thumbs_name, 'public');
            $thumbs = 'images/c_coupon/'.$id."/".$thumbs_name;
            $c_coupon->thumbs = $thumbs;
        }

        $c_coupon->update([
            'c_profile_id' => $request->c_profile_id,
            'title' => $request->title,
            'limit' => $request->limit,
            'thumbs' => $request->hasFile('thumbs') ? $thumbs : $request->thumbs,
        ]);

        $c_coupons = CCoupon::where('c_profile_id', $request->c_profile_id)->orderBy('created_at', 'desc')->get();
        return $this->jsonResponse($c_coupons);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CCoupon  $cCoupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(CCoupon $cCoupon, Request $request)
    {
        //
        $c_coupon = CCoupon::find($request->c_coupon_id);
        $c_profile_id = $c_coupon->c_profile_id;
        $c_coupon->delete();
        $c_coupons = CCoupon::where('c_profile_id', $c_profile_id)->get();
        return $this->jsonResponse($c_coupons);
    }

    public function tab_return(Request $request)
    {
        $coupon = CCoupon::where('c_profile_id', $request->c_profile_id)->orderBy('created_at', 'desc')->get();
        return $this->jsonResponse($coupon);
    }
}
