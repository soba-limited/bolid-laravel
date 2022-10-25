<?php

namespace App\Http\Controllers;

use App\Models\LPresent;
use App\Models\LSidebar;
use App\Models\LPickup;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLPresentRequest;
use App\Http\Requests\UpdateLPresentRequest;

class LPresentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        $limit = 30;
        $skip = 0;

        if (isset($request->page) && $request->page > 1) {
            $skip = ($request->page - 1) * $limit;
        }

        $present_count = LPresent::all()->count();
        $page_max = $present_count % $limit > 0 ? floor($present_count / $limit) + 1: $present_count / $limit;

        $presents = LPresent::orderBy('id', 'desc')->skip($skip)->limit($limit)->get();

        //それぞれを配列に入れる
        $allarray = [
            'presents' => $presents,
            'page_max' => $page_max,
        ];
        $allarray = \Commons::LCommons($allarray);
        return $this->jsonResponse($allarray);
    }

    public function admin_index(Request $request)
    {
        //

        $limit = 30;
        $skip = 0;

        if (isset($request->page) && $request->page > 1) {
            $skip = ($request->page - 1) * $limit;
        }

        $present_count = LPresent::all()->count();
        $page_max = $present_count % $limit > 0 ? floor($present_count / $limit) + 1: $present_count / $limit;

        $presents = LPresent::orderBy('id', 'desc')->skip($skip)->limit($limit)->get();

        //それぞれを配列に入れる
        $allarray = [
            'presents' => $presents,
            'page_max' => $page_max,
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
            $request->file('thumbs')->storeAs('images/l_present/'.$id, $file_name, 'public');
            $thumbs = 'images/l_present/'.$id."/".$file_name;
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

    public function admin_show($id)
    {
        //
        $presents = LPresent::with('user')->find($id);

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
    public function edit($id)
    {
        //
        $presents = LPresent::find($id);
        return $this->jsonResponse($presents);
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
            $request->file('thumbs')->storeAs('images/l_present/'.$id, $file_name, 'public');
            $thumbs = 'images/l_present/'.$id."/".$file_name;
        }
        $l_present = LPresent::find($id)->update([
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
