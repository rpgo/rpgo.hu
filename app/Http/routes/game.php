<?php

use Illuminate\Routing\Router;

/** @var Router $router */

$router->get(trans('routes.game.index'), [
    'uses'  => 'GameController@index',
    'as'    => 'game.index',
]);