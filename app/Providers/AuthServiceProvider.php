<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        ResetPassword::createUrlUsing(function ($notifiable, $token) {
            return config('app.frontend_url')."/password-reset/$token?email={$notifiable->getEmailForPasswordReset()}";
        });

        //
        Gate::define('admin', function ($user) {
            return ($user->account_type == 3);
        });

        Gate::define('editor', function ($user) {
            return ($user->account_type >= 2);
        });

        Gate::define('company', function ($user) {
            return ($user->account_type == 1 && $user->account_type >= 2);
        });

        Gate::define('normal', function ($user) {
            return ($user->account_type == 0 && $user->account_type >= 2);
        });
    }
}