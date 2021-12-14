<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use App\Auth\CustomSessionGuard;
use App\Auth\CustomEloquentUserProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Auth::provider('customUsers', function ($app, array $config) {
            return new CustomEloquentUserProvider($this->app['hash'], $config['model']);
        });

        Auth::extend('custom', function($app, $name, array $config) {
            $session = $this->app->make(Session::class);
            $provider = Auth::createUserProvider($config['provider'] ?? null);
            $guard = new CustomSessionGuard($name, $provider, $app["session.store"]);

            //認証サービスのrememberme機能を使用する場合は、
            //ガードの暗号化インスタンスを設定する必要があります。
            //これにより、安全な暗号化されたCookie値をそれらのCookieに対して生成できます。
            if (method_exists($guard, 'setCookieJar')) {
                $guard->setCookieJar($app['cookie']);
            }

            if (method_exists($guard, 'setDispatcher')) {
                $guard->setDispatcher($app['events']);
            }

            if (method_exists($guard, 'setRequest')) {
                $guard->setRequest($app->refresh('request', $guard, 'setRequest'));
            }

            return $guard;
        });

        // 開発者のみ許可
        Gate::define('system-only', function ($user) {
            return ($user->role == 1);
        });
        // 管理者以上（管理者＆システム管理者）に許可
        Gate::define('admin-higher', function ($user) {
            return ($user->role > 0 && $user->role <= 5);
        });
        // 一般ユーザ以上（つまり全権限）に許可
        Gate::define('user-higher', function ($user) {
            return ($user->role > 0 && $user->role <= 10);
        });
    }
}
