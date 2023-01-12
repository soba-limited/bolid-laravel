<?php

namespace App\Http\Controllers;

use App\Models\LPost;
use App\Models\LPostUser;
use App\Models\LCategory;
use App\Models\LPickup;
use App\Models\LSidebar;
use App\Http\Requests\StoreLPostRequest;
use App\Http\Requests\UpdateLPostRequest;
use App\Models\LSeries;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $category)
    {
        //
        $categories = LCategory::where('slug', $category)->first();
        if ($categories->depth == 0) {
            $category_array = LCategory::select('id')->where('parent_slug', $category)->orWhere('slug', $category);
            $posts = LPost::with(['user'=>function ($query) {
                $query->with('LProfile');
            }])->whereIn('l_category_id', $category_array)->where('state', 1);
        } else {
            $posts = LPost::where('state', 1)->where('l_category_id', $categories->id);
        }

        $sort_key = 'id';
        $order_key = 'desc';

        if (!empty($request->sort)) {
            $sort_key = $request->sort;
        }
        if (!empty($request->order)) {
            $order_key = $request->order;
        }

        $limit = 30;
        $skip = 0;

        if (!empty($request->page) && $request->page > 1) {
            $skip = ($request->page - 1) * $limit;
        }

        $posts_count = $posts->count();
        $page_max = $posts_count % $limit > 0 ? floor($posts_count / $limit) + 1: $posts_count / $limit;
        $posts = $posts->with('LCategory')->orderBy($sort_key, $order_key)->skip($skip)->limit($limit)->get()->makeHidden(['discription','sub_title','content']);

        //それぞれを配列に入れる
        $allarray = [
            'posts' => $posts,
            'page_max' => $page_max,
        ];
        $allarray = \Commons::LCommons($allarray);
        return $this->jsonResponse($allarray);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        //
        $posts = LPost::orderBy('id', 'desc')->where('state', 1)->where('title', 'like', '%'.$request->s.'%')->orWhere('sub_title', 'like', '%'.$request->s.'%')->orWhere('discription', 'like', '%'.$request->s.'%')->orWhere('content', 'like', '%'.$request->s.'%');

        $limit = 30;
        $skip = 0;

        if (!empty($request->page) && $request->page > 1) {
            $skip = ($request->page - 1) * $limit;
        }

        $posts_count = $posts->count();
        $page_max = $posts_count % $limit > 0 ? floor($posts_count / $limit) + 1: $posts_count / $limit;
        $posts = $posts->with('LCategory')->with(['user'=>function ($query) {
            $query->with('LProfile');
        }])->skip($skip)->limit($limit)->get()->makeHidden(['discription','sub_title','content']);

        //それぞれを配列に入れる
        $allarray = [
            'posts' => $posts,
            'page_max' => $page_max,
            's' => $request->s
        ];
        $allarray = \Commons::LCommons($allarray);

        return $this->jsonResponse($allarray);
    }

    public function editor_index($id, Request $request)
    {
        $posts = LPost::withTrashed()->where('user_id', $id)->orderBy('id', 'desc');

        $limit = 30;
        $skip = 0;

        $category = LCategory::get();

        if (!empty($request->page) && $request->page > 1) {
            $skip = ($request->page - 1) * $limit;
        }

        $posts_count = $posts->count();
        $page_max = $posts_count % $limit > 0 ? floor($posts_count / $limit) + 1: $posts_count / $limit;
        $posts = $posts->with('LCategory')->skip($skip)->limit($limit)->get()->makeHidden(['discription','sub_title','content']);

        $allarray = [
            'posts' => $posts,
            'category' =>$category,
            'page_max' => $page_max,
            'now_page' => $request->page,
        ];
        return $this->jsonResponse($allarray);
    }

    public function editor_index_post($id, Request $request)
    {
        $posts = new LPost;
        $posts = $posts->withTrashed()->where('user_id', $id)->orderBy('id', 'desc');

        $limit = 30;
        $skip = 0;

        if (!empty($request->page) && $request->page > 1) {
            $skip = ($request->page - 1) * $limit;
        }

        if (!empty($request->l_category_id)) {
            //$posts = $posts->where('l_category_id', $request->l_category_id);
            $categories = LCategory::find($request->l_category_id);
            if ($categories->depth == 0) {
                $category_array = LCategory::select('id')->where('parent_slug', $categories->slug)->orWhere('slug', $categories->slug);
                $posts = $posts->whereIn('l_category_id', $category_array);
            } else {
                $posts = $posts->where('l_category_id', $categories->id);
            }
        }

        $posts_count = $posts->count();
        $page_max = $posts_count % $limit > 0 ? floor($posts_count / $limit) + 1: $posts_count / $limit;
        $posts = $posts->with('LCategory')->skip($skip)->limit($limit)->get()->makeHidden(['discription','sub_title','content']);

        $allarray = [
            'posts' => $posts,
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
        $series = LSeries::get();
        $allarray=[
            'category'=>$categories,
            'series'=>$series
        ];
        return $this->jsonResponse($allarray);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLPostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLPostRequest $request)
    {
        //
        $l_post = LPost::create([
            'user_id' => $request->user_id,
            'l_category_id' => $request->l_category_id,
            'l_series_id' => $request->l_series_id,
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'discription' => $request->discription,
            'content' => $request->content,
            'state' => !empty($request->state) ? $request->state : 0,
            'view_date' => $request->view_date,
        ]);
        $id = $l_post->id;

        if ($request->hasFile('thumbs')) {
            $thumbs_name = $request->file('thumbs')->getClientOriginalName();
            $request->file('thumbs')->storeAs('images/l_post/'.$id, $thumbs_name, 'public');
            $thumbs = 'images/l_post/'.$id."/".$thumbs_name;
            $l_post->thumbs = $thumbs;
        }

        if ($request->hasFile('mv')) {
            $mv_name = $request->file('mv')->getClientOriginalName();
            $request->file('mv')->storeAs('images/l_post/'.$id, $mv_name, 'public');
            $mv = 'images/l_post/'.$id."/".$mv_name;
            $l_post->mv = $mv;
        }

        if ($request->hasFile('thumbs') || $request->hasFile('mv')) {
            $l_post->save();
        }

        return $this->jsonResponse($l_post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LPost  $lPost
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $posts = LPost::with(['user'=>function ($query) {
            $query->with(['LProfile']);
        }])->with('LCategory')->with('LPickup')->find($id)->makeVisible(['discription','sub_title','content']);
        $bookmarks = LPostUser::where('l_post_id', $id)->pluck('user_id');
        $seriesArray = [
            'series_info' => LSeries::find($posts->l_series_id),
            'prev_post' => LPost::where('l_series_id', $posts->l_series_id)->where('id', '<', $posts->id)->orderBy('id', 'desc')->first(),
            'next_post' => LPost::where('l_series_id', $posts->l_series_id)->where('id', '>', $posts->id)->orderBy('id', 'asc')->first(),
        ];

        //それぞれを配列に入れる
        $allarray = [
            'posts' => $posts,
            'series' => $seriesArray,
            'bookmarks' => $bookmarks
        ];

        $allarray = \Commons::LCommons($allarray);
        return $this->jsonResponse($allarray);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LPost  $lPost
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $series = LSeries::get();

        $posts = LPost::with(['user'=>function ($query) {
            $query->with(['LProfile']);
        }])->with('LCategory')->with('LSeries')->find($id)->makeVisible(['discription','sub_title','content']);
        $nowCatParent = $posts->LCategory->depth == 0 ? LCategory::where('slug', $posts->LCategory->slug)->first() : LCategory::where('slug', $posts->LCategory->parent_slug)->first();
        $allarray = [
            'posts' => $posts,
            'category'=>$categories,
            'series'=>$series,
            'parent_category' => $nowCatParent
        ];
        return $this->jsonResponse($allarray);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLPostRequest  $request
     * @param  \App\Models\LPost  $lPost
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLPostRequest $request, $id)
    {
        //

        $l_post = LPost::find($id);

        if ($request->hasFile('thumbs')) {
            $thumbs_name = $request->file('thumbs')->getClientOriginalName();
            $request->file('thumbs')->storeAs('images/l_post/'.$id, $thumbs_name, 'public');
            $thumbs = 'images/l_post/'.$id."/".$thumbs_name;
        }

        if ($request->hasFile('mv')) {
            $mv_name = $request->file('mv')->getClientOriginalName();
            $request->file('mv')->storeAs('images/l_post/'.$id, $mv_name, 'public');
            $mv = 'images/l_post/'.$id."/".$mv_name;
        }

        $l_post->update([
            'user_id' => $request->user_id,
            'l_category_id' => $request->l_category_id,
            'l_series_id' => $request->l_series_id,
            'title' => $request->title,
            'thumbs' => $request->hasFile('thumbs') ? $thumbs : $request->thumbs,
            'mv' => $request->hasFile('mv') ? $mv : $request->mv,
            'sub_title' => $request->sub_title,
            'discription' => $request->discription,
            'content' => $request->content,
            'state' => $request->state,
            'view_date' => $request->view_date,
        ]);
        return $this->jsonResponse($l_post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LPost  $lPost
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $l_post = LPost::find($id);
        $l_post->delete();
    }

    public function imagesave(Request $request)
    {
        $str = substr(str_shuffle("ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz0123456789"), 0, 16);
        if ($request->hasFile('image')) {
            $image_name = $str.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('images/l_post/content/', $image_name, 'public');
            $image = 'images/l_post/content/'.$image_name;
            return $image;
        }
    }
}