<?php namespace Rpgo\Models;

use Illuminate\Database\Query\Builder;

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

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['slug'] = str_slug($name);
    }

    /**
     * @param Builder $query
     * @param $world
     * @param $slug
     * @return mixed
     */
    public function scopeOfWorldAndWithSlug($query, $world, $slug)
    {
        return $query->whereHas('worlds', function($query) use ($world) {
            return $query->where('id', $world->id);
        })->where('slug', $slug);
    }

    public function parent()
    {
        return $this->supralocations()->wherePivot('depth', 1)->first();
    }

    public function children()
    {
        return $this->sublocations()->wherePivot('depth', 1)->get();
    }

    public function path()
    {
        if( ! $this->parent())
            return [$this->slug];

        return array_merge($this->parent()->path(), [$this->slug]);
    }

    public function getRouteKey()
    {
        return join('/',$this->path());
    }

}
