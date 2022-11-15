<?php

namespace App\Http\Controllers;

use App\Models\DOverview;
use App\Http\Requests\StoreDOverviewRequest;
use App\Http\Requests\UpdateDOverviewRequest;

class DOverviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($shop_id)
    {
        //
        $overview = DOverview::where('d_shop_id', $shop_id)->get();
        return $this->jsonResponse($overview);
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
     * @param  \App\Http\Requests\StoreDOverviewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDOverviewRequest $request, $shop_id)
    {
        //
        $overview = DOverview::create([
            'd_shop_id' => $shop_id,
            'title' => $request->title,
            'content' => $request->content,
        ]);
        $overviews = DOverview::where('d_shop_id', $overview->d_shop_id)->get();
        return $this->jsonResponse($overviews);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DOverview  $dOverview
     * @return \Illuminate\Http\Response
     */
    public function show(DOverview $dOverview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DOverview  $dOverview
     * @return \Illuminate\Http\Response
     */
    public function edit(DOverview $dOverview, $id)
    {
        //
        $overview = DOverview::find($id);
        return $this->jsonResponse($overview);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDOverviewRequest  $request
     * @param  \App\Models\DOverview  $dOverview
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDOverviewRequest $request, DOverview $dOverview, $id)
    {
        //
        $overview = DOverview::find($id);
        $overview = $overview::update([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        $overviews = DOverview::where('d_shop_id', $overview->d_shop_id)->get();
        return $this->jsonResponse($overviews);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DOverview  $dOverview
     * @return \Illuminate\Http\Response
     */
    public function destroy(DOverview $dOverview, $id)
    {
        //
        $overview = DOverview::find($id);
        $d_shop_id = $overview->d_shop_id;
        $overview->delete();
        $overviews = DOverview::where('d_shop_id', $d_shop_id)->get();
        return $this->jsonResponse($overviews);
    }
}