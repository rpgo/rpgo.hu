<?php

return [
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
        'show'      => 'members/{parameter}',
    ],
];