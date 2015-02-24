<?php namespace Rpgo\Models;

class Role extends Eloquent {

	public $incrementing = false;

    protected $fillable = ['name_group', 'name_solo', 'description', 'secret'];

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

    public function setNameGroupAttribute($name)
    {
        $this->attributes['name_plural'] = $name;
        $this->attributes['slug'] = str_slug($name);
    }

}
