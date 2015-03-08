<?php

use Illuminate\Routing\Router;

/** @var Router $router */

$router->get(trans('routes.role.index'), [
    'uses'      => 'RoleController@dashboard',
    'as'        => 'role.dashboard',
]);

$router->post(trans('routes.role.rank'), [
    'uses'      => 'RoleController@rank',
    'as'        => 'role.rank',
]);

$router->post(trans('routes.role.hide'), [
    'uses'      => 'RoleController@hide',
    'as'        => 'role.hide',
]);

$router->post(trans('routes.role.unhide'), [
    'uses'      => 'RoleController@unhide',
    'as'        => 'role.unhide',
]);

$router->post(trans('routes.role.store'), [
    'uses'      => 'RoleController@store',
    'as'        => 'role.store',
]);

$router->get(trans('routes.role.create'), [
    'uses'      => 'RoleController@create',
    'as'        => 'role.create',
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

$router->post(trans('routes.role.update', ['parameter' => 'role']),[
    'uses'      => 'RoleController@update',
    'as'        => 'role.update',
]);

$router->post(trans('routes.role.assign', ['parameter' => 'role']), [
    'uses'      => 'RoleController@assign',
    'as'        => 'role.assign',
]);

$router->post(trans('routes.role.discharge', ['parameter' => 'role']), [
    'uses'      => 'RoleController@discharge',
    'as'        => 'role.discharge',
]);

$router->post(trans('routes.role.permit', ['parameter' => 'role']), [
    'uses'      => 'RoleController@permit',
    'as'        => 'role.permit',
]);