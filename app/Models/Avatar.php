<?php namespace Rpgo\Models;

class Avatar extends Eloquent {

    public $incrementing = false;

    protected $dates = ['accepted_on'];

    protected $fillable = ['extension'];

    public function world()
    {
        return $this->uploader->world();
    }

    public function uploader()
    {
        return $this->belongsTo(Member::class, 'uploader_id');
    }

    public function creator()
    {
        return $this->belongsTo(Member::class, 'creator_id');
    }

    public function actor()
    {
        return $this->belongsTo(Actor::class);
    }

    public function faces()
    {
        return $this->hasMany(Face::class);
    }

    public function characters()
    {
        return $this->belongsToMany(Character::class, 'faces');
    }

}
