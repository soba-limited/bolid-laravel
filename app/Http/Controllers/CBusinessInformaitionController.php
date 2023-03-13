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
        $c_bi = CBusinessInformaition::create([
            'c_profile_id' => $request->c_profile_id,
            'title' => $request->title,
            'link' => $request->link,
        ]);
        $c_bis = CBusinessInformaition::where('c_profile_id', $request->c_profile_id)->orderBy('created_at', 'desc')->get();
        return $this->jsonResponse($c_bis);
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
    public function edit(CBusinessInformaition $cBusinessInformaition, $c_business_information_id)
    {
        //
        $c_business_information = CBusinessInformaition::find($c_business_information_id);
        return $this->jsonResponse($c_business_information);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCBusinessInformaitionRequest  $request
     * @param  \App\Models\CBusinessInformaition  $cBusinessInformaition
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCBusinessInformaitionRequest $request, CBusinessInformaition $cBusinessInformaition, $c_business_information_id)
    {
        //
        $c_bi = CBusinessInformaition::find($c_business_information_id);
        $c_bi->update([
            'c_profile_id' => $request->c_profile_id,
            'title' => $request->title,
            'link' => $request->link,
        ]);
        $c_bis = CBusinessInformaition::where('c_profile_id', $request->c_profile_id)->orderBy('created_at', 'desc')->get();
        return $this->jsonResponse($c_bis);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CBusinessInformaition  $cBusinessInformaition
     * @return \Illuminate\Http\Response
     */
    public function destroy(CBusinessInformaition $cBusinessInformaition, Request $request)
    {
        //
        $c_bi = CBusinessInformaition::find($request->c_business_information_id);
        $c_profile_id = $c_bi->c_profile_id;
        $c_bi->delete();
        $c_bis = CBusinessInformaition::where('c_profile_id', $c_profile_id)->get();
        return $this->jsonResponse($c_bis);
    }

    public function tab_return(Request $request)
    {
        $bi = CBusinessInformaition::where('c_profile_id', $request->c_profile_id)->orderBy('created_at', 'desc')->get();
        return $this->jsonResponse($bi);
    }
}
