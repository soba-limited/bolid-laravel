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
use App\Mail\ContactMail;
use App\Models\CSalon;
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
        $salon = CSalon::limit(5)->orderBy('id', 'desc')->get();
        $special = LPickup::with(['LPost'=>function ($query) {
            $query->with(['user'=>function ($query) {
                $query->with('LProfile');
            }])->with('LCategory');
        }])->limit(12)->orderBy('id', 'desc')->get();

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
        ];

        $allarray = \Commons::LCommons($allarray);
        return $this->jsonResponse($allarray);
    }

    public function sendMail(Request $request)
    {
        $data = $request;
        Mail::to('yamauchi@ai-communication.jp')->send(new ContactMail($data));
        return 'メールが送信されました';
    }
}