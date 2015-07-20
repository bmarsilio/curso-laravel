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
//Route::pattern('id', '[0-9]+');
//
//Route::get('user/{id?}', //function($id = 0) {
//    if($id)
//        return $id;
//
//    return 'Nao foi passado id';
//});


Route::group(['prefix' => 'admin'], function() {
    Route::get('produtos', ['as' => 'produtos', function() {
        return 'Produtos';
    }]);
});
