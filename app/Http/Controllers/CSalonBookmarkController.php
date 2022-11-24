<?php

namespace App\Http\Controllers;

use App\Models\CSalonBookmark;
use App\Http\Requests\StoreCSalonBookmarkRequest;
use App\Http\Requests\UpdateCSalonBookmarkRequest;
use Illuminate\Http\Request;

class CSalonBookmarkController extends Controller
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
     * @param  \App\Http\Requests\StoreCSalonBookmarkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCSalonBookmarkRequest $request)
    {
        //
        $c_salon_bookmark = CSalonBookmark::create([
            'user_id'=>$request->user_id,
            'c_salon_id'=>$request->c_salon_id,
        ]);
        $c_salon_bookmarks = CSalonBookmark::where('user_id', $request->user_id)->pluck('c_salon_id');
        return $this->jsonResponse($c_salon_bookmarks);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CSalonBookmark  $cSalonBookmark
     * @return \Illuminate\Http\Response
     */
    public function show(CSalonBookmark $cSalonBookmark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CSalonBookmark  $cSalonBookmark
     * @return \Illuminate\Http\Response
     */
    public function edit(CSalonBookmark $cSalonBookmark)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCSalonBookmarkRequest  $request
     * @param  \App\Models\CSalonBookmark  $cSalonBookmark
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCSalonBookmarkRequest $request, CSalonBookmark $cSalonBookmark)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CSalonBookmark  $cSalonBookmark
     * @return \Illuminate\Http\Response
     */
    public function destroy(CSalonBookmark $cSalonBookmark, Request $request)
    {
        //
        $c_salon_bookmark = CSalonBookmark::where('user_id', $request->user_id)->where('c_salon_id', $request->c_salon_id)->first();
        $c_salon_bookmark->delete();
        $c_salon_bookmarks = CSalonBookmark::where('user_id', $request->user_id)->pluck('c_salon_id');
        return $this->jsonResponse($c_salon_bookmarks);
    }

    public function check(Request $request)
    {
        $c_salon_bookmark = CSalonBookmark::where('user_id', $request->user_id)->pluck('c_salon_id');
        return $this->jsonResponse($c_salon_bookmark);
    }
}