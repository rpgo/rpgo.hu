<?php

use Illuminate\Routing\Router;

/** @var Router $router */

$router->group(['prefix' => trans('routes.dashboard.prefix'), 'permission' => 'use.control',], function($router){
    $router->get('/', [
        'uses'          => 'DashboardController@main',
        'as'            => 'dashboard.main',
    ]);

    $router->post(trans('routes.world.publish'), [
        'uses'          => 'WorldController@publish',
        'as'            => 'world.publish',
    ]);

    require __DIR__ . '/role.php';

    require __DIR__ . '/settings.php';
});