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

Route::group(['domain' => '{world}.' . env('APP_DOMAIN')], function(){

    Route::get('/', [
        'uses'      => 'WorldController@main',
        'as'        => 'world.main',
    ]);

});

Route::group(['domain' => env('APP_DOMAIN')], function(){

    Route::get('/', 'WelcomeController@index');

    Route::get('home', 'HomeController@index');

    Route::controllers([
        'auth' => 'Auth\AuthController',
        'password' => 'Auth\PasswordController',
    ]);

    Route::get(trans('routes.world.create'), [
        'uses'          => 'WorldController@create',
        'as'            => 'world.create',
        'middleware'    => 'auth',
    ]);

    Route::get(trans('routes.world.index'), [
        'uses'          => 'WorldController@index',
        'as'            => 'world.index',
    ]);

    Route::get(trans('routes.world.show', ['parameter' => '{world}']), [
        'uses'          => 'WorldController@show',
        'as'            => 'world.show',
    ]);

    Route::post(trans('routes.world.store'), [
        'uses'          => 'WorldController@store',
        'as'            => 'world.store',
        'middleware'    => 'auth',
    ]);

});