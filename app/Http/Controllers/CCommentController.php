<?php

namespace App\Http\Controllers;

use App\Models\CComment;
use App\Http\Requests\StoreCCommentRequest;
use App\Http\Requests\UpdateCCommentRequest;
use Illuminate\Http\Request;

class CCommentController extends Controller
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

    public function to_list(Request $request)
    {
        $comments = CComment::with('to_user.CProfile')->where('user_id', $request->user_id)->get();
        return $this->jsonResponse($comments);
    }

    public function recive_list(Request $request)
    {
        $comments = CComment::with('user.CProfile')->where('to_user_id', $request->to_user_id)->get();
        return $this->jsonResponse($comments);
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
     * @param  \App\Http\Requests\StoreCCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCCommentRequest $request)
    {
        //
        $comment = CComment::create([
            'user_id' => $request->user_id,
            'to_user_id' => $request->to_user_id,
            'title' => $request->title,
            'content' => $request->content,
        ]);
        return $this->jsonResponse($comment);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CComment  $cComment
     * @return \Illuminate\Http\Response
     */
    public function show(CComment $cComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CComment  $cComment
     * @return \Illuminate\Http\Response
     */
    public function edit(CComment $cComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCCommentRequest  $request
     * @param  \App\Models\CComment  $cComment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCCommentRequest $request, CComment $cComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CComment  $cComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(CComment $cComment, Request $request)
    {
        //
        $comment = CComment::find($request->c_comment_id);
        $comment->delete();
        return 'コメントを削除しました';
    }
}