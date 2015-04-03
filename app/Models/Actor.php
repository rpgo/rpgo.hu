<?php namespace Rpgo\Models;

class Actor extends Eloquent {

	public $incrementing = false;

	public function avatars()
	{
		return $this->hasMany(Avatar::class);
	}

}
