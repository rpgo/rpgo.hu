<?php namespace Rpgo\Models;

class Community extends Eloquent {

    public $incrementing = false;

    protected $fillable = ['name'];

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['slug'] = str_slug($name);
    }

    public function partition()
    {
        return $this->belongsTo(Partition::class);
    }

    public function starting_game()
    {
        return $this->belongsTo(Game::class, 'starting_game_id');
    }

}
