<?php

namespace App\Http\Controllers\Api;

use App\Services\BingSpellingService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\SuggestsInterfaceService;
use Goutte\Client as GoutteClient;
use Illuminate\Support\Facades\Cache;

class SuggestsController extends Controller
{
    /**
     * @var \App\Services\BingSpellingService
     */
    protected $bingSpellingService;
    protected $suggestsFromExternal;
    /**
     * SuggestsController constructor.
     *
     * @param \App\Services\BingSpellingService $bingSpellingService
     * @internal param \App\Services\SuggestsInterfaceService $suggestsInterfaceService
     */
    public function __construct(BingSpellingService $bingSpellingService)
    {
        $this->bingSpellingService = $bingSpellingService;
    }

    public function querySuggests(Request $request)
    {
        $query = $request->input('q');

        $response = $this->bingSpellingService->querySuggests($query);

        return [
            'results' => $response
        ];

    }

    public function querySuggestsFromDom(Request $request)
    {
        $stringToCheck = $request->input('q');

        if($stringToCheck == null || strlen($stringToCheck) < 4) {
            return response()->json(
              [
                  'results' => 0,
                  'message' => 'strings less than 4 characters cannot be searched'
              ]
            );
        }

        $input = str_replace(' ', '_', $stringToCheck);
        $key = 'suggests'.':'.$input;

        if (Cache::has($key)) {
            return Cache::get($key);
        }

        $url = 'https://www.gigablast.com/search?c=main&q=' . urlencode($stringToCheck) . '&rand='. rand(1000000000000,9999999999999).'&rxiec=1901700632';
        $client = new GoutteClient();
        $crawler = $client->request('GET', 'https://www.gigablast.com/search?c=main&q=' . urlencode($stringToCheck) . '&rand='. rand(1000000000000,9999999999999).'&rxiec=1901700632');

        $crawler->filter('#box > i > font > a')->each(function ($node) use($key) {
            $this->suggestsFromExternal = $node->text();
        });

        Cache::put($key, $this->suggestsFromExternal);
        return response()->json([
            'results' => $this->suggestsFromExternal,
        ]);
    }
}
