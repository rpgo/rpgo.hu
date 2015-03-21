<?php namespace Rpgo\Models;

use Illuminate\Database\Eloquent\Builder as Query;

class Member extends Eloquent {

    use ReportsActivities;

    public $incrementing = false;

    protected $fillable = ['name'];

    protected $casts = ['status' => 'boolean'];

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

    public function roles()
    {
        return $this->belongsToMany(Role::class,'members_roles');
    }

    public function scopeOfType($query, $type)
    {
        return $query->whereHas('roles', function($query) use($type) {return $query->where('type_id', $type->id);});
    }

    public function can(Permission $permission)
    {
        $veto = $this->roles()->whereHas('permissions', function($query) use ($permission)
        {
            return $query->where('grant', -1)->where('id', $permission->id);
        })->count();

        if($veto)
            return false;

        return (bool) $this->roles()->whereHas('permissions', function($query) use ($permission)
        {
            return $query->where('grant', 1)->where('id', $permission->id);
        })->count();
    }

    public function created_characters()
    {
        return $this->hasMany(Character::class, 'creator_id');
    }

    public function owned_characters()
    {
        return $this->morphToMany(Character::class, 'owner', 'character_owners');
    }

    public function occupied_characters()
    {
        return $this->morphToMany(Character::class, 'tenant', 'character_occupants');
    }

    public function scopeOnline($query)
    {
        return $query->where('status', true);
    }

}
