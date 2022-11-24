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
        $c_sust = CSust::create([
            'c_profile_id' => $request->c_profile_id,
            'title' => $request->title,
        ]);

        $id = $c_sust->id;

        if ($request->hasFile('thumbs')) {
            $thumbs_name = $request->file('thumbs')->getClientOriginalName();
            $request->file('thumbs')->storeAs('images/c_sust/'.$id, $thumbs_name, 'public');
            $thumbs = 'images/c_sust/'.$id."/".$thumbs_name;
            $c_sust->thumbs = $thumbs;
            $c_sust->save();
        }

        $c_susts = CSust::where('c_profile_id', $request->c_profile_id);
        return $this->jsonResponse($c_susts);
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
    public function update(UpdateCSustRequest $request, CSust $cSust, $c_sust_id)
    {
        //
        $c_sust = CSust::find($c_sust_id);
        $id = $c_sust->id;

        if ($request->hasFile('thumbs')) {
            $thumbs_name = $request->file('thumbs')->getClientOriginalName();
            $request->file('thumbs')->storeAs('images/c_sust/'.$id, $thumbs_name, 'public');
            $thumbs = 'images/c_sust/'.$id."/".$thumbs_name;
            $c_sust->thumbs = $thumbs;
        }

        $c_sust->update([
            'c_profile_id' => $request->c_profile_id,
            'title' => $request->title,
            'text' => $request->text,
            'thumbs' => $request->hasFile('thumbs') ? $thumbs : $request->thumbs,
        ]);

        $c_susts = CSust::where('c_profile_id', $request->c_profile_id);
        return $this->jsonResponse($c_susts);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CSust  $cSust
     * @return \Illuminate\Http\Response
     */
    public function destroy(CSust $cSust, Request $request)
    {
        //
        $c_sust = CSust::find($request->c_sust_id);
        $c_profile_id = $c_sust->c_profile_id;
        $c_sust->delete();
        $c_susts = CSust::where('c_profile_id', $c_profile_id);
        return $this->jsonResponse($c_susts);
    }

    public function tab_return(Request $request)
    {
        $sust = CSust::where('c_profile_id', $request->c_profile_id)->get();
        return $this->jsonResponse($sust);
    }
}