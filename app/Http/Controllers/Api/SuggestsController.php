<?php

namespace App\Http\Controllers\Api;

use App\Services\BingSpellingService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\SuggestsInterfaceService;

class SuggestsController extends Controller
{
    /**
     * @var \App\Services\BingSpellingService
     */
    protected $bingSpellingService;

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
}
