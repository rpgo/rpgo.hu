<?php namespace Rpgo\Models;

class Type extends Eloquent {

	public $incrementing = false;

    protected function setNameGroupAttribute($name)
    {
        $this->attributes['name_group'] = $name;
        $this->attributes['slug'] = str_slug($name);
    }

    public function roles()
    {
        return $this->hasMany(Role::class);
    }

    public function scopeNonSecret($query)
    {
        return $query->where('secret', 0);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'types_permissions');
    }

}
