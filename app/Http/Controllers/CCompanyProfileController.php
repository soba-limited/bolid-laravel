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
    public function update(UpdateCCompanyProfileRequest $request, CCompanyProfile $cCompanyProfile, $c_company_profile_id)
    {
        //
        $c_company_profile = CUserProfile::find($c_company_profile_id);

        $c_company_profile->update([
            'c_profile_id'=>$request->c_profile_id,
            'president'=>$request->president,
            'maked'=>$request->maked,
            'jojo'=>$request->jojo,
            'capital'=>$request->capital,
            'zipcode'=>$request->zipcode,
            'address'=>$request->address,
            'tel'=>$request->tel,
            'site_url'=>$request->site_url,
            'shop_url'=>$request->shop_url,
        ]);

        return $this->jsonResponse($c_company_profile);
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