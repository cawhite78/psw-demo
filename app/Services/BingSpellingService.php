<?php

namespace App\Services;

use GuzzleHttp\Client;

class BingSpellingService implements SuggestsInterfaceService
{
    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * @var \GuzzleHttp\Client
     */
    protected $suggestsClient;


    public function __construct(Client $suggestsClient)
    {
        $this->suggestsClient = $suggestsClient;
    }

    public function querySuggests($string)
    {
        $data = [
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Ocp-Apim-Subscription-Key' => collect(
                    config('services.bing.spell_check.keys'))->shuffle()->first(),
            ],
            'form_params' => [
                'mkt' =>'en-US',
                'method' => 'proof',
                'text' => urlencode($string)
            ]
        ];

        try {
            $response = $this->suggestsClient->request(
                'POST',
                'https://api.cognitive.microsoft.com/bing/v7.0/spellcheck',
                $data
            );
        } catch(\Exception $exception) {
            return $exception->getMessage();
        }

        $replacementData = json_decode($response->getBody()->getContents(),1);

        return $this->replace($string, $replacementData);

    }

    public function replace($string, $replacementData = [])
    {

        $miss = [];
        $suggest = [];
        $replacements = $replacementData['flaggedTokens'];
        foreach($replacements as $item) {
            $miss[] = $item['token'];
            $suggest[] = $item['suggestions'][0]['suggestion'];
        }

        $newString = str_replace($miss, $suggest, $string);

        return $newString;

    }


}