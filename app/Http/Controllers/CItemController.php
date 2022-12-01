<?php

namespace App\Http\Controllers;

use App\Models\CItem;
use App\Http\Requests\StoreCItemRequest;
use App\Http\Requests\UpdateCItemRequest;
use Illuminate\Http\Request;

class CItemController extends Controller
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
     * @param  \App\Http\Requests\StoreCItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCItemRequest $request)
    {
        //
        $c_item = CItem::create([
            'c_profile_id' => $request->c_profile_id,
            'title' => $request->title,
            'category' => $request->category,
        ]);

        $id = $c_item->id;

        if ($request->hasFile('thumbs')) {
            $thumbs_name = $request->file('thumbs')->getClientOriginalName();
            $request->file('thumbs')->storeAs('images/c_item/'.$id, $thumbs_name, 'public');
            $thumbs = 'images/c_item/'.$id."/".$thumbs_name;
            $c_item->thumbs = $thumbs;
            $c_item->save();
        }

        $c_items = CItem::where('c_profile_id', $request->c_profile_id)->get();
        return $this->jsonResponse($c_items);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CItem  $cItem
     * @return \Illuminate\Http\Response
     */
    public function show(CItem $cItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CItem  $cItem
     * @return \Illuminate\Http\Response
     */
    public function edit(CItem $cItem, $c_item_id)
    {
        //
        $c_item = CItem::find($c_item_id);
        return $this->jsonResponse($c_item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCItemRequest  $request
     * @param  \App\Models\CItem  $cItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCItemRequest $request, CItem $cItem, $c_item_id)
    {
        //
        $c_item = CItem::find($c_item_id);
        $id = $c_item->id;

        if ($request->hasFile('thumbs')) {
            $thumbs_name = $request->file('thumbs')->getClientOriginalName();
            $request->file('thumbs')->storeAs('images/c_item/'.$id, $thumbs_name, 'public');
            $thumbs = 'images/c_item/'.$id."/".$thumbs_name;
            $c_item->thumbs = $thumbs;
        }

        $c_item->update([
            'c_profile_id' => $request->c_profile_id,
            'title' => $request->title,
            'category' => $request->category,
            'thumbs' => $request->hasFile('thumbs') ? $thumbs : $request->thumbs,
        ]);

        $c_items = CItem::where('c_profile_id', $request->c_profile_id)->get();
        return $this->jsonResponse($c_items);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CItem  $cItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(CItem $cItem, Request $request)
    {
        //
        $c_item = CItem::find($request->c_item_id);
        $c_profile_id = $c_item->c_profile_id;
        $c_item->delete();
        $c_items = CItem::where('c_profile_id', $c_profile_id)->get();
        return $this->jsonResponse($c_items);
    }

    public function tab_return(Request $request)
    {
        $item = CItem::where('c_profile_id', $request->c_profile_id)->get();
        return $this->jsonResponse($item);
    }
}