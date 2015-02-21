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
    ],
    'member' => [
        'index'     => 'members',
        'store'     => 'join',
        'create'    => 'join',
        'show'      => 'members/:parameter',
    ],
];