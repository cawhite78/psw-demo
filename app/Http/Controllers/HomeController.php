<?php

namespace App\Http\Controllers;

use App\Models\ProductMaster;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index2()
    {
        return view('home');
    }

    public function search(Request $request)
    {
        $searchSource = $request->input('ds');
        if(isset($searchSource)) {
            return view('search',['ds' => $searchSource]);
        }

        $brands = ProductMaster::select('brand')->groupBy('brand')->get();
        $categories = ProductMaster::select('type')->groupBy('type')->get();
        $featured = ProductMaster::select('name','description','primary_image')->limit(3)->get();
        return view('search',
            [
                'brands' => $brands,
                'categories' => $categories,
                'featured' => $featured,
            ]);
    }

    public function vueSearch()
    {
        return view('vue-search');
    }
}
