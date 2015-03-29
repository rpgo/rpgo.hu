<?php

use Illuminate\Routing\Router;

/** @var Router $router */

$router->get(trans('routes.community.dashboard'), [
    'uses'      => 'CommunityController@dashboard',
    'as'        => 'community.dashboard'
]);