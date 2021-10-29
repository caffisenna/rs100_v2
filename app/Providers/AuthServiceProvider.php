<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

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

        // 認証メールの日本語化
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                ->subject('RS100kmハイク メール認証のお知らせ')
                ->greeting('こんにちは!')
                ->line('以下のボタンをクリックしてメール認証を完了させて下さい。メール認証が完了しないと参加申込をすることができません。')
                ->salutation('弥栄')
                ->action('メールを認証する', $url);
        });
        //

        // admin
        Gate::define('admin', function (\App\Models\User $user) {
            return $user->is_admin;
        });

        // commi
        Gate::define('commi', function (\App\Models\User $user) {
            return $user->is_commi;
        });

        // staff
        Gate::define('staff', function (\App\Models\User $user) {
            return $user->is_staff;
        });
    }
}
