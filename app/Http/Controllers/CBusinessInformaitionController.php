<?php

namespace App\Http\Controllers;

use App\Models\CBusinessInformaition;
use App\Http\Requests\StoreCBusinessInformaitionRequest;
use App\Http\Requests\UpdateCBusinessInformaitionRequest;
use Illuminate\Http\Request;

class CBusinessInformaitionController extends Controller
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
     * @param  \App\Http\Requests\StoreCBusinessInformaitionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCBusinessInformaitionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CBusinessInformaition  $cBusinessInformaition
     * @return \Illuminate\Http\Response
     */
    public function show(CBusinessInformaition $cBusinessInformaition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CBusinessInformaition  $cBusinessInformaition
     * @return \Illuminate\Http\Response
     */
    public function edit(CBusinessInformaition $cBusinessInformaition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCBusinessInformaitionRequest  $request
     * @param  \App\Models\CBusinessInformaition  $cBusinessInformaition
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCBusinessInformaitionRequest $request, CBusinessInformaition $cBusinessInformaition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CBusinessInformaition  $cBusinessInformaition
     * @return \Illuminate\Http\Response
     */
    public function destroy(CBusinessInformaition $cBusinessInformaition)
    {
        //
    }

    public function tab_return(Request $request)
    {
        $bi = CBusinessInformaition::where('c_profile_id', $request->c_profile_id)->get();
        return $this->jsonResponse($bi);
    }
}