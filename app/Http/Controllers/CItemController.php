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
    public function edit(CItem $cItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCItemRequest  $request
     * @param  \App\Models\CItem  $cItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCItemRequest $request, CItem $cItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CItem  $cItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(CItem $cItem)
    {
        //
    }

    public function tab_return(Request $request)
    {
        $item = CItem::where('c_profile_id', $request->c_profile_id)->get();
        return $this->jsonResponse($item);
    }
}