<?php

namespace App\Http\Controllers;

use App\Models\CSalonApp;
use App\Http\Requests\StoreCSalonAppRequest;
use App\Http\Requests\UpdateCSalonAppRequest;
use Illuminate\Http\Request;
use App\Mail\CorapuraSalonAppMail;
use App\Models\CSalon;
use App\Models\User;
use Mail;

class CSalonAppController extends Controller
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
     * @param  \App\Http\Requests\StoreCSalonAppRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCSalonAppRequest $request)
    {
        //
        $c_salon_app = CSalonApp::create([
            'user_id'=>$request->user_id,
            'c_salon_id'=>$request->c_salon_id,
        ]);
        $c_salon_apps = CSalonApp::where('user_id', $request->user_id)->pluck('c_salon_id');
        $user = User::find($request->user_id);
        $salon = CSalon::find($request->c_salon_id);
        $data = [
            'salon_title' => $salon->title,
            'user_name' => $user->name,
            'salon_id' => $salon->id,
        ];
        Mail::to($user->email)->send(new CorapuraSalonAppMail($data));
        return $this->jsonResponse($c_salon_apps);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CSalonApp  $cSalonApp
     * @return \Illuminate\Http\Response
     */
    public function show(CSalonApp $cSalonApp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CSalonApp  $cSalonApp
     * @return \Illuminate\Http\Response
     */
    public function edit(CSalonApp $cSalonApp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCSalonAppRequest  $request
     * @param  \App\Models\CSalonApp  $cSalonApp
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCSalonAppRequest $request, CSalonApp $cSalonApp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CSalonApp  $cSalonApp
     * @return \Illuminate\Http\Response
     */
    public function destroy(CSalonApp $cSalonApp, Request $request)
    {
        //
        $c_salon_app = CSalonApp::where('user_id', $request->user_id)->where('c_salon_id', $request->c_salon_id)->first();
        $c_salon_app->delete();
        $c_salon_apps = CSalonApp::where('user_id', $request->user_id)->pluck('c_salon_id');
        return $this->jsonResponse($c_salon_apps);
    }

    public function check(Request $request)
    {
        $c_salon_app = CSalonApp::where('user_id', $request->user_id)->pluck('c_salon_id');
        return $this->jsonResponse($c_salon_app);
    }
}
