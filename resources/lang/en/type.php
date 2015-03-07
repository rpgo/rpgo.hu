<?php

return [
    'staff' => [
        'name' => 'Staff',
        'explanation' => 'If the members of the group are all members of the staff as well.'
    ],
    'custom' => [
        'name' => 'Custom',
        'explanation' => 'If the group does not fit in any other type.'
    ],
    'player' => [
        'name' => 'Player',
        'explanation' => 'If the members of the group are all players. Possible to automate membership to all members owning a player character.',
    ],
    'master' => [
        'name' => 'Game Master',
        'explanation' => 'If the members of the group are all game masters. Possible to automate membership to all members owning a game master character.'
    ],
    'support' => [
        'name' => 'Support',
        'explanation' => 'If the members of the group are not here to play but for something else.'
    ],
    'reader' => [
        'name' => 'Reader',
        'explanation' => 'If none of the members of the group started the game, but they intend to. Possible to automate membership to all members not owning a character.',
    ],
    'guest' => [
        'name' => 'Guest',
        'explanation' => 'Not a member group. Use this for setting the permissions of the non-member but registered users.',
    ],
    'stranger' => [
        'name' => 'Stranger',
        'explanation' => 'Not a member group. Use this for setting the permissions of the non-registered users.',
    ],
    'bot' => [
        'name' => 'Bot',
        'explanation' => 'Not a member group. Use this for setting the permissions of the search spiders of the web.',
    ],
];