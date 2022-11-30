<?php

namespace App\Http\Controllers;

use App\Models\CLike;
use App\Http\Requests\StoreCLikeRequest;
use App\Http\Requests\UpdateCLikeRequest;
use Illuminate\Http\Request;

class CLikeController extends Controller
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
     * @param  \App\Http\Requests\StoreCLikeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCLikeRequest $request)
    {
        //
        $c_like = CLike::create([
            'c_profile_id' => $request->c_profile_id,
            'title' => $request->title,
            'text' => $request->text,
        ]);

        $id = $c_like->id;

        if ($request->hasFile('thumbs')) {
            $thumbs_name = $request->file('thumbs')->getClientOriginalName();
            $request->file('thumbs')->storeAs('images/c_like/'.$id, $thumbs_name, 'public');
            $thumbs = 'images/c_like/'.$id."/".$thumbs_name;
            $c_like->thumbs = $thumbs;
            $c_like->save();
        }

        $c_likes = CLike::where('c_profile_id', $request->c_profile_id);
        return $this->jsonResponse($c_likes);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CLike  $cLike
     * @return \Illuminate\Http\Response
     */
    public function show(CLike $cLike)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CLike  $cLike
     * @return \Illuminate\Http\Response
     */
    public function edit(CLike $cLike, $c_like_id)
    {
        //
        $c_like = CLike::find($c_like_id);
        return $this->jsonResponse($c_like);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCLikeRequest  $request
     * @param  \App\Models\CLike  $cLike
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCLikeRequest $request, CLike $cLike, $c_like_id)
    {
        //
        $c_like = CLike::find($c_like_id);
        $id = $c_like->id;

        if ($request->hasFile('thumbs')) {
            $thumbs_name = $request->file('thumbs')->getClientOriginalName();
            $request->file('thumbs')->storeAs('images/c_like/'.$id, $thumbs_name, 'public');
            $thumbs = 'images/c_like/'.$id."/".$thumbs_name;
            $c_like->thumbs = $thumbs;
        }

        $c_like->update([
            'c_profile_id' => $request->c_profile_id,
            'title' => $request->title,
            'text' => $request->text,
            'thumbs' => $request->hasFile('thumbs') ? $thumbs : $request->thumbs,
        ]);

        $c_likes = CLike::where('c_profile_id', $request->c_profile_id);
        return $this->jsonResponse($c_likes);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CLike  $cLike
     * @return \Illuminate\Http\Response
     */
    public function destroy(CLike $cLike, Request $request)
    {
        //
        $c_like = CLike::find($request->c_like_id);
        $c_profile_id = $c_like->c_profile_id;
        $c_like->delete();
        $c_likes = CLike::where('c_profile_id', $c_profile_id);
        return $this->jsonResponse($c_likes);
    }

    public function tab_return(Request $request)
    {
        $like = CLike::where('c_profile_id', $request->c_profile_id)->get();
        return $this->jsonResponse($like);
    }
}