<?php namespace Rpgo\Models;

class Post extends Eloquent {

	public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function character()
    {
        return $this->belongsTo(Character::class);
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function post()
    {
        return $this->belongsTo(self::class);
    }

    public function posts()
    {
        return $this->hasMany(self::class);
    }

}
