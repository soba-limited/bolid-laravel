<?php

namespace App\Http\Controllers;

use App\Models\DItem;
use App\Http\Requests\StoreDItemRequest;
use App\Http\Requests\UpdateDItemRequest;

class DItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($shop_id)
    {
        //
        $d_item = DItem::where('d_shop_id', $shop_id)->get();
        return $this->jsonResponse($d_item);
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
     * @param  \App\Http\Requests\StoreDItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDItemRequest $request, $shop_id)
    {
        //
        $d_item = DItem::create([
            'd_shop_id' => $shop_id,
            'title' => $request->title,
            'price' => $request->price,
        ]);

        $id = $d_item->id;

        if ($request->hasFile('thumbs')) {
            $file_name = $request->file('thumbs')->getClientOriginalName();
            $request->file('thumbs')->storeAs('images/d_coupon/'.$id, $file_name, 'public');
            $thumbs = 'images/d_item/'.$id."/".$file_name;
            $d_item->thumbs = $thumbs;
            $d_item->save();
        }

        return $this->jsonResponse($d_item);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DItem  $dItem
     * @return \Illuminate\Http\Response
     */
    public function show(DItem $dItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DItem  $dItem
     * @return \Illuminate\Http\Response
     */
    public function edit(DItem $dItem, $id)
    {
        //
        $d_item = DItem::find($id);
        return $this->jsonResponse($d_item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDItemRequest  $request
     * @param  \App\Models\DItem  $dItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDItemRequest $request, DItem $dItem, $id)
    {
        //
        if ($request->hasFile('thumbs')) {
            $file_name = $request->file('thumbs')->getClientOriginalName();
            $request->file('thumbs')->storeAs('images/d_coupon/'.$id, $file_name, 'public');
            $thumbs = 'images/d_coupon/'.$id."/".$file_name;
        } elseif ($request->thumbs == 'null') {
            $request->thumbs = null;
        }

        $d_item = DItem::find($id);
        $d_item = $d_item->update([
            'title' => $request->title,
            'price' => $request->price,
            'thumbs' => $request->hasFile('thumbs') ? $thumbs : $request->thumbs,
        ]);
        return $this->jsonResponse($d_item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DItem  $dItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(DItem $dItem, $id)
    {
        //
        $d_item = DItem::find($id);
        $d_item->delete();
        return '削除しました';
    }
}