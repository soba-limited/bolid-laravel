<?php

namespace App\Http\Controllers;

use App\Models\LCollection;
use App\Http\Requests\StoreLCollectionRequest;
use App\Http\Requests\UpdateLCollectionRequest;
use App\Models\LCategory;

class LCollectionController extends Controller
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
     * @param  \App\Http\Requests\StoreLCollectionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLCollectionRequest $request)
    {
        //
        $l_collection = LCollection::create([
            'user_id' => $request->user_id,
            'l_category_id' => $request->l_category_id,
            'title' => $request->title,
            'url' => $request->url,
            'view_date' => $request->view_date,
        ]);

        $l_collection_id = $l_collection->id;

        if ($request->hasFile('image1')) {
            $thumbs_name = $request->file('image1')->getClientOriginalName();
            $request->file('image1')->storeAs('images/l_collection/'.$l_collection_id, $thumbs_name, 'public');
            $thumbs = 'images/l_collection/'.$l_collection_id."/".$thumbs_name;
            $l_collection->image1 = $thumbs;
        }

        if ($request->hasFile('image2')) {
            $thumbs_name = $request->file('image2')->getClientOriginalName();
            $request->file('image2')->storeAs('images/l_collection/'.$l_collection_id, $thumbs_name, 'public');
            $thumbs = 'images/l_collection/'.$l_collection_id."/".$thumbs_name;
            $l_collection->image2 = $thumbs;
        }


        if ($request->hasFile('image3')) {
            $thumbs_name = $request->file('image3')->getClientOriginalName();
            $request->file('image3')->storeAs('images/l_collection/'.$l_collection_id, $thumbs_name, 'public');
            $thumbs = 'images/l_collection/'.$l_collection_id."/".$thumbs_name;
            $l_collection->image3 = $thumbs;
        }


        if ($request->hasFile('image4')) {
            $thumbs_name = $request->file('image4')->getClientOriginalName();
            $request->file('image4')->storeAs('images/l_collection/'.$l_collection_id, $thumbs_name, 'public');
            $thumbs = 'images/l_collection/'.$l_collection_id."/".$thumbs_name;
            $l_collection->image4 = $thumbs;
        }


        if ($request->hasFile('image1') || $request->hasFile('image2') || $request->hasFile('image3') || $request->hasFile('image4')) {
            $l_collection->save();
        }

        return $this->jsonResponse($l_collection);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LCollection  $lCollection
     * @return \Illuminate\Http\Response
     */
    public function show(LCollection $lCollection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LCollection  $lCollection
     * @return \Illuminate\Http\Response
     */
    public function edit(LCollection $lCollection, $l_collection_id)
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

        $l_collection = LCollection::with(['user'=>function ($query) {
            $query->with(['LProfile']);
        }])->with('LCategory')->find($l_collection_id);
        $nowCatParent = $l_collection->LCategory->depth == 0 ? LCategory::where('slug', $l_collection->LCategory->slug)->first() : LCategory::where('slug', $l_collection->LCategory->parent_slug)->first();
        $allarray = [
            'posts' => $l_collection,
            'category'=>$categories,
            'parent_category' => $nowCatParent
        ];
        return $this->jsonResponse($allarray);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLCollectionRequest  $request
     * @param  \App\Models\LCollection  $lCollection
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLCollectionRequest $request, LCollection $lCollection, $l_collection_id)
    {
        //
        $l_collection = LCollection::find($l_collection_id);

        if ($request->hasFile('image1')) {
            $thumbs_name = $request->file('image1')->getClientOriginalName();
            $request->file('image1')->storeAs('images/l_collection/'.$l_collection_id, $thumbs_name, 'public');
            $image1 = 'images/l_collection/'.$l_collection_id."/".$thumbs_name;
        }
        if ($request->hasFile('image2')) {
            $thumbs_name = $request->file('image2')->getClientOriginalName();
            $request->file('image2')->storeAs('images/l_collection/'.$l_collection_id, $thumbs_name, 'public');
            $image2 = 'images/l_collection/'.$l_collection_id."/".$thumbs_name;
        }
        if ($request->hasFile('image3')) {
            $thumbs_name = $request->file('image3')->getClientOriginalName();
            $request->file('image3')->storeAs('images/l_collection/'.$l_collection_id, $thumbs_name, 'public');
            $image3 = 'images/l_collection/'.$l_collection_id."/".$thumbs_name;
        }
        if ($request->hasFile('image4')) {
            $thumbs_name = $request->file('image4')->getClientOriginalName();
            $request->file('image4')->storeAs('images/l_collection/'.$l_collection_id, $thumbs_name, 'public');
            $image4 = 'images/l_collection/'.$l_collection_id."/".$thumbs_name;
        }


        $l_collection->update([
            'user_id' => $request->user_id,
            'l_category_id' => $request->l_category_id,
            'title' => $request->title,
            'url' => $request->url,
            'view_date' => $request->view_date,
            'image1' => $request->hasFile('image1') ? $image1 : $request->image1,
            'image2' => $request->hasFile('image2') ? $image2 : $request->image2,
            'image3' => $request->hasFile('image3') ? $image3 : $request->image3,
            'image4' => $request->hasFile('image4') ? $image4 : $request->image4,
        ]);
        return $this->jsonResponse($l_collection);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LCollection  $lCollection
     * @return \Illuminate\Http\Response
     */
    public function destroy(LCollection $lCollection)
    {
        //
    }
}