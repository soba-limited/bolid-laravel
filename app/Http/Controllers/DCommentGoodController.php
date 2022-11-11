<?php

namespace App\Http\Controllers;

use App\Models\DCommentGood;
use App\Http\Requests\StoreDCommentGoodRequest;
use App\Http\Requests\UpdateDCommentGoodRequest;
use App\Models\DComment;
use Illuminate\Http\Request;

class DCommentGoodController extends Controller
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
     * @param  \App\Http\Requests\StoreDCommentGoodRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDCommentGoodRequest $request)
    {
        //
        $comment_good = DCommentGood::create([
            'user_id' => $request->user_id,
            'd_comment_id' => $request->d_comment_id,
        ]);
        return $this->jsonResponse($comment_good);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DCommentGood  $dCommentGood
     * @return \Illuminate\Http\Response
     */
    public function show(DCommentGood $dCommentGood)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DCommentGood  $dCommentGood
     * @return \Illuminate\Http\Response
     */
    public function edit(DCommentGood $dCommentGood)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDCommentGoodRequest  $request
     * @param  \App\Models\DCommentGood  $dCommentGood
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDCommentGoodRequest $request, DCommentGood $dCommentGood)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DCommentGood  $dCommentGood
     * @return \Illuminate\Http\Response
     */
    public function destroy(DCommentGood $dCommentGood, Request $request)
    {
        //
        $comment_good = DCommentGood::where('user_id', $request->user_id)->where('d_comment_id', $request->d_comment_id)->first();
        $comment_good->delete();
        return '参考になったを解除しました';
    }
}