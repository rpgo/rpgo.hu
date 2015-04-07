<?php

use Illuminate\Routing\Router;

/** @var Router $router */

$router->get(trans('routes.user.create'), [
    'as' => 'user.create',
    'uses' => 'UserController@create',
    'middleware' => 'guest',
]);

$router->post(trans('routes.user.store'), [
    'as' => 'user.store',
    'uses' => 'UserController@store',
    'middleware' => 'guest',
]);