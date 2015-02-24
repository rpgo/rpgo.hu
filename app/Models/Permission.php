<?php namespace Rpgo\Models;

class Permission extends Eloquent {

    public $incrementing = false;

    public function roles()
    {
        $this->belongsToMany(Role::class,'roles_permissions');
    }

}
