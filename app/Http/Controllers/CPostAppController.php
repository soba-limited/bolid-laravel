<?php

namespace App\Http\Controllers;

use App\Models\CPostApp;
use App\Http\Requests\StoreCPostAppRequest;
use App\Http\Requests\UpdateCPostAppRequest;
use App\Models\CPost;
use Illuminate\Http\Request;

class CPostAppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $app_user = CPost::with('CPostApps.CProfile')->where('id', $request->c_post_id)->get();
        return $this->jsonResponse($app_user);
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
     * @param  \App\Http\Requests\StoreCPostAppRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCPostAppRequest $request)
    {
        //
        $apps = CPostApp::create([
            'c_post_id' => $request->c_post_id,
            'user_id' => $request->user_id,
            'comment' => $request->comment
        ]);
        return $this->jsonResponse($apps);
    }

    public function check(Request $request)
    {
        $c_post_apps = CPostApp::where('user_id', $request->user_id)->pluck('c_post_id');
        return $this->jsonResponse($c_post_apps);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CPostApp  $cPostApp
     * @return \Illuminate\Http\Response
     */
    public function show(CPostApp $cPostApp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CPostApp  $cPostApp
     * @return \Illuminate\Http\Response
     */
    public function edit(CPostApp $cPostApp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCPostAppRequest  $request
     * @param  \App\Models\CPostApp  $cPostApp
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCPostAppRequest $request, CPostApp $cPostApp, $app_id)
    {
        //
        $app = CPostApp::find($app_id);
        $app->state = $request->state;
        $app->save();
        $apps = CPost::with('CPostApps.CProfile')->where('id', $app->c_post_id)->get();
        return $this->jsonResponse($apps);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CPostApp  $cPostApp
     * @return \Illuminate\Http\Response
     */
    public function destroy(CPostApp $cPostApp, Request $request)
    {
        //
        $app = CPostApp::find($request->app_id);
        $c_post_id = $app->c_post_id;
        $app->delete();
        $apps = CPost::with('CPostApps.CProfile')->where('id', $c_post_id)->get();
        return $this->jsonResponse($apps);
    }
}