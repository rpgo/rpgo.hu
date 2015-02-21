<?php

return [
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