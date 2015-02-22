<?php

use Illuminate\Routing\Router;

/** @var Router $router */

$router->get(trans('routes.member.create'), [
    'uses'          => 'MemberController@create',
    'as'            => 'member.create',
    'middleware'    => ['auth', 'stranger'],
]);

$router->post(trans('routes.member.store'), [
    'uses'          => 'MemberController@store',
    'as'            => 'member.store',
    'middleware'    => ['auth', 'stranger'],
]);

$router->get(trans('routes.member.index'), [
    'uses'          => 'MemberController@index',
    'as'            => 'member.index',
    'middleware'    => 'warden',
]);

$router->get(trans('routes.member.show', ['parameter' => '{member}']), [
    'uses'          => 'MemberController@show',
    'as'            => 'member.show',
    'middleware'    => 'warden',
]);