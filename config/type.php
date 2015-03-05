<?php

return [
    'seed' => [
        'support' => [
            'pointer' => 'support',
            'automates_members' => false,
            'no_members' => false,
            'explanation' => 'type.support.explanation',
            'template' => 'support',
        ],
        'staff' => [
            'pointer' => 'staff',
            'automates_members' => false,
            'no_members' => false,
            'explanation' => 'type.staff.explanation',
            'template' => 'staff',
        ],
        'player' => [
            'pointer' => 'player',
            'automates_members' => true,
            'no_members' => false,
            'explanation' => 'type.player.explanation',
            'template' => 'player',
        ],
        'master' => [
            'pointer' => 'master',
            'automates_members' => true,
            'no_members' => false,
            'explanation' => 'type.master.explanation',
            'template' => 'master',
        ],
        'reader' => [
            'pointer' => 'reader',
            'automates_members' => true,
            'no_members' => false,
            'explanation' => 'type.reader.explanation',
            'template' => 'master',
        ],
        'guest' => [
            'pointer' => 'guest',
            'automates_members' => false,
            'no_members' => true,
            'explanation' => 'type.guest.explanation',
            'template' => 'guest',
        ],
        'stranger' => [
            'pointer' => 'stranger',
            'automates_members' => false,
            'no_members' => true,
            'explanation' => 'type.stranger.explanation',
            'template' => 'stranger',
        ],
        'bot' => [
            'pointer' => 'bot',
            'automates_members' => false,
            'no_members' => true,
            'explanation' => 'type.bot.explanation',
            'template' => 'bot',
        ],
        'custom' => [
            'pointer' => 'custom',
            'automates_members' => false,
            'no_members' => false,
            'explanation' => 'type.custom.explanation',
            'template' => 'player',
        ],
    ],
];