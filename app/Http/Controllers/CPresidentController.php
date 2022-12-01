<?php

namespace App\Http\Controllers;

use App\Models\CPresident;
use App\Http\Requests\StoreCPresidentRequest;
use App\Http\Requests\UpdateCPresidentRequest;
use App\Models\COffice;
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
        $c_president = CPresident::create([
            'c_profile_id' => $request->c_profile_id,
            'title' => $request->title,
            'top_text' => $request->top_text,
            'content' => $request->content,
        ]);

        $id = $c_president->id;

        if ($request->hasFile('thumbs')) {
            $thumbs_name = $request->file('thumbs')->getClientOriginalName();
            $request->file('thumbs')->storeAs('images/c_president/'.$id, $thumbs_name, 'public');
            $thumbs = 'images/c_president/'.$id."/".$thumbs_name;
            $c_president->thumbs = $thumbs;
            $c_president->save();
        }

        $c_presidents = CPresident::where('c_profile_id', $request->c_profile_id)->get();
        return $this->jsonResponse($c_presidents);
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
    public function edit(CPresident $cPresident, $c_president_id)
    {
        //
        $c_president = COffice::find($c_president_id);
        return $this->jsonResponse($c_president);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCPresidentRequest  $request
     * @param  \App\Models\CPresident  $cPresident
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCPresidentRequest $request, CPresident $cPresident, $c_president_id)
    {
        //
        $c_president = CPresident::find($c_president_id);
        $id = $c_president->id;

        if ($request->hasFile('thumbs')) {
            $thumbs_name = $request->file('thumbs')->getClientOriginalName();
            $request->file('thumbs')->storeAs('images/c_president$c_president/'.$id, $thumbs_name, 'public');
            $thumbs = 'images/c_president$c_president/'.$id."/".$thumbs_name;
            $c_president->thumbs = $thumbs;
        }

        $c_president->update([
            'c_profile_id' => $request->c_profile_id,
            'title' => $request->title,
            'top_text' => $request->top_text,
            'content' => $request->content,
            'thumbs' => $request->hasFile('thumbs') ? $thumbs : $request->thumbs,
        ]);

        $c_presidents = CPresident::where('c_profile_id', $request->c_profile_id)->get();
        return $this->jsonResponse($c_presidents);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CPresident  $cPresident
     * @return \Illuminate\Http\Response
     */
    public function destroy(CPresident $cPresident, Request $request)
    {
        //
        $c_president = CPresident::find($request->c_president_id);
        $c_profile_id = $c_president->c_profile_id;
        $c_president->delete();
        $c_presidents = CPresident::where('c_profile_id', $c_profile_id)->get();
        return $this->jsonResponse($c_presidents);
    }

    public function tab_return(Request $request)
    {
        $president = CPresident::where('c_profile_id', $request->c_profile_id)->get();
        return $this->jsonResponse($president);
    }
}