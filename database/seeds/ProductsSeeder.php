<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [];

        $raw = json_decode(Storage::get('public/master.json',1));

        foreach ($raw as $product) {
            $products[] = [
                'id' => $product->id,
                'name' => $product->name,
                'above_ground' => isset($product->aboveground) ? $product->aboveground : 0,
                'description' => $product->description,
                'brand' => $product->brand,
                'media' => json_encode($product->images),
                'type_category' => $product->type,
            ];
        }

        DB::table('products_master')->insert($products);
    }


}
