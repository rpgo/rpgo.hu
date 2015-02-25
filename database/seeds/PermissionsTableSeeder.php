<?php

use Illuminate\Database\Seeder;
use Rpgo\Models\Type;

class PermissionsTableSeeder extends Seeder {

    public function run()
    {
        $permission = \Rpgo\Models\Permission::create([
            'key' => 'view.member.index',
            'name' => 'Member Index',
            'description' => 'Can view member index page',
        ]);

        $types = Type::nonSecret()->get();

        $permission->types()->attach($types->lists('id'), ['grant' => 1]);
    }

}