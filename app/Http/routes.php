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

use Illuminate\Routing\Router;

/** @var Router $router */

$router->group(['domain' => '{world}.' . env('APP_DOMAIN'), 'middleware' => ['guide', 'usher'] ], function(Router $router){

    $router->get('/', [
        'uses'          => 'WorldController@main',
        'as'            => 'world.main',
    ]);

    $router->get(trans('routes.member.create'), [
        'uses'          => 'MemberController@create',
        'as'            => 'member.create',
        'middleware'    => ['auth', 'stranger'],
    ]);

    $router->post(trans('routes.member.store'), [
        'uses'          => 'MemberController@store',
        'as'            => 'member.store',
        'middleware'    => ['auth', 'stranger'],
    ]);

    $router->get(trans('routes.member.index'), [
        'uses'          => 'MemberController@index',
        'as'            => 'member.index',
        'middleware'    => 'warden',
    ]);

    $router->get(trans('routes.member.show', ['parameter' => '{member}']), [
        'uses'          => 'MemberController@show',
        'as'            => 'member.show',
        'middleware'    => 'warden',
    ]);

    $router->post(trans('routes.world.publish'), [
        'uses'          => 'WorldController@publish',
        'as'            => 'world.publish',
        'middleware'    => 'warden',
    ]);

    $router->get(trans('routes.location.show', ['parameter' => '{location_path}']), [
        'as' => 'location.show',
        'uses' => 'LocationController@show',
    ]);

    $router->get(trans('routes.location.edit', ['parameter' => '{location_path}']), [
        'as' => 'location.edit',
        'uses' => 'LocationController@edit',
        'middleware' => 'warden',
    ]);

    $router->get(trans('routes.location.create', ['parameter' => '{location_path}']), [
        'as' => 'location.create',
        'uses' => 'LocationController@create',
        'middleware' => 'warden',
    ]);

    $router->post(trans('routes.location.store', ['parameter' => '{location_path}']), [
        'as' => 'location.store',
        'uses' => 'LocationController@store',
        'middleware' => 'warden',
    ]);

    $router->put(trans('routes.location.update', ['parameter' => '{location_path}']), [
        'as' => 'location.update',
        'uses' => 'LocationController@update',
        'middleware' => 'warden',
    ]);

});

$router->group(['domain' => env('APP_DOMAIN')], function(Router $router){

    $router->get(trans('routes.world.create'), [
        'uses'          => 'WorldController@create',
        'as'            => 'world.create',
        'middleware'    => 'auth',
    ]);

    $router->get(trans('routes.world.index'), [
        'uses'          => 'WorldController@index',
        'as'            => 'world.index',
    ]);

    $router->get(trans('routes.world.show', ['parameter' => '{world}']), [
        'uses'          => 'WorldController@show',
        'as'            => 'world.show',
    ]);

    $router->post(trans('routes.world.store'), [
        'uses'          => 'WorldController@store',
        'as'            => 'world.store',
        'middleware'    => 'auth',
    ]);

    $router->get('/', [
        'as' => 'rpgo.home',
        'uses' => 'HomeController@index'
    ]);

    $router->get(trans('routes.session.create'), [
        'as' => 'session.create',
        'uses' => 'Auth\AuthController@getLogin',
        'middleware' => 'guest',
    ]);

    $router->get(trans('routes.session.delete'), [
        'as' => 'session.delete',
        'uses' => 'Auth\AuthController@getLogout',
        'middleware' => 'auth',
    ]);

    $router->post(trans('routes.session.store'), [
        'as' => 'session.store',
        'uses' => 'Auth\AuthController@postLogin',
        'middleware' => 'guest',
    ]);

    $router->get(trans('routes.user.create'), [
        'as' => 'user.create',
        'uses' => 'Auth\AuthController@getRegister',
        'middleware' => 'guest',
    ]);

    $router->post(trans('routes.user.store'), [
        'as' => 'user.store',
        'uses' => 'Auth\AuthController@postRegister',
        'middleware' => 'guest',
    ]);

    $router->get(trans('routes.reset.create'), [
        'as' => 'reset.create',
        'uses' => 'Auth\PasswordController@getEmail',
        'middleware' => 'guest',
    ]);

    $router->post(trans('routes.reset.store'), [
        'as' => 'reset.store',
        'uses' => 'Auth\PasswordController@postEmail',
        'middleware' => 'guest',
    ]);

    $router->get(trans('routes.password.create', ['parameter' => '{token}']), [
        'as' => 'password.create',
        'uses' => 'Auth\PasswordController@getReset',
        'middleware' => 'guest',
    ]);

    $router->post(trans('routes.password.store'), [
        'as' => 'password.store',
        'uses' => 'Auth\PasswordController@postReset',
        'middleware' => 'guest',
    ]);

});