<?php

return [
    'session' => [
        'create'    => 'login',
        'delete'    => 'logout',
        'store'     => 'login',
    ],
    'user' => [
        'create'    => 'register',
        'store'     => 'register'
    ],
    'reset' => [
        'create'    => 'reset',
        'store'     => 'reset'
    ],
    'password' => [
        'create'    => 'password/new',
        'store'     => 'password/new/:paremeter',
    ],
    'world' => [
        'index'     => 'worlds',
        'store'     => 'worlds',
        'create'    => 'worlds/create',
        'show'      => 'worlds/:parameter',
        'publish'   => 'publish',
    ],
    'member' => [
        'index'     => 'members',
        'store'     => 'join',
        'create'    => 'join',
        'show'      => 'members/:parameter',
    ],
    'location' => [
        'show'      => ':parameter',
        'edit'      => ':parameter/rename',
        'create'    => ':parameter/new/location',
        'store'     => ':parameter',
        'update'    => ':parameter',
        'remove'    => ':parameter/delete',
        'delete'    => ':parameter/delete',
        'move'      => ':parameter/move',
        'relocate'  => ':parameter/move',
        'except'    => 'rename$|new\/location$|delete$|move$',
    ],
    'character' => [
        'index' => 'characters',
        'create' => 'characters/new',
        'show' => 'characters/:parameter',
    ],
    'dashboard' => [
        'prefix' => 'control',
    ],
    'role' => [
        'index' => 'roles',
        'store' => 'roles',
        'show' => 'roles/{:parameter}',
    ],
];