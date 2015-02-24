<?php namespace Rpgo\Models;

class Type extends Eloquent {

    public $incrementing = false;

    public function users()
    {
        $this->belongsToMany(User::class,'users_types');
    }

    public function permissions()
    {
        $this->belongsToMany(Permission::class,'users_permissions');
    }

}
