<?php

use Illuminate\Routing\Router;

/** @var Router $router */

$router->get(trans('routes.role.index'), [
    'uses'      => 'RoleController@dashboard',
    'as'        => 'role.dashboard',
]);

$router->post(trans('routes.role.store'), [
    'uses'      => 'RoleController@store',
    'as'        => 'role.store',
]);

$router->get(trans('routes.role.show', ['parameter' => 'role']), [
    'uses'      => 'RoleController@edit',
    'as'        => 'role.edit',
]);

$router->post(trans('routes.role.delete'),[
    'uses'      => 'RoleController@delete',
    'as'        => 'role.delete',
]);

$router->post(trans('routes.role.desert'),[
    'uses'      => 'RoleController@desert',
    'as'        => 'role.desert',
]);