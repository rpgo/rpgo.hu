<?php namespace Rpgo\Models;

class Activity extends Eloquent {

    public $incrementing = false;

    protected $fillable = ['subject_id', 'subject_type', 'type', 'actor_id', 'actor_type'];

	public function actor()
    {
        return $this->morphTo();
    }

    public function subject()
    {
        return $this->morphTo();
    }

}
