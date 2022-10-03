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
     * @param  \App\Http\Requests\StoreDCouponRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDCouponRequest $request)
    {
        //
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
    public function edit(DCoupon $dCoupon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDCouponRequest  $request
     * @param  \App\Models\DCoupon  $dCoupon
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDCouponRequest $request, DCoupon $dCoupon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DCoupon  $dCoupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(DCoupon $dCoupon)
    {
        //
    }
}
