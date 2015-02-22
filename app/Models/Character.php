<?php namespace Rpgo\Models;

class Character extends Eloquent {

	public $increments = false;

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['slug'] = str_slug($name);
    }

}
