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
        $matchingType = ProductMaster::where('type',$product->type)->get();
        $brand = ProductMaster::where('brand',$product->brand)->get();

        return response()->json([
            'product' => $product,
            'brand' =>$brand == null ? "No other products available for " . $product->brand : $brand,
            'types' => $matchingType,
        ]);
    }


    public function getAllProducts(Request $request)
    {
        $b = $request->input('b');
        $t = $request->input('t');

        $products = ProductMaster::select('id','name','description','primary_image','type','brand')->orderBy('name','ASC')->get();
        return response()->json([
            'results' =>$products]
        );
    }


}
