<?php namespace Rpgo\Models;

use Illuminate\Database\Eloquent\Builder as Query;

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

    public function scopeOfWorld(Query $query, World $world)
    {
        return $query->where('world_id', $world->id);
    }

    public function scopeOfWorldAndUser(Query $query, World $world, User $user)
    {
        return $query->where(['world_id' => $world->id,'user_id' => $user->id]);
    }

    public function createdLocations()
    {
        return $this->hasMany(Location::class, 'creator_id');
    }

}
