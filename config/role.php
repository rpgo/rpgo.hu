<?php

return [
    'seed' => [
        'support' => [
            'name_group' => 'role.support.name_group',
            'name_solo' => 'role.support.name_solo',
            'description' => 'role.support.description',
            'secret_role' => false,
            'automates_members' => false,
            'type' => 'support',
            'permissions' => [
                'use.control' => 1,
            ],
        ],
        'staff' => [
            'name_group' => 'role.staff.name_group',
            'name_solo' => 'role.staff.name_solo',
            'description' => 'role.staff.description',
            'secret_role' => false,
            'automates_members' => false,
            'type' => 'staff',
            'permissions' => [
                'use.control' => 0,
            ],
        ],
        'admin' => [
            'name_group' => 'role.admin.name_group',
            'name_solo' => 'role.admin.name_solo',
            'description' => 'role.admin.description',
            'secret_role' => false,
            'automates_members' => false,
            'type' => 'staff',
            'permissions' => [
                'use.control' => 1,
            ],
        ],
        'mod' => [
            'name_group' => 'role.mod.name_group',
            'name_solo' => 'role.mod.name_solo',
            'description' => 'role.mod.description',
            'secret_role' => false,
            'automates_members' => false,
            'type' => 'staff',
            'permissions' => [
                'use.control' => 0,
            ],
        ],
        'player' => [
            'name_group' => 'role.player.name_group',
            'name_solo' => 'role.player.name_solo',
            'description' => 'role.player.description',
            'secret_role' => false,
            'automates_members' => true,
            'type' => 'player',
            'permissions' => [
                'use.control' => 0,
            ],
        ],
        'master' => [
            'name_group' => 'role.master.name_group',
            'name_solo' => 'role.master.name_solo',
            'description' => 'role.master.description',
            'secret_role' => false,
            'automates_members' => true,
            'type' => 'master',
            'permissions' => [
                'use.control' => 0,
            ],
        ],
        'reader' => [
            'name_group' => 'role.reader.name_group',
            'name_solo' => 'role.reader.name_solo',
            'description' => 'role.reader.description',
            'secret_role' => false,
            'automates_members' => true,
            'type' => 'reader',
            'permissions' => [
                'use.control' => 0,
            ],
        ],
        'guest' => [
            'name_group' => 'role.guest.name_group',
            'name_solo' => 'role.guest.name_solo',
            'description' => 'role.guest.description',
            'secret_role' => false,
            'automates_members' => false,
            'type' => 'guest',
            'permissions' => [
                'use.control' => -1,
            ],
        ],
        'stranger' => [
            'name_group' => 'role.stranger.name_group',
            'name_solo' => 'role.stranger.name_solo',
            'description' => 'role.stranger.description',
            'secret_role' => false,
            'automates_members' => false,
            'type' => 'stranger',
            'permissions' => [
                'use.control' => -1,
            ],
        ],
        'bot' => [
            'name_group' => 'role.bot.name_group',
            'name_solo' => 'role.bot.name_solo',
            'description' => 'role.bot.description',
            'secret_role' => false,
            'automates_members' => false,
            'type' => 'bot',
            'permissions' => [
                'use.control' => -1,
            ],
        ],
    ],
];