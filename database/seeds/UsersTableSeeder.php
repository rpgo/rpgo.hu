<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Rpgo\Models\User;

class UsersTableSeeder extends Seeder {

    /**
     * Seed the database with the support user.
     */
    public function run()
    {
        User::create([
            'name' => 'LNR',
            'email' => 'lnr@rpgo.hu',
            'password' => Hash::make('rpgo'),
        ]);
    }

}