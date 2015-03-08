<?php

return [
    'seed' => [
        'support' => [
            'name_group' => 'role.support.name_group',
            'name_solo' => 'role.support.name_solo',
            'description' => 'role.support.description',
            'rank' => 3,
            'secret_role' => false,
            'membership' => 0,
            'type' => 'support',
            'permissions' => [
                'use.control' => 1,
            ],
        ],
        'admin' => [
            'name_group' => 'role.admin.name_group',
            'name_solo' => 'role.admin.name_solo',
            'description' => 'role.admin.description',
            'rank' => 1,
            'secret_role' => false,
            'membership' => 0,
            'type' => 'staff',
            'permissions' => [
                'use.control' => 1,
            ],
        ],
        'mod' => [
            'name_group' => 'role.mod.name_group',
            'name_solo' => 'role.mod.name_solo',
            'description' => 'role.mod.description',
            'rank' => 2,
            'secret_role' => false,
            'membership' => 0,
            'type' => 'staff',
            'permissions' => [
                'use.control' => 0,
            ],
        ],
        'member' => [
            'name_group' => 'role.member.name_group',
            'name_solo' => 'role.member.name_solo',
            'description' => 'role.member.description',
            'rank' => 7,
            'secret_role' => false,
            'membership' => 1,
            'type' => 'member',
            'permissions' => [
                'use.control' => 0,
            ],
        ],
        'player' => [
            'name_group' => 'role.player.name_group',
            'name_solo' => 'role.player.name_solo',
            'description' => 'role.player.description',
            'rank' => 5,
            'secret_role' => false,
            'membership' => 1,
            'type' => 'player',
            'permissions' => [
                'use.control' => 0,
            ],
        ],
        'master' => [
            'name_group' => 'role.master.name_group',
            'name_solo' => 'role.master.name_solo',
            'description' => 'role.master.description',
            'rank' => 4,
            'secret_role' => false,
            'membership' => 1,
            'type' => 'master',
            'permissions' => [
                'use.control' => 0,
            ],
        ],
        'reader' => [
            'name_group' => 'role.reader.name_group',
            'name_solo' => 'role.reader.name_solo',
            'description' => 'role.reader.description',
            'rank' => 6,
            'secret_role' => false,
            'membership' => 1,
            'type' => 'reader',
            'permissions' => [
                'use.control' => 0,
            ],
        ],
        'guest' => [
            'name_group' => 'role.guest.name_group',
            'name_solo' => 'role.guest.name_solo',
            'description' => 'role.guest.description',
            'rank' => 8,
            'secret_role' => false,
            'membership' => -1,
            'type' => 'guest',
            'permissions' => [
                'use.control' => -1,
            ],
        ],
        'stranger' => [
            'name_group' => 'role.stranger.name_group',
            'name_solo' => 'role.stranger.name_solo',
            'description' => 'role.stranger.description',
            'rank' => 9,
            'secret_role' => false,
            'membership' => -1,
            'type' => 'stranger',
            'permissions' => [
                'use.control' => -1,
            ],
        ],
        'bot' => [
            'name_group' => 'role.bot.name_group',
            'name_solo' => 'role.bot.name_solo',
            'description' => 'role.bot.description',
            'rank' => 10,
            'secret_role' => false,
            'membership' => -1,
            'type' => 'bot',
            'permissions' => [
                'use.control' => -1,
            ],
        ],
    ],
];