<?php namespace Rpgo\Models;

class Character extends Eloquent {

    protected $table = 'characters';

	public $incrementing = false;

    protected $fillable = ['name'];

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['slug'] = str_slug($name);
    }

    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function creator()
    {
        return $this->belongsTo(Member::class, 'creator_id');
    }

    public function world()
    {
        return $this->creator->world();
    }

    public function characterization()
    {
        return $this->morphTo();
    }

    public function owner_members()
    {
        return $this->morphedByMany(Member::class, 'owner', 'character_owners');
    }

    public function owner_roles()
    {
        return $this->morphedByMany(Role::class, 'owner', 'character_owners');
    }

    public function occupant_members()
    {
        return $this->morphedByMany(Member::class, 'tenant', 'character_occupants');
    }

    public function occupant_roles()
    {
        return $this->morphedByMany(Role::class, 'tenant', 'character_occupants');
    }

    public function scopeOnline($query)
    {
        return $query->whereHas('occupant_members', function($query){
            return $query->where('status', true);
        })->where('status', true);
    }

}
