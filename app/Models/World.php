<?php namespace Rpgo\Models;

class World extends Eloquent {

	public $incrementing = false;

    protected $fillable = ['name', 'brand', 'slug'];

    public function getRouteKey()
    {
        return $this->slug;
    }

}
