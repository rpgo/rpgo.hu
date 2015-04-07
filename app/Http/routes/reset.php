<?php

use Illuminate\Routing\Router;

/** @var Router $router */

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