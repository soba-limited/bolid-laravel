<?php

namespace App\Http\Controllers;

use App\Models\DPickup;
use App\Http\Requests\StoreDPickupRequest;
use App\Http\Requests\UpdateDPickupRequest;
use Illuminate\Http\Request;

class DPickupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pick = DPickup::with(['DShop'])->get();
        return $this->jsonResponse($pick);
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
     * @param  \App\Http\Requests\StoreDPickupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDPickupRequest $request)
    {
        //
        $pick = DPickup::create([
            'd_shop_id' => $request->d_shop_id,
            'order' => $request->order,
            'state' => $request->state,
        ]);

        return $this->jsonResponse($pick);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DPickup  $dPickup
     * @return \Illuminate\Http\Response
     */
    public function show(DPickup $dPickup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DPickup  $dPickup
     * @return \Illuminate\Http\Response
     */
    public function edit(DPickup $dPickup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDPickupRequest  $request
     * @param  \App\Models\DPickup  $dPickup
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDPickupRequest $request, DPickup $dPickup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DPickup  $dPickup
     * @return \Illuminate\Http\Response
     */
    public function destroy(DPickup $dPickup, $id)
    {
        //
        $pick = DPickup::find($id);
        $pick->delete();
        return '削除しました';
    }
}