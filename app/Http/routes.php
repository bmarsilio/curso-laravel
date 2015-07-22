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
        Route::get('/', ['as' => 'admin.categories', 'uses' => 'AdminCategoriesController@index']);
        Route::get('/create', ['as' => 'admin.categories.create', 'uses' => 'AdminCategoriesController@index']);
        Route::get('/destroy/{id}', ['as' => 'admin.categories.destroy', 'uses' => 'AdminCategoriesController@index']);
        Route::get('/edit/{id}', ['as' => 'admin.categories.edit', 'uses' => 'AdminCategoriesController@index']);
        Route::put('/update/{id}', ['as' => 'admin.categories.update', 'uses' => 'AdminCategoriesController@index']);
    });

    Route::group(['prefix' => 'products'], function() {
        Route::get('/', ['as' => 'admin.products', 'uses' => 'AdminProductsController@index']);
        Route::get('/create', ['as' => 'admin.products.create', 'uses' => 'AdminProductsController@index']);
        Route::get('/destroy/{id}', ['as' => 'admin.products.destroy', 'uses' => 'AdminProductsController@index']);
        Route::get('/edit/{id}', ['as' => 'admin.products.edit', 'uses' => 'AdminProductsController@index']);
        Route::put('/update/{id}', ['as' => 'admin.products.update', 'uses' => 'AdminProductsController@index']);
    });

});

/*
 * Routes parameter validators
 * **/

Route::pattern('id', '[0-9]+');
