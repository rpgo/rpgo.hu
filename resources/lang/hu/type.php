<?php

return [
    'staff' => [
        'explanation' => 'Ha a csoport tagjai mind stafftagok.'
    ],
    'custom' => [
        'explanation' => 'Ha a csoport nem felel meg egyik másik típusnak sem.'
    ],
    'player' => [
        'explanation' => 'Ha a csoport tagjai mind játékosok. Lehetővé teszi, hogy minden tag automatikusan csoporttaggá váljon, amikor készít játékos karaktert.',
    ],
    'master' => [
        'explanation' => 'Ha a csoport tagjai mind mesélők. Lehetővé teszi, hogy minden tag automatikusan csoporttaggá váljon, amikor készít mesélő karaktert.'
    ],
    'support' => [
        'explanation' => 'Ha a csoport tagjai mind nem a játék, hanem valami más céljából csatlakoztak a világhoz.'
    ],
    'reader' => [
        'explanation' => 'Ha a csoport tagjai mind nem kezdték még el a játékot, de valószínűleg tervezik. Lehetővé teszi, hogy minden tag automatikusan csoporttaggá váljon, aki nem készített még mesélő vagy játékos karaktert.',
    ],
    'guest' => [
        'explanation' => 'Nem tag csoport. A nem csatlakozott, de regisztrált látogatók jogosultságainak beállítására használható.',
    ],
    'stranger' => [
        'explanation' => 'Nem tag csoport. A nem regisztrált látogatók jogosultságainak beállítására használható.',
    ],
    'bot' => [
        'explanation' => 'Nem tag csoport. A keresőrobotok jogosultságainak beállítására használható.',
    ],
];