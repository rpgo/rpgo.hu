<?php namespace Rpgo\Models;

class Role extends Eloquent {

	public $incrementing = false;

    public function members()
    {
        $this->belongsToMany(Member::class,'members_roles');
    }

    public function permissions()
    {
        $this->belongsToMany(Permission::class,'roles_permissions');
    }

    public function world()
    {
        $this->belongsTo(World::class);
    }

}
