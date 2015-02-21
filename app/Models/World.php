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

}
