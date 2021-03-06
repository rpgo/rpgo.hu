<?php namespace Rpgo\Models;

class Character extends Eloquent implements ActivityRecorder, ActivityReporter {

    use RecordsActivities, ReportsActivities;

    protected $table = 'characters';

	public $incrementing = false;

    protected $fillable = ['name'];

    public $appends = ['type', 'avatar'];

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
            return $query->online();
        })->where('characters.status', true);
    }

    public function getTypeAttribute()
    {
        if($this['characterization_type'] == CharacterScope::MASTER)
            return 'master';

        return 'player';
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function communities()
    {
        return $this->belongsToMany(Community::class, 'character_communities');
    }

    public function participations()
    {
        return $this->hasMany(Participation::class);
    }

    public function active_games()
    {
        return $this->belongsToMany(Game::class, 'participations')->wherePivot('status', Participation::ACTIVE);
    }

    public function faces()
    {
        return $this->hasMany(Face::class);
    }

    public function avatars()
    {
        return $this->belongsToMany(Avatar::class, 'faces');
    }

    public function getAvatarAttribute()
    {
        return $this->avatars()->latest()->first();
    }
}
