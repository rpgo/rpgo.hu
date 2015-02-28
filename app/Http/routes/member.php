<?php

use Illuminate\Routing\Router;

/** @var Router $router */

$router->get(trans('routes.member.create'), [
    'uses'          => 'MemberController@create',
    'as'            => 'member.create',
]);

$router->post(trans('routes.member.store'), [
    'uses'          => 'MemberController@store',
    'as'            => 'member.store',
]);

$router->get(trans('routes.member.index'), [
    'uses'          => 'MemberController@index',
    'as'            => 'member.index',
]);

$router->get(trans('routes.member.show', ['parameter' => '{member}']), [
    'uses'          => 'MemberController@show',
    'as'            => 'member.show',
]);