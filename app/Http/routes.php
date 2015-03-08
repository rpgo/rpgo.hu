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

$router->group(['domain' => '{world}.' . env('APP_DOMAIN'), 'middleware' => ['guide', 'usher', 'permission'] ], function(Router $router){

    $router->get('/', [
        'uses'          => 'WorldController@main',
        'as'            => 'world.main',
    ]);

    require __DIR__ . '/routes/dashboard.php';

    $router->get(trans('routes.status.toggle'), [
        'uses' => 'StatusController@toggle',
        'as' => 'status.toggle'
    ]);

    require __DIR__ . '/routes/member.php';

    require __DIR__ . '/routes/character.php';

    require __DIR__ . '/routes/location.php';

});

$router->group(['domain' => env('APP_DOMAIN')], function(Router $router){

    $router->post('queue/iron', function(){ return \Queue::marshal(); });

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

    require __DIR__ . '/routes/user.php';

});