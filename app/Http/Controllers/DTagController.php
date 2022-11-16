<?php

namespace App\Http\Controllers;

use App\Models\DTag;
use App\Http\Requests\StoreDTagRequest;
use App\Http\Requests\UpdateDTagRequest;

class DTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tags = DTag::withCount('DShop')->orderBy('d_shop_count', 'desc')->limit(20)->get();
        return $this->jsonResponse($tags);
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
     * @param  \App\Http\Requests\StoreDTagRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDTagRequest $request)
    {
        //
        $tags = $request->tag;
        $tag_array = [];
        foreach ($tags as $tag) {
            $getTag = DTag::firstOrCreate(['name'=>$tag->name]);
            $tag_array = array_push($tag_array, $getTag->id);
        }
        return $this->jsonResponse($tag_array);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DTag  $dTag
     * @return \Illuminate\Http\Response
     */
    public function show(DTag $dTag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DTag  $dTag
     * @return \Illuminate\Http\Response
     */
    public function edit(DTag $dTag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDTagRequest  $request
     * @param  \App\Models\DTag  $dTag
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDTagRequest $request, DTag $dTag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DTag  $dTag
     * @return \Illuminate\Http\Response
     */
    public function destroy(DTag $dTag)
    {
        //
    }
}