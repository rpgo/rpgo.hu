<?php

return [
    /**
     * The common roles for every new world.
     */
    'common' => [
        'support' => true,
        'staff' => false,
        'admin' => true,
        'player' => false, //can automate members
        'master' => false, //can automate members
        'reader' => false, //can automate members
        'guest' => true, //no member
        'stranger' => true, //no member
        'bot' => true, //no member
    ],
];