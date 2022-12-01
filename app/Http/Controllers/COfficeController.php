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
        $c_office = COffice::create([
            'c_profile_id' => $request->c_profile_id,
            'title' => $request->title,
            'category' => $request->category,
            'content' => $request->content,
        ]);

        $c_offices = COffice::where('c_profile_id', $request->c_profile_id)->get();
        return $this->jsonResponse($c_offices);
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
    public function edit(COffice $cOffice, $c_office_id)
    {
        //
        $c_office = COffice::find($c_office_id);
        return $this->jsonResponse($c_office);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCOfficeRequest  $request
     * @param  \App\Models\COffice  $cOffice
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCOfficeRequest $request, COffice $cOffice, $c_office_id)
    {
        //
        $c_office = COffice::find($c_office_id);

        $c_office->update([
            'c_profile_id' => $request->c_profile_id,
            'title' => $request->title,
            'category' => $request->category,
            'content' => $request->content,
        ]);

        $c_offices = COffice::where('c_profile_id', $request->c_profile_id)->get();
        return $this->jsonResponse($c_offices);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\COffice  $cOffice
     * @return \Illuminate\Http\Response
     */
    public function destroy(COffice $cOffice, Request $request)
    {
        //
        $c_office = COffice::find($request->c_office_id);
        $c_profile_id = $c_office->c_profile_id;
        $c_office->delete();
        $c_offices = COffice::where('c_profile_id', $c_profile_id)->get();
        return $this->jsonResponse($c_offices);
    }

    public function tab_return(Request $request)
    {
        $office = COffice::where('c_profile_id', $request->c_profile_id)->get();
        return $this->jsonResponse($office);
    }
}