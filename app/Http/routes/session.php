<?php

use Illuminate\Routing\Router;

/** @var Router $router */

$router->get(trans('routes.session.create'), [
    'as' => 'session.create',
    'uses' => 'SessionController@create',
    'middleware' => 'guest',
]);

$router->post(trans('routes.session.store'), [
    'as' => 'session.store',
    'uses' => 'SessionController@store',
    'middleware' => 'guest',
]);

$router->get(trans('routes.session.delete'), [
    'as'            => 'session.delete',
    'uses'          => 'SessionController@destroy',
    'middleware'    => 'auth',
]);