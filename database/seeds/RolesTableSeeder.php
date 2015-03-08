<?php

use Illuminate\Database\Seeder;
use Rpgo\Models\Permission;
use Rpgo\Models\Role;
use Rpgo\Models\Type;

class RolesTableSeeder extends Seeder {

    public function run()
    {
        foreach(config('role.seed') as $pointer => $role)
        {
            $permissions = $role['permissions'];
            $type = Type::point($role['type']);
            $role = new Role ($this->getRole($role));
            $role->type()->associate($type);
            $role->save();

            foreach($permissions as $permission => $grant)
            {
                $permission = Permission::point($permission);
                $role->permissions()->attach([$permission['id'] => ['grant' => $grant]]);
            }
        }
    }

    private function getRole($role)
    {
        return [
            'name_group' => trans($role['name_group']),
            'name_solo' => trans($role['name_solo']),
            'description' => trans($role['description']),
            'rank' => $role['rank'],
            'secret_role' => $role['secret_role'],
            'automates_members' => $role['automates_members'],
        ];
    }

}