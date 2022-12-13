<?php

namespace App\Http\Controllers;

use App\Models\LSidebar;
use App\Http\Requests\StoreLSidebarRequest;
use App\Http\Requests\UpdateLSidebarRequest;
use Illuminate\Http\Request;

class LSidebarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $l_sidebar = LSidebar::get();
        return $this->jsonResponse($l_sidebar);
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
     * @param  \App\Http\Requests\StoreLSidebarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLSidebarRequest $request)
    {
        //
        $l_sidebar = LSidebar::create([
            'title' => $request->title,
            'content' => $request->content,
            'order' => !empty($request->order) ? $request->order : 0,
            'state' => !empty($request->state) ? $request->state : 0,
        ]);
        return $this->jsonResponse($l_sidebar);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LSidebar  $lSidebar
     * @return \Illuminate\Http\Response
     */
    public function show(LSidebar $lSidebar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LSidebar  $lSidebar
     * @return \Illuminate\Http\Response
     */
    public function edit(LSidebar $lSidebar, $id)
    {
        //
        $l_sidebar = LSidebar::find($id);
        return $this->jsonResponse($l_sidebar);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLSidebarRequest  $request
     * @param  \App\Models\LSidebar  $lSidebar
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLSidebarRequest $request, LSidebar $lSidebar, $id)
    {
        //
        $l_sideebar = LSidebar::find($id)->update([
            'title' => $request->title,
            'content' => $request->content,
            'order' => !empty($request->order) ? $request->order : 0,
            'state' => !empty($request->state) ? $request->state : 0,
        ]);
        return $this->jsonResponse($l_sideebar);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LSidebar  $lSidebar
     * @return \Illuminate\Http\Response
     */
    public function destroy(LSidebar $lSidebar, $id)
    {
        //
        LSidebar::find($id)->delete();
        return 'このブロックは削除されました';
    }

    public function imagesave(Request $request)
    {
        $str = substr(str_shuffle("ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz0123456789"), 0, 16);
        if ($request->hasFile('image')) {
            $image_name = $str.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('images/l_sidebar/content/', $image_name, 'public');
            $image = 'images/l_sidebar/content/'.$image_name;
            return $image;
        }
    }
}