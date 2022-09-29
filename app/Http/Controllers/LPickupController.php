<?php

namespace App\Http\Controllers;

use App\Models\LPickup;
use App\Http\Requests\StoreLPickupRequest;
use App\Http\Requests\UpdateLPickupRequest;

class LPickupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $l_pick_up = LPickup::with('LPost')->orderBy('id', 'desc')->get();
        return $this->jsonResponse($l_pick_up);
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
     * @param  \App\Http\Requests\StoreLPickupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLPickupRequest $request, $id)
    {
        //
        $l_pick = LPickup::create([
            'l_post_id' => $id,
        ]);
        return 'この記事をピックアップに追加しました';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LPickup  $lPickup
     * @return \Illuminate\Http\Response
     */
    public function show(LPickup $lPickup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LPickup  $lPickup
     * @return \Illuminate\Http\Response
     */
    public function edit(LPickup $lPickup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLPickupRequest  $request
     * @param  \App\Models\LPickup  $lPickup
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLPickupRequest $request, LPickup $lPickup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LPickup  $lPickup
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        LPickup::find($id)->delete();
        return "この記事をピックアップから削除しました";
    }
}