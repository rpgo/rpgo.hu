<?php

return [
    'type' => [
        'player'        => 'PC',
        'master'        => 'MC',
        'unknown'       => '?',
    ],
    'form' => [
        'name'          => 'Name',
        'avatar'        => 'Avatar',
    ],
    'index' => [
        'menu'          => 'Characters',
    ],
    'create' => [
        'menu'          => 'Create new',
        'title'         => 'Character Creation',
        'header'        => 'Character Creation',
        'preview' => [
            'title'     => 'Preview',
            'johndoe'   => 'John Doe',
        ],
        'type' => [
            'title'     => 'Choose type',
            'info'      => 'Before anything else, you have to tell me which type of character are we creating.',
            'player'    => 'Player Character',
            'master'    => 'Master Character',
        ],
        'name' => [
            'title'     => 'Choose name',
            'info'      => 'Name your character now.',
            'submit'    => 'Next',
        ],
        'communities' => [
            'title'     => 'Communities',
            'info'      => 'Choose your communities.',
            'submit'    => 'Next',
        ],
        'avatar' => [
            'title'     => 'Avatar',
            'info'      => 'Upload an avatar.',
            'submit'    => 'Upload',
        ],
        'confirm' => [
            'title'     => 'Confirm',
            'info'      => 'If you like what you created, click confirm to create the character',
            'submit'    => 'Confirm',
        ],
    ],
    'show' => [
        'master'        => 'GM',
        'player'        => 'PC',
        'creator'       => 'Alkotó',
        'operators'     => 'Operator|Operators',
        'owners'        => 'Owner|Owners',
    ],
];