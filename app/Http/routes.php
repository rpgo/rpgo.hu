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

});

$router->group(['domain' => env('APP_DOMAIN')], function(Router $router){

    $router->get('/', 'HomeController@index');

    $router->controllers([
        'auth'          => 'Auth\AuthController',
        'password'      => 'Auth\PasswordController',
    ]);

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

});