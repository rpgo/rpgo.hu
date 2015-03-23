<?php namespace Rpgo\Models;

class Choice extends Eloquent {

	public $incrementing = false;

	protected $fillable = ['title', 'request_limit', 'participation_limit'];

	public function setTitleAttribute($value)
	{
		$this->attributes['title'] = $value;
		$this->attributes['slug'] = str_slug($value);
	}

	public function worlds()
	{
		return $this->belongsToMany(World::class, 'world_choices');
	}

	public function games()
	{
		return $this->hasMany(Game::class);
	}

}
