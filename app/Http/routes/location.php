<?php

use Illuminate\Routing\Router;

/** @var Router $router */

$router->get(trans('routes.location.show', ['parameter' => '{location}']), [
    'as' => 'location.show',
    'uses' => 'LocationController@show',
]);

$router->get(trans('routes.location.edit', ['parameter' => '{location}']), [
    'as' => 'location.rename.form',
    'uses' => 'LocationController@renameForm',
    'middleware' => 'warden',
]);

$router->get(trans('routes.location.create', ['parameter' => '{location}']), [
    'as' => 'location.create',
    'uses' => 'LocationController@create',
    'middleware' => 'warden',
]);

$router->post(trans('routes.location.store', ['parameter' => '{location}']), [
    'as' => 'location.store',
    'uses' => 'LocationController@store',
    'middleware' => 'warden',
]);

$router->put(trans('routes.location.update', ['parameter' => '{location}']), [
    'as' => 'location.rename.action',
    'uses' => 'LocationController@renameAction',
    'middleware' => 'warden',
]);

$router->get(trans('routes.location.remove', ['parameter' => '{location}']), [
    'as' => 'location.remove',
    'uses' => 'LocationController@remove',
    'middleware' => 'warden',
]);

$router->delete(trans('routes.location.delete', ['parameter' => '{location}']), [
    'as' => 'location.delete',
    'uses' => 'LocationController@delete',
    'middleware' => 'warden',
]);

$router->get(trans('routes.location.move', ['parameter' => '{location}']), [
    'as' => 'location.move',
    'uses' => 'LocationController@move',
    'middleware' => 'warden',
]);

$router->post(trans('routes.location.relocate', ['parameter' => '{location}']), [
    'as' => 'location.relocate',
    'uses' => 'LocationController@relocate',
    'middleware' => 'warden',
]);