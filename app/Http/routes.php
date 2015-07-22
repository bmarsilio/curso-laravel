<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/exemplo', 'WelcomeController@exemplo');

/*Exemplos:*/
/*Define um padrao a ser recebido como parametro na rota*/

//
//Route::get('user/{id?}', //function($id = 0) {
//    if($id)
//        return $id;
//
//    return 'Nao foi passado id';
//});

Route::group(['prefix' => 'admin'], function() {

    Route::group(['prefix' => 'categories'], function() {
        Route::get('categories', ['as' => 'admin.categories', 'uses' => 'AdminCategoriesController@index']);
        Route::post('categories', ['as' => 'admin.categories.store', 'uses' => 'AdminCategoriesController@store']);
        Route::get('categories/create', ['as' => 'admin.categories.create', 'uses' => 'AdminCategoriesController@create']);
        Route::get('categories/destroy/{id}', ['as' => 'admin.categories.destroy', 'uses' => 'AdminCategoriesController@destroy']);
        Route::get('categories/edit/{id}', ['as' => 'admin.categories.edit', 'uses' => 'AdminCategoriesController@edit']);
        Route::put('categories/update/{id}', ['as' => 'admin.categories.update', 'uses' => 'AdminCategoriesController@update']);
    });

    Route::group(['prefix' => 'products'], function() {
        Route::get('products', ['as' => 'admin.products', 'uses' => 'AdminProductsController@index']);
        Route::post('products', ['as' => 'admin.products.store', 'uses' => 'AdminProductsController@store']);
        Route::get('products/create', ['as' => 'admin.products.create', 'uses' => 'AdminProductsController@create']);
        Route::get('products/destroy/{id}', ['as' => 'admin.products.destroy', 'uses' => 'AdminProductsController@destroy']);
        Route::get('products/edit/{id}', ['as' => 'admin.products.edit', 'uses' => 'AdminProductsController@edit']);
        Route::put('products/update/{id}', ['as' => 'admin.products.update', 'uses' => 'AdminProductsController@update']);
    });

});

Route::get('categories', ['as' => 'categories', 'uses' => 'CategoriesController@index']);
Route::post('categories', ['as' => 'categories.store', 'uses' => 'CategoriesController@store']);
Route::get('categories/create', ['as' => 'categories.create', 'uses' => 'CategoriesController@create']);
Route::get('categories/destroy/{id}', ['as' => 'categories.destroy', 'uses' => 'CategoriesController@destroy']);
Route::get('categories/edit/{id}', ['as' => 'categories.edit', 'uses' => 'CategoriesController@edit']);
Route::put('categories/update/{id}', ['as' => 'categories.update', 'uses' => 'CategoriesController@update']);
/*
 * Routes parameter validators
 * **/

Route::pattern('id', '[0-9]+');
