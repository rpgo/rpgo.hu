<?php namespace Rpgo\Models;

class Location extends Eloquent {

	public $incrementing = false;

    protected $fillable = ['name', 'slug'];

    public function worlds()
    {
        return $this->belongsToMany(World::class, 'locations_worlds', 'location_id', 'world_id');
    }

    public function supralocations()
    {
        return $this->belongsToMany(self::class, 'location_hierarchy', 'descendant_id', 'ancestor_id')
            ->withPivot('depth');
    }

    public function sublocations()
    {
        return $this->belongsToMany(self::class, 'location_hierarchy', 'ancestor_id', 'descendant_id')
            ->withPivot('depth');
    }

}
