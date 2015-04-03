<?php namespace Rpgo\Models;

class Face extends Eloquent {

	public $incrementing = false;

	public function character()
	{
		return $this->belongsTo(Character::class);
	}

	public function avatar()
	{
		return $this->belongsTo(Avatar::class);
	}

}
