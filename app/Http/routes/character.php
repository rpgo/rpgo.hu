<?php

use Illuminate\Routing\Router;

/** @var Router $router */

$router->get(trans('routes.character.index'), [
    'as' => 'character.index',
    'uses' => 'CharacterController@index',
]);

$router->get(trans('routes.character.create'), [
    'as' => 'character.create',
    'uses' => 'CharacterController@create',
]);

$router->get(trans('routes.character.show', ['parameter' => '{character}']), [
    'as' => 'character.show',
    'uses' => 'CharacterController@show',
]);