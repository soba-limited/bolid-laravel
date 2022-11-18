<?php

namespace App\Http\Controllers;

use App\Models\CSust;
use App\Http\Requests\StoreCSustRequest;
use App\Http\Requests\UpdateCSustRequest;
use Illuminate\Http\Request;

class CSustController extends Controller
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
     * @param  \App\Http\Requests\StoreCSustRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCSustRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CSust  $cSust
     * @return \Illuminate\Http\Response
     */
    public function show(CSust $cSust)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CSust  $cSust
     * @return \Illuminate\Http\Response
     */
    public function edit(CSust $cSust)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCSustRequest  $request
     * @param  \App\Models\CSust  $cSust
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCSustRequest $request, CSust $cSust)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CSust  $cSust
     * @return \Illuminate\Http\Response
     */
    public function destroy(CSust $cSust)
    {
        //
    }

    public function tab_return(Request $request)
    {
        $sust = CSust::where('c_profile_id', $request->c_profile_id)->get();
        return $this->jsonResponse($sust);
    }
}