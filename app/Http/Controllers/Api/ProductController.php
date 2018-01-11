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

    public function productIndex(Request $request, $productId)
    {
        /** @var ProductMaster $product */
        $product = ProductMaster::where('id',$productId)->first();
        $matchingType =ProductMaster::where('type',$product->type)->where('id',"!=",$product->id)->get();
        $brand = ProductMaster::where('brand',$product->brand)->where('id',"!=",$product->id)->get();


        return view('product',[
            'product' => $product,
            'brand' =>$brand,
            'types' => $matchingType,
        ]);
    }


}
