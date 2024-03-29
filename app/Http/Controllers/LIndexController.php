<?php

namespace App\Http\Controllers;

use App\Models\LCategory;
use App\Models\LPickup;
use App\Models\LPost;
use App\Models\LPresent;
use App\Models\LSidebar;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Mail\LiondorContactMail;
use App\Mail\LiondorAdMail;
use App\Models\CSalon;
use App\Models\LCollection;
use App\Models\LFirst;
use Mail;

class LIndexController extends Controller
{
    //
    public function index()
    {
        //
        $fashion = \Commons::LPost_Category('fashion');
        $beauty = \Commons::LPost_Category('beauty');
        $trend = \Commons::LPost_Category('trend');
        $lifestyle = \Commons::LPost_Category('lifestyle');
        $wedding = \Commons::LPost_Category('wedding');
        $topleader = \Commons::LPost_Category('topleader');
        $fortune = \Commons::LPost_Category('fortune');
        $video = \Commons::LPost_Category('video');
        $present = LPresent::limit(5)->orderBy('id', 'desc')->get();
        $salon = CSalon::where('state', '>', 0)->where('stripe_api_id', '!=', null)->limit(5)->orderBy('id', 'desc')->get();
		$ids = LPickup::select('*')->pluck('l_post_id');
		$special = LPost::whereIn('id', $ids)->with(['user'=>function ($query) {
			$query->with('LProfile');
		}])->with('LCategory')->limit(12)->orderBy('view_date', 'desc')->get();
        $first = LFirst::with('LCategory')->with('user.LProfile')->get();
        $collection = LCollection::with('LCategory')->with('user.LProfile')->get();

        //それぞれを配列に入れる
        $allarray = [
            'special' => $special,
            'fashions' => $fashion,
            'beautys' => $beauty,
            'trends' => $trend,
            'lifestyles' => $lifestyle,
            'weddings' => $wedding,
            'topleaders' => $topleader,
            'fortunes' => $fortune,
            'videos' => $video,
            'presents' => $present,
            'salon' => $salon,
            'first' => $first,
            'collection' => $collection,
        ];

        $allarray = \Commons::LCommons($allarray);
        return $this->jsonResponse($allarray);
    }

    public function sendMail(Request $request)
    {
        $data = $request;
        Mail::to('liondor@bolides-japan.com')->send(new LiondorContactMail($data));
        return 'メールが送信されました';
    }

    public function sendMail_ad(Request $request)
    {
        $data = $request;
        Mail::to('liondor@bolides-japan.com')->send(new LiondorAdMail($data));
        return 'メールが送信されました';
    }
}
