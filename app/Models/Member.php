<?php namespace Rpgo\Models;

class Member extends Eloquent {

    public $incrementing = false;

    protected $fillable = ['name'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function world()
    {
        return $this->belongsTo(World::class);
    }

}
