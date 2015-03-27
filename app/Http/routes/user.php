<?php

use Illuminate\Routing\Router;

/** @var Router $router */

$router->get(trans('routes.session.create'), [
    'as' => 'session.create',
    'uses' => 'Auth\AuthController@getLogin',
    'middleware' => 'guest',
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