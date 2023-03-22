<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\BolidesJapanContactFormMail;
use App\Mail\BolidesJapanAdFormMail;
use App\Mail\BolidesJapanPlanAddMail;
use App\Mail\BolidesJapanPlanChangeMail;
use App\Models\CProfile;
use App\Models\DProfile;
use App\Models\LProfile;
use App\Models\User;

class BolidesJapanController extends Controller
{
    //
    public function administar_user_index()
    {
        $users = User::orderBy('id', 'asc')->withTrashed();
        $limit = 30;
        $skip = 0;

        $users_count = $users->count();
        $page_max = $users_count % $limit > 0 ? floor($users_count / $limit) + 1: $users_count / $limit;
        $users = $users->with(['Subscriptions','CProfile','DProfile','LProfile'])->skip($skip)->limit($limit)->get();

        //それぞれを配列に入れる
        $allarray = [
            'users' => $users,
            'page_max' => $page_max,
            'now_page' => 1,
        ];
        return $this->jsonResponse($allarray);
    }

    public function administar_user_search(Request $request)
    {
        $users = User::orderBy('id', 'asc')->withTrashed();
        $limit = 30;
        $skip = 0;

        if (!empty($request->page) && $request->page > 1) {
            $skip = ($request->page - 1) * $limit;
        }

        $users_count = $users->count();
        $page_max = $users_count % $limit > 0 ? floor($users_count / $limit) + 1: $users_count / $limit;
        $users = $users->with(['Subscriptions','CProfile','DProfile','LProfile'])->skip($skip)->limit($limit)->get();

        //それぞれを配列に入れる
        $allarray = [
            'users' => $users,
            'page_max' => $page_max,
            'now_page' => $request->page,
        ];
        return $this->jsonResponse($allarray);
    }

    public function user_destroy($user_id)
    {
        $user = User::find($user_id);
        if (!empty($user->l_profile_id)) {
            $l_profile = LProfile::find($user->l_profile_id);
            $l_profile->delete();
        }
        if (!empty($user->d_profile_id)) {
            $d_profile = DProfile::find($user->d_profile_id);
            $d_profile->delete();
        }
        if (!empty($user->c_profile_id)) {
            $c_profile = CProfile::find($user->c_profile_id);
            $c_profile->delete();
        }
        $user->delete();
        return 'ユーザー情報を凍結しました';
    }

    public function user_restore($user_id)
    {
        $user = User::withTrashed()->find($user_id);
        $user->restore();
        return 'ユーザー情報を復旧しました';
    }

    public function user_hard_destroy($user_id)
    {
        $user = User::find($user_id);
        $user->forceDelete();
        return 'ユーザー情報を削除しました';
    }

    public function contact_form(Request $request)
    {
        $data = $request;
        Mail::to('info@bolides-japan.com')->send(new BolidesJapanContactFormMail($data));
        return 'メールが送信されました';
    }

    public function ad_form(Request $request)
    {
        $data = $request;
        Mail::to('info@bolides-japan.com')->send(new BolidesJapanAdFormMail($data));
        return 'メールが送信されました';
    }

    public function plan_add(Request $request)
    {
        $data = $request;
        Mail::to('info@bolides-japan.com')->send(new BolidesJapanPlanAddMail($data));
        return 'メールが送信されました';
    }

    public function plan_change(Request $request)
    {
        $data = $request;
        Mail::to('info@bolides-japan.com')->send(new BolidesJapanPlanChangeMail($data));
        return 'メールが送信されました';
    }
}
