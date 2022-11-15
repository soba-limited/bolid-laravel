<?php

namespace App\Http\Controllers;

use App\Models\DInfo;
use App\Http\Requests\StoreDInfoRequest;
use App\Http\Requests\UpdateDInfoRequest;

class DInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($shop_id)
    {
        //
        $d_info = DInfo::where('d_shop_id', $shop_id)->get();
        return $this->jsonResponse($d_info);
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
     * @param  \App\Http\Requests\StoreDInfoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDInfoRequest $request, $shop_id)
    {
        //
        $d_info = DInfo::create([
            'd_shop_id' => $shop_id,
            'title' => $request->title,
            'content' => $request->content,
        ]);
        $d_infos = DInfo::where('d_shop_id', $d_info->d_shop_id)->get();
        return $this->jsonResponse($d_infos);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DInfo  $dInfo
     * @return \Illuminate\Http\Response
     */
    public function show(DInfo $dInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DInfo  $dInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(DInfo $dInfo, $id)
    {
        //
        $d_info = DInfo::find($id);
        return $this->jsonResponse($d_info);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDInfoRequest  $request
     * @param  \App\Models\DInfo  $dInfo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDInfoRequest $request, DInfo $dInfo, $id)
    {
        //
        $d_info = DInfo::find($id);
        $d_info->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        $d_infos = DInfo::where('d_shop_id', $d_info->d_shop_id)->get();
        return $this->jsonResponse($d_infos);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DInfo  $dInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(DInfo $dInfo, $id)
    {
        //
        $d_info = DInfo::find($id);
        $d_shop_id = $d_info->d_shop_id;
        $d_info->delete();
        $d_infos = DInfo::where('d_shop_id', $d_shop_id)->get();
        return $this->jsonResponse($d_infos);
    }
}