<?php

return [
    'auth' => [
        'login'     => 'bejelentkezes',
        'logout'    => 'kijelentkezes',
        'register'  => 'regisztracio',
    ],
    'password' => [
        'email'     => 'jelszo/email',
        'reset'     => 'jelszo/uj',
    ],
    'world' => [
        'index'     => 'vilagok',
        'store'     => 'vilagok',
        'create'    => 'vilagok/uj',
        'show'      => 'vilagok/:parameter',
    ],
    'member' => [
        'index'     => 'tagok',
        'store'     => 'csatlakozas',
        'create'    => 'csatlakozas',
        'show'      => 'tagok/:parameter',
    ],
];