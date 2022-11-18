<?php

namespace App\Http\Controllers;

use App\Models\CPresident;
use App\Http\Requests\StoreCPresidentRequest;
use App\Http\Requests\UpdateCPresidentRequest;
use Illuminate\Http\Request;

class CPresidentController extends Controller
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
     * @param  \App\Http\Requests\StoreCPresidentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCPresidentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CPresident  $cPresident
     * @return \Illuminate\Http\Response
     */
    public function show(CPresident $cPresident)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CPresident  $cPresident
     * @return \Illuminate\Http\Response
     */
    public function edit(CPresident $cPresident)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCPresidentRequest  $request
     * @param  \App\Models\CPresident  $cPresident
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCPresidentRequest $request, CPresident $cPresident)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CPresident  $cPresident
     * @return \Illuminate\Http\Response
     */
    public function destroy(CPresident $cPresident)
    {
        //
    }

    public function tab_return(Request $request)
    {
        $president = CPresident::where('c_profile_id', $request->c_profile_id)->get();
        return $this->jsonResponse($president);
    }
}