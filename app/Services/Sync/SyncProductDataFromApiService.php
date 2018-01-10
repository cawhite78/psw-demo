<?php
/**
 * Created by PhpStorm.
 * User: coreywhite
 * Date: 1/9/18
 * Time: 10:00 PM
 */

namespace App\Services\Sync;

use App\Models\ProductMaster;
use GuzzleHttp\Client;

class SyncProductDataFromApiService
{


    public function sync()
    {
        $productIds = config('services.lps.product_ids');
        $client = new Client();
        foreach($productIds as $id) {
            $response = $client->request('GET', config('services.lps.endpoint') . $id,[
                'headers' =>[
                    'authkey' => config('services.lps.authkey')
                ]
            ]);
            try {
                $response = \GuzzleHttp\json_decode($response->getBody()->getContents(),1);

                $product = ProductMaster::updateOrCreate(
                    ['id' => $response['id']],
                    [
                        'name' => $response['name'],
                        'description' => $response['description'],
                        'images' => json_encode($response['images']),
                        'above_ground' => isset($response['aboveground']) ? $response['aboveground'] : 0,
                        'type' => $response['type'],
                        'brand' => $response['brand'],
                        'primary_image' => $response['images'][0]
                    ]
                );
            } catch(\Exception $exception) {
                echo $exception->getMessage();
                return false;
            }

            return true;
        }
    }
}