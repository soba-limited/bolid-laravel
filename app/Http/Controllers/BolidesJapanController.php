<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\BolidesJapanPlanAddMail;

class BolidesJapanController extends Controller
{
    //
    public function plan_add(Request $request)
    {
        $data = $request;
        Mail::to('yamauchi@ai-communication.jp')->send(new BolidesJapanPlanAddMail($data));
        return 'メールが送信されました';
    }

    public function plan_change(Request $request)
    {
        $data = $request;
        Mail::to('yamauchi@ai-communication.jp')->send(new BolidesJapanPlanAddMail($data));
        return 'メールが送信されました';
    }
}
