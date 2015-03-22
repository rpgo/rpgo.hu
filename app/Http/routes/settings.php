<?php

use Illuminate\Routing\Router;

/** @var Router $router */

$router->get(trans('routes.settings.edit'), [
    'uses'          => 'SettingsController@edit',
    'as'            => 'settings.edit',
]);

$router->post(trans('routes.settings.update'), [
    'uses'          => 'SettingsController@update',
    'as'            => 'settings.update',
]);