<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['middleware' => 'web'], function()
{

    Route::get('/', ['as' => 'main.index.get', 'uses' => 'MasterController@getIndex']);
    Route::get('logowanie', ['as' => 'main.login.get', 'uses' => 'MasterController@getLogin']);
    Route::post('logowanie', ['as' => 'main.login.post', 'uses' => 'MasterController@postLogin']);

    Route::group(['prefix' => 'konspekty'], function()
    {
        Route::get('/', ['as' => 'konspekty.index.get', 'uses' => 'KonspektyController@getIndex']);
        Route::get('kategoria/{id}', ['as' => 'konspekty.kategoria.get', 'uses' => 'KonspektyController@getKategoria']);
        Route::get('konspekt/{konspektid}', ['as' => 'konspekty.konspekt.get', 'uses' => 'KonspektyController@getKonspekt']);
        Route::get('dodaj', ['as' => 'konspekty.dodaj.get', 'uses' => 'KonspektyController@getDodaj']);
        Route::post('dodaj', ['as' => 'konspekty.dodaj.post', 'uses' => 'KonspektyController@postDodaj']);
    });

    Route::group(['prefix' => 'zabawy'], function()
    {
        Route::get('/', ['as' => 'zabawy.index.get', 'uses' => 'ZabawyController@getIndex']);
        Route::get('kategoria/{id}', ['as' => 'zabawy.kategoria.get', 'uses' => 'ZabawyController@getKategoria']);
        Route::get('zabawa/{zabawaid}', ['as' => 'zabawy.konspekt.get', 'uses' => 'ZabawyController@getZabawa']);
        Route::get('dodaj', ['as' => 'zabawy.dodaj.get', 'uses' => 'ZabawyController@getDodaj']);
        Route::post('dodaj', ['as' => 'zabawy.dodaj.post', 'uses' => 'ZabawyController@postDodaj']);
    });

    Route::group(['middleware' => 'auth'], function()
    {
        Route::get('logout', ['as' => 'main.logout.get', 'uses' => 'MasterController@getLogout']);
    });
});
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/