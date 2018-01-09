<?php

namespace App\Providers;

use App\Services\BingSpellingService;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class SuggestsServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\SuggestsInterfaceService', function($app){
            $config = [];
            return new BingSpellingService(
                new Client($config)
            );
        });

    }
}
