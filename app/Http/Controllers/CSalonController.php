<?php

namespace App\Http\Controllers;

use App\Models\CSalon;
use App\Models\User;
use App\Http\Requests\StoreCSalonRequest;
use App\Http\Requests\UpdateCSalonRequest;
use App\Models\CTag;
use Illuminate\Http\Request;
use App\Mail\CorapuraSalonCreateMail;
use Mail;

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

        $salon = $salon->where('state', '>', 0)->where('stripe_api_id', '!=', null);

        $limit = 12;

        $count = $salon->count();
        $page_max = $count % $limit > 0 ? floor($count / $limit) + 1: $count / $limit;

        $salon = $salon->orderBy('created_at', 'desc')->limit($limit)->with(['CTags','user.CProfile'])->get();

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

        $salon = $salon->where('state', '>', 0)->where('stripe_api_id', '!=', null);

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

        $salon = $salon->orderBy('created_at', 'desc')->limit($limit)->skip($skip)->with(['CTags','user.CProfile'])->get();

        $allarray = [
            'salon' => $salon,
            'page_max' => $page_max,
            'now_page' => $request->page,
        ];

        return $this->jsonResponse($allarray);
    }

    public function mysalon(Request $request)
    {
        //
        $salon = new CSalon;

        $salon = $salon->where('user_id', $request->user_id);

        $limit = 12;

        if (!empty($request->page)) {
            $skip = ($request->page - 1) * $limit;
        } else {
            $skip = 0;
        }

        $count = $salon->count();
        $page_max = $count % $limit > 0 ? floor($count / $limit) + 1: $count / $limit;

        if ($request->page > 1) {
            $salon = $salon->limit($limit)->skip($skip)->with('CTags')->get();
        } else {
            $salon = $salon->limit($limit)->with('CTags')->get();
        }

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
        $c_salon = CSalon::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'state' => $request->state,
            'date' => $request->date,
            'plan' => $request->plan,
            'number_of_people' => $request->number_of_people,
            'content' => $request->content,
        ]);

        $id = $c_salon->id;

        if ($request->hasFile('thumbs')) {
            $thumbs_name = $request->file('thumbs')->getClientOriginalName();
            $request->file('thumbs')->storeAs('images/c_salon/'.$id, $thumbs_name, 'public');
            $thumbs = 'images/c_salon/'.$id."/".$thumbs_name;
            $c_salon->thumbs = $thumbs;
            $c_salon->save();
        }

        $tag_ids = [];

        if (!empty($request->tag)) {
            $tags = explode(",", $request->tag);
            foreach ($tags as $tag) {
                $tag_single = CTag::firstOrCreate(['name'=>$tag]);
                array_push($tag_ids, $tag_single->id);
            }
            foreach ($tag_ids as $tag_id) {
                $c_salon->CTags()->attach($tag_id);
            }
        }

        $user = User::find($request->user_id);

        $data = [
            'salon_title' => $c_salon->title,
            'user_name' => $user->name,
            'salon_id' => $c_salon->id,
        ];

		if ($c_salon->state == 1) {
			Mail::to('corapura@bolides-japan.com')->send(new CorapuraSalonCreateMail($data));
		}

        return $this->jsonResponse($c_salon);
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
        $salon = CSalon::with('CTags')->find($salon_id);
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
    public function edit(CSalon $cSalon, $c_salon_id)
    {
        //
        $c_salon = CSalon::with('CTags')->find($c_salon_id);
        $allarray = [
            'c_salon' => $c_salon,
        ];
        return $this->jsonResponse($allarray);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCSalonRequest  $request
     * @param  \App\Models\CSalon  $cSalon
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCSalonRequest $request, CSalon $cSalon, $c_salon_id)
    {
        //

        $c_salon = CSalon::find($c_salon_id);

        if ($request->hasFile('thumbs')) {
            $thumbs_name = $request->file('thumbs')->getClientOriginalName();
            $request->file('thumbs')->storeAs('images/c_salon/'.$c_salon_id, $thumbs_name, 'public');
            $thumbs = 'images/c_salon/'.$c_salon_id."/".$thumbs_name;
        }

        $c_salon->update([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'state' => $request->state,
            'date' => $request->date,
            'plan' => $request->plan,
            'number_of_people' => $request->number_of_people,
            'content' => $request->content,
            'thumbs' => $request->hasFile('thumbs') ? $thumbs : $request->thumbs,
        ]);

        $tag_ids = [];

        if (!empty($request->tag)) {
            $tags = explode(",", $request->tag);
            foreach ($tags as $tag) {
                $tag_single = CTag::firstOrCreate(['name'=>$tag]);
                array_push($tag_ids, $tag_single->id);
            }
            foreach ($tag_ids as $tag_id) {
                $c_salon->CTags()->syncWithoutDetaching($tag_id);
            }
        }

		$user = User::find($request->user_id);

		$data = [
            'salon_title' => $c_salon->title,
            'user_name' => $user->name,
            'salon_id' => $c_salon->id,
        ];

		if ($c_salon->state == 1 && is_null($c_salon->stripe_api_id)) {
			Mail::to('corapura@bolides-japan.com')->send(new CorapuraSalonCreateMail($data));
		}

        return $this->jsonResponse($c_salon);
    }

    public function admin_update($c_salon_id, Request $request)
    {
        $c_salon = CSalon::find($c_salon_id);
        $c_salon->stripe_api_id = $request->stripe_api_id;
        $c_salon->save();
        return $this->jsonResponse($c_salon);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CSalon  $cSalon
     * @return \Illuminate\Http\Response
     */
    public function destroy(CSalon $cSalon, Request $request)
    {
        //
        $c_salon = CSalon::find($request->c_salon_id);
        $c_salon->delete();
        $c_salons = CSalon::with('CTags')->with(['user.CProfile'])->where('user_id', $request->user_id);
        return $this->jsonResponse($c_salons);
    }

    public function imagesave(Request $request)
    {
        $str = substr(str_shuffle("ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz0123456789"), 0, 16);
        if ($request->hasFile('image')) {
            $image_name = $str.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('images/c_salon/content/', $image_name, 'public');
            $image = 'images/c_salon/content/'.$image_name;
            return $image;
        }
    }

    public function tab_return(Request $request)
    {
        $salon = CSalon::where('user_id', $request->user_id)->where('state', '>', 0)->where('stripe_api_id', '!=', null)->orderBy('created_at', 'desc')->get();
        return $this->jsonResponse($salon);
    }
}
