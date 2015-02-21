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

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['slug'] = str_slug($name);
    }

    public function scopeOfWorld($query, World $world)
    {
        return $query->where('world_id', $world->id);
    }

}
