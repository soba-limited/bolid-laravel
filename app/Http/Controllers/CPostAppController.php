<?php

namespace App\Http\Controllers;

use App\Models\CPostApp;
use App\Http\Requests\StoreCPostAppRequest;
use App\Http\Requests\UpdateCPostAppRequest;
use App\Models\CPost;
use Illuminate\Http\Request;
use Mail;
use App\Mail\CorapuraMatchingMail;
use App\Mail\CorapuraAppMail;
use App\Mail\CorapuraDeleteMail;
use App\Models\User;

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
        $app_user = CPost::with('CPostApps.CProfile')->where('id', $request->c_post_id)->first();
        return $this->jsonResponse($app_user);
    }

    public function my_compleate_post($user_id)
    {
        $app = CPostApp::where('user_id', $user_id)->where('state', 1)->with('CPost')->get();
        return $this->jsonResponse($app);
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

        // メール送信
        $c_post = CPost::find($apps->c_post_id);
        $user = User::find($apps->user_id);
        $data['title'] = $c_post->title;
        $data['url'] = "https://bolides-japan.com/corapura/matter/".$c_post->id;
        $data['user_name'] = $user->CProfile->nicename;
        Mail::to($c_post->user->email)->send(new CorapuraAppMail($data));

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

        //メール送信

        if ($request->state == 3) {
            $c_post = CPost::find($app->c_post_id);
            $user = User::find($app->user_id);
            $data['title'] = $c_post->title;
            $data['url'] = "https://bolides-japan.com/corapura/matter/".$c_post->id;
            Mail::to($user->email)->send(new CorapuraMatchingMail($data));
        }

        $app->save();
        $apps = CPost::with('CPostApps.CProfile')->where('id', $app->c_post_id)->get();
        return $this->jsonResponse($apps);
    }

    public function comment_compleate($c_post_app_id)
    {
        $app = CPostApp::find($c_post_app_id);
        $app->state = 2;
        $app->save();
        $apps = CPostApp::where('user_id', $app->user_id)->where('state', 1)->with('CPost')->get();
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

        //メール送信
        $c_post = CPost::find($app->c_post_id);
        $user = User::find($app->user_id);
        $data['title'] = $c_post->title;
        $data['url'] = "https://bolides-japan.com/corapura/matter/".$c_post->id;
        Mail::to($user->email)->send(new CorapuraDeleteMail($data));


        $app->delete();
        $apps = CPost::with('CPostApps.CProfile')->where('id', $c_post_id)->first();
        return $this->jsonResponse($apps);
    }
}
