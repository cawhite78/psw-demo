<?php

namespace App\Http\Controllers;

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
        return view('search');
    }

    public function vueSearch()
    {
        return view('vue-search');
    }
}
