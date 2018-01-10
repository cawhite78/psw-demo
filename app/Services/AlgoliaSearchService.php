<?php

namespace App\Services;


use AlgoliaSearch\AlgoliaException;
use AlgoliaSearch\Client;

class AlgoliaSearchService implements SearchInterfaceService
{
    protected $searchClient;

    /**
     * AlgoliaSearchServiceService constructor.
     * @param \AlgoliaSearch\Client $searchClient
     */
    public function __construct(Client $searchClient)
    {
        $this->searchClient = $searchClient;
    }

    public function querySearch($query)
    {
        $index = $this->searchClient->initIndex(config('services.algolia.index'));

        try {
            $res = $index->search($query, [
                'attributesToRetrieve' => ['id','name', 'brand', 'primary_image','description'],
                'hitsPerPage' => 50,
            ]);
        } catch (AlgoliaException $exception) {
            return $exception->getMessage();
        }

        return $res;
    }

}