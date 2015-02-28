<?php

use Illuminate\Database\Seeder;
use Rhumsaa\Uuid\Uuid;
use Rpgo\Models\Type;

class PermissionsTableSeeder extends Seeder {

    public function run()
    {
        \Rpgo\Models\Permission::insert([
            [
                'id' => Uuid::uuid4(),
                'key' => 'world.access',
                'name' => 'World Access',
                'description' => 'Can access the World',
            ],
            [
                'id' => Uuid::uuid4(),
                'key' => 'control.access',
                'name' => 'Control Panel Access',
                'description' => 'Can access the Control Panel',
            ],
        ]);

        $permissions = \Rpgo\Models\Permission::all();

        $types = Type::nonSecret()->get();

        foreach($types as $type)
        {
            $type->permissions()->attach($permissions->lists('id'), ['grant' => 1]);
        }
    }

}