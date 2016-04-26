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

Route::get('/', 'TempController@index');
//Route::get('/', function () {
//    return view('welcome');
//});

Route::group([
    'prefix' => 'api'
], function () {
    Route::resource('state', 'StateController', [
        'except' => [
            'create',
            'edit',
        ]
    ]);

    Route::get('search/{zipCode}', [
        'as' => 'search',
        'uses' => 'SearchController@search',
    ]);

    Route::post('rules', [
        'as' => 'create_rules',
        'uses' => 'RulesController@create',
    ]);
});

