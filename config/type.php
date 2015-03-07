<?php

return [
    'seed' => [
        'support' => [
            'name' => 'type.support.name',
            'pointer' => 'support',
            'automates_members' => false,
            'no_members' => false,
            'explanation' => 'type.support.explanation',
        ],
        'staff' => [
            'name' => 'type.staff.name',
            'pointer' => 'staff',
            'automates_members' => false,
            'no_members' => false,
            'explanation' => 'type.staff.explanation',
        ],
        'member' => [
            'name' => 'type.member.name',
            'pointer' => 'member',
            'automates_members' => true,
            'no_members' => false,
            'explanation' => 'type.member.explanation',
        ],
        'player' => [
            'name' => 'type.player.name',
            'pointer' => 'player',
            'automates_members' => true,
            'no_members' => false,
            'explanation' => 'type.player.explanation'
        ],
        'master' => [
            'name' => 'type.master.name',
            'pointer' => 'master',
            'automates_members' => true,
            'no_members' => false,
            'explanation' => 'type.master.explanation',
        ],
        'reader' => [
            'name' => 'type.reader.name',
            'pointer' => 'reader',
            'automates_members' => true,
            'no_members' => false,
            'explanation' => 'type.reader.explanation',
        ],
        'guest' => [
            'name' => 'type.guest.name',
            'pointer' => 'guest',
            'automates_members' => false,
            'no_members' => true,
            'explanation' => 'type.guest.explanation',
        ],
        'stranger' => [
            'name' => 'type.stranger.name',
            'pointer' => 'stranger',
            'automates_members' => false,
            'no_members' => true,
            'explanation' => 'type.stranger.explanation',
        ],
        'bot' => [
            'name' => 'type.bot.name',
            'pointer' => 'bot',
            'automates_members' => false,
            'no_members' => true,
            'explanation' => 'type.bot.explanation',
        ],
        'custom' => [
            'name' => 'type.custom.name',
            'pointer' => 'custom',
            'automates_members' => false,
            'no_members' => false,
            'explanation' => 'type.custom.explanation',
        ],
    ],
];