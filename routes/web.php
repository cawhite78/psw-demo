<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Models\ProductMaster;
use Illuminate\Support\Facades\Input;

Route::get('/', function(){
   return view('welcome');
});


Auth::routes();

Route::get('api/search','Api\SearchController@querySearch');
//Route::get('/api/search',function(){
//    $query = Input::get('query');
//    $users = ProductMaster::where('name','like','%'.$query.'%')->get();
//    return response()->json($users);
//});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/search', 'HomeController@search')->name('search');
Route::get('/vue-search', function(){
    return view('vue-search');
} );

Route::get('api/search','Api\SearchController@querySearch');
Route::get('api/spelling','Api\SuggestsController@querySuggests');

