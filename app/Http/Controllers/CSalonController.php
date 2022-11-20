<?php

namespace App\Http\Controllers;

use App\Models\CSalon;
use App\Models\User;
use App\Http\Requests\StoreCSalonRequest;
use App\Http\Requests\UpdateCSalonRequest;
use Illuminate\Http\Request;

class CSalonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $salon = new CSalon;

        $limit = 12;

        $count = $salon->count();
        $page_max = $count % $limit > 0 ? floor($count / $limit) + 1: $count / $limit;

        $salon = $salon->limit($limit)->with('CTags')->get();

        $allarray = [
            'salon' => $salon,
            'page_max' => $page_max,
            'now_page' => 1,
        ];

        return $this->jsonResponse($allarray);
    }

    public function search(Request $request)
    {
        //
        $salon = new CSalon;

        if (!empty($request->s)) {
            $salon = $salon->where('title', 'like', '%'.$request->s.'%')->orWhere('content', 'like', '%'.$request->s.'%');
        }

        $limit = 12;

        if (!empty($request->page)) {
            $skip = ($request->page - 1) * $limit;
        } else {
            $skip = 0;
        }

        $count = $salon->count();
        $page_max = $count % $limit > 0 ? floor($count / $limit) + 1: $count / $limit;

        $salon = $salon->limit($limit)->skip($skip)->with('CTags')->get();

        $allarray = [
            'salon' => $salon,
            'page_max' => $page_max,
            'now_page' => $request->page,
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
     * @param  \App\Http\Requests\StoreCSalonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCSalonRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CSalon  $cSalon
     * @return \Illuminate\Http\Response
     */
    public function show(CSalon $cSalon, $salon_id)
    {
        //
        $salon = CSalon::find($salon_id);
        $user = null;
        if ($salon->user->account_type == 0) {
            $user = User::with('CProfile.CUserProfile.CUserSocials')->find($salon->user->id);
        } elseif ($salon->user->account_type == 1) {
            $user = User::with('CProfile.CCompanyProfile.CCompanySocials')->find($salon->user->id);
        }
        $allarray = [
            'salon' => $salon,
            'user' => $user,
        ];
        return $this->jsonResponse($allarray);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CSalon  $cSalon
     * @return \Illuminate\Http\Response
     */
    public function edit(CSalon $cSalon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCSalonRequest  $request
     * @param  \App\Models\CSalon  $cSalon
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCSalonRequest $request, CSalon $cSalon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CSalon  $cSalon
     * @return \Illuminate\Http\Response
     */
    public function destroy(CSalon $cSalon)
    {
        //
    }
}