<?php

namespace App\Http\Controllers\User\Ajax;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AjaxSubscriptionController extends Controller
{
    // 課金を実行
    public function subscribe(Request $request, $user_id)
    {
        $user = User::find($user_id);

        if (!$user->subscribed($request->db_name)) {
            $payment_method = $request->payment_method;
            $plan = $request->plan;
            $user->newSubscription($request->db_name, $plan)->create($payment_method);
            $user->load($request->db_name);
        }

        return $this->status($user_id, $request->db_name);
    }

    // 課金をキャンセル
    public function cancel(Request $request, $user_id)
    {
        User::find($user_id)->subscription($request->db_name)
            ->cancel();
        return $this->status($user_id, $request->db_name);
    }

    // キャンセルしたものをもとに戻す
    public function resume(Request $request, $user_id)
    {
        User::find($user_id)->subscription($request->db_name)
            ->resume();
        return $this->status($user_id, $request->db_name);
    }

    // プランを変更する
    public function change_plan(Request $request, $user_id)
    {
        $plan = $request->plan;
        User::find($user_id)->subscription($request->db_name)
            ->swap($plan);
        return $this->status($user_id, $request->db_name);
    }

    // カードを変更する
    public function update_card(Request $request, $user_id)
    {
        $payment_method = $request->payment_method;
        User::find($user_id)->updateDefaultPaymentMethod($payment_method);
        return $this->status($user_id, $request->db_name);
    }

    // 課金状態を返す
    public function status($user_id, $db_name)
    {
        $status = 'unsubscribed';
        $user = User::find($user_id);
        $details = [];

        /*
        if ($user->subscribed($db_name)) { // 課金履歴あり
            if ($user->subscription($db_name)->cancelled()) {  // キャンセル済み
                $status = 'cancelled';
            } else {    // 課金中
                $status = 'subscribed';
            }

            $subscription = $user->subscriptions->first(function ($value) use ($db_name) {
                return ($value->name === $db_name);
            })->only('ends_at', 'stripe_plan');

            $details = [
                'end_date' => ($subscription['ends_at']) ? $subscription['ends_at']->format('Y-m-d') : null,
                'plan' => \Arr::get(config('services.stripe.plans'), $subscription['stripe_plan']),
                'card_last_four' => $user->card_last_four
            ];
        }
        */

        return [
            'status' => $status,
            'details' => $details
        ];
    }
}