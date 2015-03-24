<?php namespace Rpgo\Models;

class Partition extends Eloquent {

	public $incrementing = false;

	protected $fillable = ['name', 'limit', 'rank'];

	public function setNameAttribute($name)
	{
		$this->attributes['name'] = $name;
		$this->attributes['slug'] = str_slug($name);
	}

	public function world()
	{
		return $this->belongsTo(World::class);
	}

	public function communities()
	{
		return $this->hasMany(Community::class);
	}

}
