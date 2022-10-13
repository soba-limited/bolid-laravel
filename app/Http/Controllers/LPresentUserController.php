<?php

namespace App\Http\Controllers;

use App\Models\LPresentUser;
use App\Http\Requests\StoreLPresentUserRequest;
use App\Http\Requests\UpdateLPresentUserRequest;
use Illuminate\Support\Facades\Auth;

class LPresentUserController extends Controller
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
     * @param  \App\Http\Requests\StoreLPresentUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLPresentUserRequest $request, $id)
    {
        //
        $hobbys = $request->hobby;
        $hobby_text = "";
        if (is_array($hobbys)) {
            foreach ($hobbys as $hobby) {
                if (!empty($hobby_text)) {
                    $hobby_text = $hobby_text.",".$hobby;
                } else {
                    $hobby_text = $hobby;
                }
            }
        }
        $brands = $request->brand;
        $brand_text = "";
        if (is_array($brands)) {
            foreach ($brands as $brand) {
                if (!empty($brand_text)) {
                    $brand_text = $brand_text.",".$brand;
                } else {
                    $brand_text = $brand;
                }
            }
        }
        $cosmetics = $request->cosmetic;
        $cosmetic_text = "";
        if (is_array($cosmetics)) {
            foreach ($cosmetics as $cosmetic) {
                if (!empty($cosmetic_text)) {
                    $cosmetic_text = $cosmetic_text.",".$cosmetic;
                } else {
                    $cosmetic_text = $cosmetic;
                }
            }
        }
        $l_present_user = LPresentUser::create([
            'user_id' => $request->user_id,
            'l_present_id' => $id,
            'account' => $request->account,
            'hobby' => $hobby_text,
            'brand' => $brand_text,
            'cosmetic' => $cosmetic_text,
            'marriage' => $request->marriage,
            'child' => $request->child,
            'income' => $request->income,
        ]);
        return '応募が完了しました';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LPresentUser  $lPresentUser
     * @return \Illuminate\Http\Response
     */
    public function show(LPresentUser $lPresentUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LPresentUser  $lPresentUser
     * @return \Illuminate\Http\Response
     */
    public function edit(LPresentUser $lPresentUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLPresentUserRequest  $request
     * @param  \App\Models\LPresentUser  $lPresentUser
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLPresentUserRequest $request, LPresentUser $lPresentUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LPresentUser  $lPresentUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(LPresentUser $lPresentUser)
    {
        //
    }
}