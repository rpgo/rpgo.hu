<?php namespace Rpgo\Models;

class Permission extends Eloquent {

    public $incrementing = false;

    public function roles()
    {
        return $this->belongsToMany(Role::class,'roles_permissions');
    }

    public function types()
    {
        return $this->belongsToMany(Type::class, 'types_permissions');
    }

}
