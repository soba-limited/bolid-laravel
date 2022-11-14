<?php

namespace App\Http\Controllers;

use App\Models\CCoupon;
use App\Http\Requests\StoreCCouponRequest;
use App\Http\Requests\UpdateCCouponRequest;

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
    public function edit(CCoupon $cCoupon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCCouponRequest  $request
     * @param  \App\Models\CCoupon  $cCoupon
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCCouponRequest $request, CCoupon $cCoupon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CCoupon  $cCoupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(CCoupon $cCoupon)
    {
        //
    }
}
