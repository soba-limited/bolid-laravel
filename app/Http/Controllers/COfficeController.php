<?php

namespace App\Http\Controllers;

use App\Models\COffice;
use App\Http\Requests\StoreCOfficeRequest;
use App\Http\Requests\UpdateCOfficeRequest;
use Illuminate\Http\Request;

class COfficeController extends Controller
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
     * @param  \App\Http\Requests\StoreCOfficeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCOfficeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\COffice  $cOffice
     * @return \Illuminate\Http\Response
     */
    public function show(COffice $cOffice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\COffice  $cOffice
     * @return \Illuminate\Http\Response
     */
    public function edit(COffice $cOffice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCOfficeRequest  $request
     * @param  \App\Models\COffice  $cOffice
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCOfficeRequest $request, COffice $cOffice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\COffice  $cOffice
     * @return \Illuminate\Http\Response
     */
    public function destroy(COffice $cOffice)
    {
        //
    }

    public function tab_return(Request $request)
    {
        $office = COffice::where('c_profile_id', $request->c_profile_id)->get();
        return $this->jsonResponse($office);
    }
}