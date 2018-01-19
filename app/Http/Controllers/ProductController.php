<?php

namespace App\Http\Controllers;

use App\Models\ProductMaster;
use Illuminate\Http\Request;

/**
 * Class ProductController
 *
 * @package App\Http\Controllers
 */
class ProductController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param $productId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function productsAll(Request $request)
    {
        $productParam = $request->input('type');
        $brands = ProductMaster::select('brand')->groupBy('brand')->get();
        $categories = ProductMaster::select('type')->groupBy('type')->get();
        $featured = ProductMaster::select('id','name','description','primary_image','brand','type')->get();
        return view('products-all',
            [
                'brands' => $brands,
                'categories' => $categories,
                'featured' => $featured,
                'productParam' => isset($productParam) && $productParam !== null ? $productParam : 'all',
        ]);
    }

}
