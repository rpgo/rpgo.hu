<?php namespace Rpgo\Models;


class Settings extends Eloquent {

	public $incrementing = false;

    public function world()
    {
        return $this->belongsTo(World::class);
    }

}
