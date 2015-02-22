<?php namespace Rpgo\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as Query;

class World extends Eloquent {

	public $incrementing = false;

    protected $fillable = ['name', 'brand', 'slug'];

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function members()
    {
        return $this->hasMany(Member::class);
    }

    public function scopePublished(Query $query)
    {
        return $query->where('published_at', '<=', Carbon::now());
    }

    public function locations()
    {
        return $this->belongsToMany(Location::class, 'locations_worlds', 'world_id', 'location_id');
    }

    public function rootlocation()
    {
        return $this->locations()->has('supralocations', '=', 1)->first();
    }

    public function publish()
    {
        $this->published_at = Carbon::now();

        return $this;
    }

}
