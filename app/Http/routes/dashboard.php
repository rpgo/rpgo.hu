<?php

use Illuminate\Routing\Router;

/** @var Router $router */

$router->group(['prefix' => trans('routes.dashboard.prefix')], function($router){
    $router->get('/', [
        'uses'          => 'DashboardController@main',
        'as'            => 'dashboard.main',
        'permission'    => 'use.control',
    ]);

    $router->post(trans('routes.world.publish'), [
        'uses'          => 'WorldController@publish',
        'as'            => 'world.publish',
    ]);
});