<?php

namespace App\Http\Controllers\Api;

use AlgoliaSearch\AlgoliaException;
use AlgoliaSearch\Client as SearchClient;
use App\Models\ProductMaster;
use App\Services\AlgoliaSearchService;
use App\Services\BingSpellingService;
use App\Services\SearchInterfaceService;
use App\Traits\SuggestsStringReplacement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class SearchController extends Controller
{
    use SuggestsStringReplacement;

    /**
     * @var \App\Services\SearchInterfaceService
     */
    protected $searchInterfaceService;

    /**
     * SearchController constructor.
     *
     * @param \App\Services\SearchInterfaceService $searchInterfaceService
     */
    public function __construct(SearchInterfaceService $searchInterfaceService)
    {
        $this->searchInterfaceService = $searchInterfaceService;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function querySearch(Request $request)
    {
        $query = $request->input('q');

        if ($query == null) {
            return [
                'results' => false,
                'suggests' => 'Search cannot be null'
            ];
        }

        $response = $this->searchInterfaceService->querySearch($query);
        if($response['hits'] == null || empty($response['hits'])) {
            return [
                'results' => false,
            ];
        }

        return [
            'results' => $response['hits'],
        ];
    }

    /**
     * @param $query
     * @return bool
     */
    private function getSuggestsFromCache($query)
    {
        $key = str_replace(' ', '.', $query);

        if (Cache::has($key)) {
            return Cache::get($key);
        }

        return false;
    }

    private function setSuggestsFromCache($query, $replace)
    {
        $key = str_replace(' ', '.', $query);
        Cache::put($key, $replace);
    }

}
