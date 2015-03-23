<?php namespace Rpgo\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as Query;

class World extends Eloquent {

	public $incrementing = false;

    protected $fillable = ['name', 'brand', 'slug'];

    protected $appends = ['member_count', 'public_types', 'online_member_count', 'character_count', 'online_character_count', 'link'];

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

    public function roles()
    {
        return $this->hasMany(Role::class)->orderBy('rank');
    }

    public function types()
    {
        return $this->belongsToMany(Type::class, 'roles', 'world_id', 'type_id')->groupBy('type_id');
    }

    public function publish()
    {
        $this->published_at = Carbon::now();

        return $this;
    }

    public function getMemberCountAttribute()
    {
        return $this->members()->count();
    }

    public function getOnlineMemberCountAttribute()
    {
        return $this->members()->online()->count();
    }

    public function getCharacterCountAttribute()
    {
        return $this->characters()->count();
    }

    public function getOnlineCharacterCountAttribute()
    {
        return $this->characters()->online()->count();
    }

    public function getPublicTypesAttribute()
    {
        $publics = $this->types()->whereIn('pointer', ['player', 'staff', 'master', 'reader', 'support'])->get();

        $types = [];

        foreach($publics as $public)
        {
            $types[$public['pointer']] = [
                'name' => $public['name'],
                'count' => $this->members()->ofType($public)->count(),
            ];
        }

        return $types;
    }

    public function characters()
    {
        return $this->hasManyThrough(Character::class, Member::class, 'world_id', 'creator_id');
    }

    public function getLinkAttribute()
    {
        return $this['slug'] . '.' . getenv('APP_DOMAIN');
    }

    public function settings()
    {
        return $this->hasOne(Settings::class);
    }

    public function choices()
    {
        return $this->belongsToMany(Choice::class, 'world_choices');
    }

}
