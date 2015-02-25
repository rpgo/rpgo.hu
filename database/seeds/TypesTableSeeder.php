<?php

use Illuminate\Database\Seeder;
use Rpgo\Models\Type;

class TypesTableSeeder extends Seeder {

    public function run()
    {
        foreach(config('roles.common') as $key => $secret)
        {
            Type::create(array_merge(
                trans('role.common.' . $key),
                ['label' => $key, 'secret' => $secret]
            ));
        }
    }

}