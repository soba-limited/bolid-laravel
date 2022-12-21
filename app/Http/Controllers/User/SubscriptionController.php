<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $intent = $user->createSetupIntent();
        return $this->jsonResponse($user);
    }
}