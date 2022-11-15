<?php

namespace App\Http\Controllers;

use App\Models\DComment;
use App\Http\Requests\StoreDCommentRequest;
use App\Http\Requests\UpdateDCommentRequest;
use App\Models\DCommentGood;
use Illuminate\Http\Request;

class DCommentController extends Controller
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
     * @param  \App\Http\Requests\StoreDCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDCommentRequest $request, $shop_id)
    {
        //
        $d_comment = DComment::create([
            'user_id' => $request->user_id,
            'd_shop_id' => $shop_id,
            'content' => $request->content,
        ]);
        $comments = DComment::where('d_shop_id', $shop_id)->orderBy('id', 'desc')->get();
        return $this->jsonResponse($comments);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DComment  $dComment
     * @return \Illuminate\Http\Response
     */
    public function show(DComment $dComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DComment  $dComment
     * @return \Illuminate\Http\Response
     */
    public function edit(DComment $dComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDCommentRequest  $request
     * @param  \App\Models\DComment  $dComment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDCommentRequest $request, DComment $dComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DComment  $dComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $comment = DComment::find($request->comment_id);
        $comment_id = $comment->d_shop_id;
        $comment->delete();
        $comments = DComment::where('d_shop_id', $comment_id)->get();
        return $this->jsonResponse($comments);
    }

    public function official_comment($shop_id)
    {
        $comments = DComment::where('d_shop_id', $shop_id)->with('DShop')->with(['user'=>function ($query) {
            $query->with('DProfile');
        }])->withCount('DCommentGoods')->get();
        return $this->jsonResponse($comments);
    }
}