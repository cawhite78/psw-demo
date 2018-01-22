<?php

namespace App\Http\Controllers\Api;

use AlgoliaSearch\AlgoliaException;
use AlgoliaSearch\Client as SearchClient;
use App\Models\ProductMaster;
use App\Services\AlgoliaSearchService;
use App\Services\BingSpellingService;
use App\Services\SearchInterfaceService;
use App\Services\User\UserActivityService;
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
     * @var \App\Services\User\UserActivityService
     */
    protected $userActivityService;

    /**
     * SearchController constructor.
     *
     * @param \App\Services\SearchInterfaceService $searchInterfaceService
     * @param \App\Services\User\UserActivityService $userActivityService
     */
    public function __construct(SearchInterfaceService $searchInterfaceService, UserActivityService $userActivityService)
    {
        $this->searchInterfaceService = $searchInterfaceService;
        $this->userActivityService = $userActivityService;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function querySearch(Request $request)
    {
        /** @var User query $query */
        $query = $request->input('q');
        /** @var  Hydrated by click event on user brand $brand */
        $brand = $request->input('b');

        if ($query == null) {
            return [
                'results' => false,
                'suggests' => 'Search cannot be null'
            ];
        }

        $query = $brand !== null ? $brand . ' ' . $query : $query;

        $response = $this->searchInterfaceService->querySearch(urlencode($query));

        if($response['hits'] == null || empty($response['hits'])) {
            return [
                'results' => false,
            ];
        }

        //$this->userActivityService->setUserSearch($query);

        $products = collect($response['hits']);
        $products = $products->map(function ($product) {
            $product['type_encoded'] = str_replace(' ','-',$product['type']);
            return $product;
        });

        $brands = $products->mapToGroups(function ($item, $key) {
            return [$item['brand']];
        })->flatten(2)->unique()->flatten(2);



        $returnData = [
            'brands' =>  $brands,
            'results' => $products,
        ];

        return response()->json($returnData);

    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function querySearchFull(Request $request)
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
            'results' => $response,
        ];
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function querySearchMysql(Request $request)
    {
        $query = $request->input('q');

        if ($query == null) {
            return [
                'results' => false,
                'suggests' => 'Search cannot be null'
            ];
        }

        $response = \DB::select('SELECT *, MATCH (`description`,`name`,`brand`,`type`) AGAINST (?) as score FROM products_master_fulltext WHERE MATCH (`description`,`name`,`brand`,`type`) AGAINST (?) > 0 ORDER BY score DESC;',[$query, $query]);

        return [
            'results' => $response,
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
