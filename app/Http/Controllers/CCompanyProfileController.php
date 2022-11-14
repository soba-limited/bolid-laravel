<?php

namespace App\Http\Controllers;

use App\Models\CCompanyProfile;
use App\Http\Requests\StoreCCompanyProfileRequest;
use App\Http\Requests\UpdateCCompanyProfileRequest;

class CCompanyProfileController extends Controller
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
     * @param  \App\Http\Requests\StoreCCompanyProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCCompanyProfileRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CCompanyProfile  $cCompanyProfile
     * @return \Illuminate\Http\Response
     */
    public function show(CCompanyProfile $cCompanyProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CCompanyProfile  $cCompanyProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(CCompanyProfile $cCompanyProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCCompanyProfileRequest  $request
     * @param  \App\Models\CCompanyProfile  $cCompanyProfile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCCompanyProfileRequest $request, CCompanyProfile $cCompanyProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CCompanyProfile  $cCompanyProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(CCompanyProfile $cCompanyProfile)
    {
        //
    }
}
