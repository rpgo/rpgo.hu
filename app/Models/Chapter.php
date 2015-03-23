<?php namespace Rpgo\Models;

class Chapter extends Eloquent {

    public $incrementing = false;

    protected $fillable = ['title'];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    public function world()
    {
        return $this->belongsTo(World::class);
    }

}
