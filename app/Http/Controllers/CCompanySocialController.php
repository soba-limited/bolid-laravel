<?php

namespace App\Http\Controllers;

use App\Models\CCompanySocial;
use App\Http\Requests\StoreCCompanySocialRequest;
use App\Http\Requests\UpdateCCompanySocialRequest;
use Illuminate\Http\Request;

class CCompanySocialController extends Controller
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
     * @param  \App\Http\Requests\StoreCCompanySocialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCCompanySocialRequest $request)
    {
        //
        $c_company_social = CCompanySocial::create([
            'c_company_profile_id' => $request->c_company_profile_id,
            'name' => $request->name,
            'url' => $request->url,
        ]);
        $c_company_socials = CCompanySocial::where('c_company_profile_id', $request->c_company_profile_id)->get();
        return $this->jsonResponse($c_company_socials);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CCompanySocial  $cCompanySocial
     * @return \Illuminate\Http\Response
     */
    public function show(CCompanySocial $cCompanySocial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CCompanySocial  $cCompanySocial
     * @return \Illuminate\Http\Response
     */
    public function edit(CCompanySocial $cCompanySocial, $c_company_social_id)
    {
        //
        $c_company_social = CCompanySocial::find($c_company_social_id);
        return $this->jsonResponse($c_company_social);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCCompanySocialRequest  $request
     * @param  \App\Models\CCompanySocial  $cCompanySocial
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCCompanySocialRequest $request, CCompanySocial $cCompanySocial, $c_company_social_id)
    {
        //
        $c_company_social = CCompanySocial::find($c_company_social_id);
        $c_company_social->update([
            'c_company_profile_id' => $request->c_company_profile_id,
            'name' => $request->name,
            'url' => $request->url,
        ]);
        $c_company_socials = CCompanySocial::where('c_company_profile_id', $c_company_social->c_company_profile_id)->get();
        return $this->jsonResponse($c_company_socials);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CCompanySocial  $cCompanySocial
     * @return \Illuminate\Http\Response
     */
    public function destroy(CCompanySocial $cCompanySocial, Request $request)
    {
        //
        $c_company_social = CCompanySocial::find($request->c_company_social_id);
        $c_company_profile_id = $c_company_social->c_company_profile_id;
        $c_company_social->delete();
        $c_company_socials = CCompanySocial::where('c_company_profile_id', $c_company_profile_id)->get();
        return $this->jsonResponse($c_company_socials);
    }
}