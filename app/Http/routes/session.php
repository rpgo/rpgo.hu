<?php

use Illuminate\Routing\Router;

/** @var Router $router */

$router->get(trans('routes.session.delete'), [
    'as'            => 'session.delete',
    'uses'          => 'SessionController@destroy',
    'middleware'    => 'auth',
]);