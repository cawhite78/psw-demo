<?php

namespace App\Http\Controllers\Api;

use App\Models\ProductMaster;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    public function getProduct($productId)
    {
        $product = ProductMaster::where('id',$productId)->first();
        return response(json_decode($product['media'],1));
    }

    public function productIndex(Request $request, $productId)
    {
        /** @var ProductMaster $product */
        $product = $this->getProduct($productId);
        return view('product',[
            'data' => $product->toArray()
        ]);
    }
}
