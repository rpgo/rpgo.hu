<?php

use Illuminate\Routing\Router;

/** @var Router $router */

$router->get(trans('routes.role.index'), [
    'uses'      => 'RoleController@index',
    'as'        => 'role.index',
]);

$router->post(trans('routes.role.store'), [
    'uses'      => 'RoleController@store',
    'as'        => 'role.store',
]);

$router->get(trans('routes.role.show', ['parameter' => 'role']), [
    'uses'      => 'RoleController@show',
    'as'        => 'role.show',
]);