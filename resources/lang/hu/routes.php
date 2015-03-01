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
        'publish'   => 'elesites',
    ],
    'member' => [
        'index'     => 'tagok',
        'store'     => 'csatlakozas',
        'create'    => 'csatlakozas',
        'show'      => 'tagok/:parameter',
    ],
    'location' => [
        'show'      => ':parameter',
        'edit'      => ':parameter/atnevezes',
        'create'    => ':parameter/uj/helyszin',
        'store'     => ':parameter',
        'update'    => ':parameter',
        'remove'    => ':parameter/torles',
        'delete'    => ':parameter/torles',
        'move'      => ':parameter/athelyezes',
        'relocate'  => ':parameter/athelyezes',
        'except'    => 'atnevezes$|uj\/helyszin$|athelyezes$|torles$',
    ],
    'character' => [
        'index' => 'karakterek',
        'create' => 'karakterek/uj',
        'show' => 'karakterek/:parameter',
    ],
    'dashboard' => [
        'prefix' => 'iranyitopult',
    ],
    'role' => [
        'index' => 'szerepek',
        'store' => 'szerepek',
        'show' => 'szerepek/{:parameter}',
        'update' => 'szerepek/{:parameter}/szerkesztes',
        'assign' => 'szerepek/{:parameter}/felruhazas',
    ],
];