<?php

return [
    'staff' => [
        'name' => 'Staff',
        'explanation' => 'Ha a csoport tagjai mind stafftagok.'
    ],
    'custom' => [
        'name' => 'Egyéb',
        'explanation' => 'Ha a csoport nem felel meg egyik másik típusnak sem.'
    ],
    'player' => [
        'name' => 'Játékos',
        'explanation' => 'Ha a csoport tagjai mind játékosok. Lehetővé teszi, hogy minden tag automatikusan csoporttaggá váljon, amikor készít játékos karaktert.',
    ],
    'master' => [
        'name' => 'Mesélő',
        'explanation' => 'Ha a csoport tagjai mind mesélők. Lehetővé teszi, hogy minden tag automatikusan csoporttaggá váljon, amikor készít mesélő karaktert.'
    ],
    'support' => [
        'name' => 'Amatőr',
        'explanation' => 'Ha a csoport tagjai mind nem a játék, hanem valami más céljából csatlakoztak a világhoz.'
    ],
    'member' => [
        'name' => 'Tag',
        'explanation' => 'Ha a csoportba minden tag beletartozik. Lehetővé teszi, hogy minden tag automatikusan csoporttaggá váljon.'
    ],
    'reader' => [
        'name' => 'Olvasó',
        'explanation' => 'Ha a csoport tagjai mind nem kezdték még el a játékot, de valószínűleg tervezik. Lehetővé teszi, hogy minden tag automatikusan csoporttaggá váljon, aki nem készített még mesélő vagy játékos karaktert.',
    ],
    'guest' => [
        'name' => 'Vendég',
        'explanation' => 'Nem tag csoport. A nem csatlakozott, de regisztrált látogatók jogosultságainak beállítására használható.',
    ],
    'stranger' => [
        'name' => 'Idegen',
        'explanation' => 'Nem tag csoport. A nem regisztrált látogatók jogosultságainak beállítására használható.',
    ],
    'bot' => [
        'name' => 'Bot',
        'explanation' => 'Nem tag csoport. A keresőrobotok jogosultságainak beállítására használható.',
    ],
];