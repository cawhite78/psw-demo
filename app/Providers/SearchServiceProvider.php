<?php

namespace App\Providers;

use AlgoliaSearch\Client;
use App\Services\AlgoliaSearchService;
use Illuminate\Support\ServiceProvider;

class SearchServiceProvider extends ServiceProvider
{

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\SearchInterfaceService', function($app){
            return new AlgoliaSearchService(
                new Client(config('services.algolia.app_id'), config('services.algolia.secret'))
            );
        });
    }
}
