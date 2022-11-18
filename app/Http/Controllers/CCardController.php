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
    public function edit(CCard $cCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCCardRequest  $request
     * @param  \App\Models\CCard  $cCard
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCCardRequest $request, CCard $cCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CCard  $cCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(CCard $cCard)
    {
        //
    }

    public function tab_return(Request $request)
    {
        $card = CCard::where('c_profile_id', $request->c_profile_id)->get();
        return $this->jsonResponse($card);
    }
}