<?php

$factory('Rpgo\Models\User', [
    'name' => $faker->name,
    'email' => $faker->email,
    'password' => $faker->word,
]);