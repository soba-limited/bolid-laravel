<?php

namespace App\Http\Controllers;

use App\Models\CPrCounts;
use App\Http\Requests\StoreCPrCountsRequest;
use App\Http\Requests\UpdateCPrCountsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CPrCountsController extends Controller
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
     * @param  \App\Http\Requests\StoreCPrCountsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCPrCountsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CPrCounts  $cPrCounts
     * @return \Illuminate\Http\Response
     */
    public function show(CPrCounts $cPrCounts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CPrCounts  $cPrCounts
     * @return \Illuminate\Http\Response
     */
    public function edit(CPrCounts $cPrCounts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCPrCountsRequest  $request
     * @param  \App\Models\CPrCounts  $cPrCounts
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCPrCountsRequest $request, CPrCounts $cPrCounts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CPrCounts  $cPrCounts
     * @return \Illuminate\Http\Response
     */
    public function destroy(CPrCounts $cPrCounts)
    {
        //
    }

    public function add(Request $request)
    {
        $add = CPrCounts::create([
            'user_id' => $request->user_id,
            'c_pr_id' => $request->c_pr_id,
        ]);

        return 'この記事をチェックしました';
    }

    public function check(Request $request)
    {
        $check = CPrCount::where('user_id', $request->user_id)->where('c_pr_id', $request->c_pr_id)->first();
        if (!empty($check)) {
            return $this->jsonResponse($check);
        } else {
            return false;
        }
    }
}