<?php

namespace App\Http\Controllers;

use App\Mail\DellamallContactMail;
use App\Mail\DellamallReportMail;
use App\Models\DPickup;
use App\Models\DShop;
use Illuminate\Http\Request;
use Mail;

class DIndexController extends Controller
{
    //

    public function index()
    {
        $popular = DShop::limit(10)->withCount('DGoods')->withCount('DMalls')->withCount('DComments')->get();
        $pick = DPickup::with(['DShop'=>function ($query) {
            $query->withCount('DGoods')->withCount('DMalls')->withCount('DComments')->orderBy('d_goods_count', 'desc');
        }])->limit(8)->get();

        $allarray = [
            'popular' => $popular,
            'pick' => $pick,
        ];
        return $this->jsonResponse($allarray);
    }

    public function index_more($page)
    {
        $limit = 28;
        $skip = ($page - 1) * $limit;

        $count = DShop::all()->count();
        $page_max = $count % $limit > 0 ? floor($count / $limit) + 1: $count / $limit;
        $add_page = DShop::orderBy('id', 'desc')->skip($skip)->limit($limit)->withCount('DGoods')->withCount('DMalls')->withCount('DComments')->get();

        $allarray = [
            'add_page' => $add_page,
            'page_max' => $page_max,
        ];

        return $this->jsonResponse($allarray);
    }

    public function sendMail(Request $request)
    {
        $data = $request;
        Mail::to('yamauchi@ai-communication.jp')->send(new DellamallContactMail($data));
        return 'メールが送信されました';
    }

    public function sendMail_report(Request $request)
    {
        $data = $request;
        Mail::to('yamauchi@ai-communication.jp')->send(new DellamallReportMail($data));
        return 'メールが送信されました';
    }
}
