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

Route::group(['prefix' => 'admin', 'middleware' => 'auth.admin'], function() {

    Route::group(['prefix' => 'categories'], function() {
        Route::get('/', ['as' => 'admin.categories', 'uses' => 'AdminCategoriesController@index']);
        Route::post('store', ['as' => 'admin.categories.store', 'uses' => 'AdminCategoriesController@store']);
        Route::get('create', ['as' => 'admin.categories.create', 'uses' => 'AdminCategoriesController@create']);
        Route::get('destroy/{id}', ['as' => 'admin.categories.destroy', 'uses' => 'AdminCategoriesController@destroy']);
        Route::get('edit/{id}', ['as' => 'admin.categories.edit', 'uses' => 'AdminCategoriesController@edit']);
        Route::put('update/{id}', ['as' => 'admin.categories.update', 'uses' => 'AdminCategoriesController@update']);
    });

    Route::group(['prefix' => 'products'], function() {
        Route::get('/', ['as' => 'admin.products', 'uses' => 'AdminProductsController@index']);
        Route::post('store', ['as' => 'admin.products.store', 'uses' => 'AdminProductsController@store']);
        Route::get('create', ['as' => 'admin.products.create', 'uses' => 'AdminProductsController@create']);
        Route::get('destroy/{id}', ['as' => 'admin.products.destroy', 'uses' => 'AdminProductsController@destroy']);
        Route::get('edit/{id}', ['as' => 'admin.products.edit', 'uses' => 'AdminProductsController@edit']);
        Route::put('update/{id}', ['as' => 'admin.products.update', 'uses' => 'AdminProductsController@update']);

        Route::group(['prefix' => 'images'], function() {
            Route::get('{id}', ['as' => 'admin.products.images', 'uses' => 'AdminProductsController@images']);
            Route::get('create/{id}', ['as' => 'admin.products.images.create', 'uses' => 'AdminProductsController@createImage']);
            Route::post('store/{id}', ['as' => 'admin.products.images.store', 'uses' => 'AdminProductsController@storeImage']);
            Route::get('destroy/{id}', ['as' => 'admin.products.images.destroy', 'uses' => 'AdminProductsController@destroyImage']);
        });
    });

});

Route::group(['prefix' => '/'], function() {

    Route::get('/', ['as' => 'store', 'uses' => 'StoreController@index']);
    Route::get('category/{id}', ['as' => 'store.by.category', 'uses' => 'StoreController@indexByCategory']);
    Route::get('product/{id}', ['as' => 'productDetail', 'uses' => 'StoreController@indexByProduct']);
    Route::get('tag/{id}', ['as' => 'store.by.tag', 'uses' => 'StoreController@indexByTag']);

    Route::group(['prefix' => 'cart'], function() {
        Route::get('/', ['as' => 'store.cart', 'uses' => 'CartController@index']);
        Route::get('/add/{id}', ['as' => 'store.cart.add', 'uses' => 'CartController@add']);
        Route::get('/destroy/{id}', ['as' => 'store.cart.destroy', 'uses' => 'CartController@destroy']);
        Route::get('/adjust-qtd/{type}/{id}/{qtd}', ['as' => 'store.cart.adjust', 'uses' => 'CartController@itemQuantity']);
    });

    Route::get('checkout/place-order', ['as' => 'checkout.place', 'middleware' => 'auth', 'uses' => 'CheckoutController@place']);

});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

/*
Route::get('categories', ['as' => 'categories', 'uses' => 'CategoriesController@index']);
Route::post('categories', ['as' => 'categories.store', 'uses' => 'CategoriesController@store']);
Route::get('categories/create', ['as' => 'categories.create', 'uses' => 'CategoriesController@create']);
Route::get('categories/destroy/{id}', ['as' => 'categories.destroy', 'uses' => 'CategoriesController@destroy']);
Route::get('categories/edit/{id}', ['as' => 'categories.edit', 'uses' => 'CategoriesController@edit']);
Route::put('categories/update/{id}', ['as' => 'categories.update', 'uses' => 'CategoriesController@update']);
*/

/*
 * Routes parameter validators
 * **/

Route::pattern('id', '[0-9]+');
