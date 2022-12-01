<?php

namespace App\Http\Controllers;

use App\Models\CCard;
use App\Http\Requests\StoreCCardRequest;
use App\Http\Requests\UpdateCCardRequest;
use Illuminate\Http\Request;

class CCardController extends Controller
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
     * @param  \App\Http\Requests\StoreCCardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCCardRequest $request)
    {
        //
        $c_card = CCard::create([
            'c_profile_id' => $request->c_profile_id,
            'title' => $request->title,
        ]);

        $id = $c_card->id;

        if ($request->hasFile('thumbs')) {
            $thumbs_name = $request->file('thumbs')->getClientOriginalName();
            $request->file('thumbs')->storeAs('images/c_card/'.$id, $thumbs_name, 'public');
            $thumbs = 'images/c_card/'.$id."/".$thumbs_name;
            $c_card->thumbs = $thumbs;
            $c_card->save();
        }

        $c_cards = CCard::where('c_profile_id', $request->c_profile_id)->get();
        return $this->jsonResponse($c_cards);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CCard  $cCard
     * @return \Illuminate\Http\Response
     */
    public function show(CCard $cCard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CCard  $cCard
     * @return \Illuminate\Http\Response
     */
    public function edit(CCard $cCard, $c_card_id)
    {
        //
        $c_card = CCard::find($c_card_id);
        return $this->jsonResponse($c_card);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCCardRequest  $request
     * @param  \App\Models\CCard  $cCard
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCCardRequest $request, CCard $cCard, $c_card_id)
    {
        //
        $c_card = CCard::find($c_card_id);
        $id = $c_card->id;

        if ($request->hasFile('thumbs')) {
            $thumbs_name = $request->file('thumbs')->getClientOriginalName();
            $request->file('thumbs')->storeAs('images/c_card/'.$id, $thumbs_name, 'public');
            $thumbs = 'images/c_card/'.$id."/".$thumbs_name;
            $c_card->thumbs = $thumbs;
        }

        $c_card->update([
            'c_profile_id' => $request->c_profile_id,
            'title' => $request->title,
            'thumbs' => $request->hasFile('thumbs') ? $thumbs : $request->thumbs,
        ]);

        $c_cards = CCard::where('c_profile_id', $request->c_profile_id)->get();
        return $this->jsonResponse($c_cards);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CCard  $cCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(CCard $cCard, Request $request)
    {
        //
        $c_card = CCard::find($request->c_card_id);
        $c_profile_id = $c_card->c_profile_id;
        $c_card->delete();
        $c_cards = CCard::where('c_profile_id', $c_profile_id)->get();
        return $this->jsonResponse($c_cards);
    }

    public function tab_return(Request $request)
    {
        $card = CCard::where('c_profile_id', $request->c_profile_id)->get();
        return $this->jsonResponse($card);
    }
}