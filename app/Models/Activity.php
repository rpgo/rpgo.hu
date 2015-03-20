<?php namespace Rpgo\Models;

class Activity extends Eloquent {

    public $incrementing = false;

	public function actor()
    {
        return $this->morphTo();
    }

    public function subject()
    {
        return $this->morphTo();
    }

}
