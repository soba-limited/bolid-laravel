<?php

namespace App\Http\Controllers;

use App\Models\LPresent;
use App\Models\LSidebar;
use App\Models\LPickup;
use App\Http\Requests\StoreLPresentRequest;
use App\Http\Requests\UpdateLPresentRequest;

class LPresentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $presents = LPresent::orderBy('id', 'desc')->get();

        //それぞれを配列に入れる
        $allarray = [
            'presents' => $presents,
        ];
        $allarray = \Commons::LCommons($allarray);
        return $this->jsonResponse($allarray);
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
     * @param  \App\Http\Requests\StoreLPresentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLPresentRequest $request)
    {
        //
        $l_present = LPresent::create([
            'title' => $request->title,
            'offer' => $request->offer,
            'limit' => $request->limit
        ]);
        $id = $l_present->id;
        if ($request->hasFile('thumbs')) {
            $file_name = $request->file('thumbs')->getClientOriginalName();
            $request->file('thumbs')->storeAs('images/present/'.$id, $file_name, 'public');
            $thumbs = 'images/present/'.$id."/".$file_name;
            $l_present->thumbs = $thumbs;
            $l_present->save();
        }
        return $this->jsonResponse($l_present);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LPresent  $lPresent
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $presents = LPresent::find($id);

        //それぞれを配列に入れる
        $allarray = [
            'presents' => $presents,
        ];
        $allarray = \Commons::LCommons($allarray);
        return $this->jsonResponse($allarray);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LPresent  $lPresent
     * @return \Illuminate\Http\Response
     */
    public function edit(LPresent $lPresent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLPresentRequest  $request
     * @param  \App\Models\LPresent  $lPresent
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLPresentRequest $request, $id)
    {
        //
        if ($request->hasFile('thumbs')) {
            $file_name = $request->file('thumbs')->getClientOriginalName();
            $request->file('thumbs')->storeAs('images/present/'.$id, $file_name, 'public');
            $thumbs = 'images/present/'.$id."/".$file_name;
        }
        $l_present = LPost::find($id)->update([
            'title' => $request->title,
            'offer' => $request->offer,
            'limit' => $request->limit,
            'thumbs' => $request->hasFile('thumbs') ? $thumbs : $request->thumbs,
        ]);
        return $this->jsonResponse($l_present);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LPresent  $lPresent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $title = LPresent::find($id)->title;
        LPresent::find($id)->delete();
        return $title."は削除されました";
    }
}