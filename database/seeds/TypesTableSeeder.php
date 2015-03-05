<?php

use Illuminate\Database\Seeder;
use Rpgo\Models\Type;

class TypesTableSeeder extends Seeder {

    public function run()
    {
        foreach(config('type.seed') as $pointer => $type)
        {
            Type::create($this->getType($type));
        }
    }

    private function getType($type)
    {
        return [
            'pointer' => $type['pointer'],
            'automates_members' => $type['automates_members'],
            'no_members' => $type['no_members'],
            'explanation' => trans($type['explanation']),
        ];
    }

}