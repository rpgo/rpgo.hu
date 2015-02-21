<?php

return [
    'session' => [
        'create'    => 'bejelentkezes',
        'delete'    => 'kijelentkezes',
        'store'     => 'bejelentkezes',
    ],
    'user' => [
        'create'    => 'regisztracio',
        'store'     => 'regisztracio'
    ],
    'reset' => [
        'create'    => 'jelszo',
        'store'     => 'jelszo'
    ],
    'password' => [
        'create'     => 'jelszo/uj/:parameter',
        'store'     => 'jelszo/uj',
    ],
    'world' => [
        'index'     => 'vilagok',
        'store'     => 'vilagok/uj',
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