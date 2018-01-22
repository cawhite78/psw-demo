<?php

namespace App\Providers;

use App\Services\User\UserActivityService;
use Illuminate\Support\ServiceProvider;

class UserActivityServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\UserActivityInterface', function ($app) {
            return new UserActivityService();
        });
    }
}
