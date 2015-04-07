<?php

use Illuminate\Routing\Router;

/** @var Router $router */

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