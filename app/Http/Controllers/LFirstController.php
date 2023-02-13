<?php

namespace App\Http\Controllers;

use App\Models\LFirst;
use App\Http\Requests\StoreLFirstRequest;
use App\Http\Requests\UpdateLFirstRequest;
use App\Models\LCategory;
use App\Models\LCollection;

class LFirstController extends Controller
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
        $parents = LCategory::where('depth', 0)->select('id', 'name', 'slug')->get();
        $categories = [];
        foreach ($parents as $parent) {
            $children = LCategory::where('parent_slug', $parent->slug)->select('id', 'name')->get()->toArray();
            $array = [
                'id' => $parent->id,
                'name' => $parent->name,
                'child_category' => $children
            ];
            array_unshift($array['child_category'], array('id'=>$parent->id,'name'=>'子カテゴリ無'));
            array_push($categories, $array);
        }
        return $this->jsonResponse($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLFirstRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLFirstRequest $request)
    {
        //
        $l_first = LFirst::create([
            'user_id' => $request->user_id,
            'l_category_id' => $request->l_category_id,
            'title' => $request->title,
            'url' => $request->url,
            'view_date' => $request->view_date,
        ]);

        $l_first_id = $l_first->id;

        if ($request->hasFile('thumbs')) {
            $thumbs_name = $request->file('thumbs')->getClientOriginalName();
            $request->file('thumbs')->storeAs('images/l_first/'.$l_first_id, $thumbs_name, 'public');
            $thumbs = 'images/l_first/'.$l_first_id."/".$thumbs_name;
            $l_first->thumbs = $thumbs;
            $l_first->save();
        }

        return $this->jsonResponse($l_first);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LFirst  $lFirst
     * @return \Illuminate\Http\Response
     */
    public function show(LFirst $lFirst)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LFirst  $lFirst
     * @return \Illuminate\Http\Response
     */
    public function edit(LFirst $lFirst, $l_first_id)
    {
        //
        $parents = LCategory::where('depth', 0)->select('id', 'name', 'slug')->get();
        $categories = [];
        foreach ($parents as $parent) {
            $children = LCategory::where('parent_slug', $parent->slug)->select('id', 'name')->get()->toArray();
            $array = [
                'id' => $parent->id,
                'name' => $parent->name,
                'child_category' => $children
            ];
            array_unshift($array['child_category'], array('id'=>$parent->id,'name'=>'子カテゴリ無'));
            array_push($categories, $array);
        }

        $l_first = LFirst::with(['user'=>function ($query) {
            $query->with(['LProfile']);
        }])->with('LCategory')->find($l_first_id);
        $nowCatParent = $l_first->LCategory->depth == 0 ? LCategory::where('slug', $l_first->LCategory->slug)->first() : LCategory::where('slug', $l_first->LCategory->parent_slug)->first();
        $allarray = [
            'posts' => $l_first,
            'category'=>$categories,
            'parent_category' => $nowCatParent
        ];
        return $this->jsonResponse($allarray);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLFirstRequest  $request
     * @param  \App\Models\LFirst  $lFirst
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLFirstRequest $request, LFirst $lFirst, $l_first_id)
    {
        //
        $l_first = LFirst::find($l_first_id);

        if ($request->hasFile('thumbs')) {
            $thumbs_name = $request->file('thumbs')->getClientOriginalName();
            $request->file('thumbs')->storeAs('images/l_first/'.$l_first_id, $thumbs_name, 'public');
            $thumbs = 'images/l_first/'.$l_first_id."/".$thumbs_name;
        }

        $l_first->update([
            'user_id' => $request->user_id,
            'l_category_id' => $request->l_category_id,
            'title' => $request->title,
            'url' => $request->url,
            'view_date' => $request->view_date,
            'thumbs' => $request->hasFile('thumbs') ? $thumbs : $request->thumbs,
        ]);
        return $this->jsonResponse($l_first);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LFirst  $lFirst
     * @return \Illuminate\Http\Response
     */
    public function destroy(LFirst $lFirst)
    {
        //
    }

    public function check()
    {
        $first = LFirst::first();
        if (!empty($first->id)) {
            return true;
        } else {
            return false;
        }
    }
}
