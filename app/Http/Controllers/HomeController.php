<?php

namespace App\Http\Controllers;

use App\Models\ProductMaster;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $searchSource = $request->input('ds');

        if (isset($searchSource)) {
            return view('search', ['ds' => $searchSource]);
        }

        $brands = ProductMaster::select('brand')->groupBy('brand')->get();
        $categories = ProductMaster::select('type')->groupBy('type')->get();
        $featured = ProductMaster::select('id', 'type', 'brand', 'name', 'description', 'primary_image')->limit(10)->get();

        return view('search', [
                'brands' => $brands,
                'categories' => $categories,
                'featured' => $featured,
            ]);
    }
}
