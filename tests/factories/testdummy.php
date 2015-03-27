<?php


$factory('Rpgo\Models\User', [
    'name' => $faker->name,
    'email' => $faker->email,
    'password' => \Hash::make('rpgotest'),
]);


$factory('Rpgo\Models\World', [
    'name' => $faker->name,
    'brand' => $faker->word,
    'slug' => $faker->slug,
    'creator_id' => 'factory:Rpgo\Models\User',
]);