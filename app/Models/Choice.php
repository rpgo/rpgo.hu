<?php namespace Rpgo\Models;

class Choice extends Eloquent {

	public $incrementing = false;

	public function world()
	{
		return $this->belongsTo(World::class);
	}

	public function games()
	{
		return $this->hasMany(Game::class);
	}

}
