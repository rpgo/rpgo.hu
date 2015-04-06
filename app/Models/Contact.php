<?php namespace Rpgo\Models;

class Contact extends Eloquent {

	public $incrementing = false;

	public function object()
	{
		return $this->belongsTo(Character::class, 'object_id');
	}

	public function subject()
	{
		return $this->belongsTo(Character::class, 'subject_id');
	}

	public function relationship()
	{
		return $this->belongsTo(Relationship::class);
	}

}
