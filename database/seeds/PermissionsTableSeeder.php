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
                'key' => 'use.control',
                'name' => trans('permission.use.control.name'),
                'description' => trans('permission.use.control.description'),
            ],
        ]);

        $permissions = \Rpgo\Models\Permission::all();

        $types = Type::all();

        foreach($types as $type)
        {
            $type->permissions()->attach($permissions->lists('id'), ['grant' => 1]);
        }
    }

}