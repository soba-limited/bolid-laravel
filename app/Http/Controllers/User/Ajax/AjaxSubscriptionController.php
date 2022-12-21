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

        if (!$user->subscribed('main')) {
            $payment_method = $request->payment_method;
            $plan = $request->plan;
            $user->newSubscription('main', $plan)->create($payment_method);
            $user->load('subscriptions');
        }

        return $this->status($user_id);
    }

    // 課金をキャンセル
    public function cancel(Request $request, $user_id)
    {
        User::find($user_id)->subscription('main')
            ->cancel();
        return $this->status($user_id);
    }

    // キャンセルしたものをもとに戻す
    public function resume(Request $request, $user_id)
    {
        User::find($user_id)->subscription('main')
            ->resume();
        return $this->status($user_id);
    }

    // プランを変更する
    public function change_plan(Request $request, $user_id)
    {
        $plan = $request->plan;
        User::find($user_id)->subscription('main')
            ->swap($plan);
        return $this->status($user_id);
    }

    // カードを変更する
    public function update_card(Request $request, $user_id)
    {
        $payment_method = $request->payment_method;
        User::find($user_id)->updateDefaultPaymentMethod($payment_method);
        return $this->status($user_id);
    }

    // 課金状態を返す
    public function status($user_id)
    {
        $status = 'unsubscribed';
        $user = User::find($user_id);
        $details = [];

        if ($user->subscribed('main')) { // 課金履歴あり
            if ($user->subscription('main')->cancelled()) {  // キャンセル済み
                $status = 'cancelled';
            } else {    // 課金中
                $status = 'subscribed';
            }

            $subscription = $user->subscriptions->first(function ($value) {
                return ($value->name === 'main');
            })->only('ends_at', 'stripe_plan');

            $details = [
                'end_date' => ($subscription['ends_at']) ? $subscription['ends_at']->format('Y-m-d') : null,
                'plan' => \Arr::get(config('services.stripe.plans'), $subscription['stripe_plan']),
                'card_last_four' => $user->card_last_four
            ];
        }

        return [
            'status' => $status,
            'details' => $details
        ];
    }
}