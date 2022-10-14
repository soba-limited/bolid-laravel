<?php

namespace App\Http\Controllers;

use App\Models\LFaq;
use App\Http\Requests\StoreLFaqRequest;
use App\Http\Requests\UpdateLFaqRequest;

class LFaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $company_faq = LFaq::where('type', 1)->orderBy('id', 'desc')->get();
        $user_faq = LFaq::where('type', 0)->orderBy('id', 'desc')->get();
        $allarray = [
            'company_faq'=>$company_faq,
            'user_faq'=>$user_faq,
        ];
        return $this->jsonResponse($allarray);
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
     * @param  \App\Http\Requests\StoreLFaqRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLFaqRequest $request)
    {
        //
        $l_faq = Lfaq::create([
            'question' => $request->question,
            'answer' => $request->answer,
            'type' => $request->type,
        ]);
        return $this->jsonResponse($l_faq);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LFaq  $lFaq
     * @return \Illuminate\Http\Response
     */
    public function show(LFaq $lFaq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LFaq  $lFaq
     * @return \Illuminate\Http\Response
     */
    public function edit(LFaq $lFaq, $id)
    {
        //
        $l_faq = Lfaq::find($id);
        return $this->jsonResponse($l_faq);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLFaqRequest  $request
     * @param  \App\Models\LFaq  $lFaq
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLFaqRequest $request, $id)
    {
        //
        $l_faq = Lfaq::find($id)->update([
            'question' => $request->question,
            'answer' => $request->answer,
            'type' => $request->type,
        ]);
        return $this->jsonResponse($l_faq);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LFaq  $lFaq
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        LFaq::find($id)->delete();
        return '削除しました';
    }
}