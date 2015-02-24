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
        $this->hasMany(Role::class);
    }

}
