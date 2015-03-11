<?php namespace Rpgo\Models;

class Character extends Eloquent {

    protected $table = 'characters';

	public $increments = false;

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['slug'] = str_slug($name);
    }

    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }

}
