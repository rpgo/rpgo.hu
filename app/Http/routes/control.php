<?php

use Illuminate\Routing\Router;

/** @var Router $router */

$router->group(['prefix' => trans('routes.control.prefix')], function($router){
    $router->get('/', [
        'uses'          => 'ControlController@main',
        'as'            => 'control.main',
        'permission'    => 'use.control',
    ]);

    $router->post(trans('routes.world.publish'), [
        'uses'          => 'WorldController@publish',
        'as'            => 'world.publish',
    ]);
});