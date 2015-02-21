<?php

return [
    'auth' => [
        'login'     => 'login',
        'logout'    => 'logout',
        'register'  => 'register',
    ],
    'password' => [
        'email'     => 'password/email',
        'reset'     => 'password/reset',
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