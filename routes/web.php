<?php

// presentation routes
Route::get('/', 'HomeController@index')->name('home');

// Products
Route::get('/product/{productId}', 'ProductController@productIndex')->name('product');
Route::get('/products', 'ProductController@productsAll')->name('products-all');

// Resource routes
Route::get('api/search','Api\SearchController@querySearch');
Route::get('api/search-mysql','Api\SearchController@querySearchMysql');


Route::get('api/spelling','Api\SuggestsController@querySuggests');
Route::get('api/spelling2','Api\SuggestsController@querySuggestsFromDom');


Route::get('api/product/{productId}','Api\ProductController@getProduct');
Route::get('api/products','Api\ProductController@getAllProducts');

Route::get('api/anon-user/{anonId}', 'Api\AnonymousUserController@setUserAnonIdWithViewActivity');

