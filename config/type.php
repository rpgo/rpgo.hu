<?php

return [
    'seed' => [
        'support' => [
            'pointer' => 'support',
            'automates_members' => false,
            'no_members' => false,
            'explanation' => 'type.support.explanation',
        ],
        'staff' => [
            'pointer' => 'staff',
            'automates_members' => false,
            'no_members' => false,
            'explanation' => 'type.staff.explanation',
        ],
        'player' => [
            'pointer' => 'player',
            'automates_members' => true,
            'no_members' => false,
            'explanation' => 'type.player.explanation'
        ],
        'master' => [
            'pointer' => 'master',
            'automates_members' => true,
            'no_members' => false,
            'explanation' => 'type.master.explanation',
        ],
        'reader' => [
            'pointer' => 'reader',
            'automates_members' => true,
            'no_members' => false,
            'explanation' => 'type.reader.explanation',
        ],
        'guest' => [
            'pointer' => 'guest',
            'automates_members' => false,
            'no_members' => true,
            'explanation' => 'type.guest.explanation',
        ],
        'stranger' => [
            'pointer' => 'stranger',
            'automates_members' => false,
            'no_members' => true,
            'explanation' => 'type.stranger.explanation',
        ],
        'bot' => [
            'pointer' => 'bot',
            'automates_members' => false,
            'no_members' => true,
            'explanation' => 'type.bot.explanation',
        ],
        'custom' => [
            'pointer' => 'custom',
            'automates_members' => false,
            'no_members' => false,
            'explanation' => 'type.custom.explanation',
        ],
    ],
];