<?php

namespace App\Http\Controllers;

use App\Models\DSocial;
use App\Http\Requests\StoreDSocialRequest;
use App\Http\Requests\UpdateDSocialRequest;

class DSocialController extends Controller
{
    /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */
    public function index($shop_id)
    {
        //
        $d_social = DSocial::where('d_shop_id', $shop_id)->get();
        return $this->jsonResponse($d_social);
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
     * @param  \App\Http\Requests\StoreDSocialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDSocialRequest $request, $shop_id)
    {
        //
        $d_social = DSocial::create([
            'd_shop_id' => $shop_id,
            'name' => $request->name,
            'link' => $request->link,
        ]);
        $d_socials = DSocial::where('d_shop_id', $d_social->d_shop_id)->get();
        return $this->jsonResponse($d_socials);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DSocial  $dSocial
     * @return \Illuminate\Http\Response
     */
    public function show(DSocial $dSocial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DSocial  $dSocial
     * @return \Illuminate\Http\Response
     */
    public function edit(DSocial $dSocial, $id)
    {
        //
        $d_social = DSocial::find($id);
        return $this->jsonResponse($d_social);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDSocialRequest  $request
     * @param  \App\Models\DSocial  $dSocial
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDSocialRequest $request, DSocial $dSocial, $id)
    {
        //
        $d_social = DSocial::find($id);
        $d_social->update([
            'name' => $request->name,
            'link' => $request->link,
        ]);
        $d_socials = DSocial::where('d_shop_id', $d_social->d_shop_id)->get();
        return $this->jsonResponse($d_socials);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DSocial  $dSocial
     * @return \Illuminate\Http\Response
     */
    public function destroy(DSocial $dSocial, $id)
    {
        //
        $d_social = DSocial::find($id);
        $d_shop_id = $d_social->d_shop_id;
        $d_social->delete();
        $d_socials = DSocial::where('d_shop_id', $d_shop_id)->get();
        return $this->jsonResponse($d_socials);
    }
}