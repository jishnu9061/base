<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */


    public function boot()
    {
        Request::setTrustedProxies(
            [$this->app['request']->getClientIp()],
            Request::HEADER_X_FORWARDED_ALL
        );
    }
}
