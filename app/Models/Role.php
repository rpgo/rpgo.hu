<?php namespace Rpgo\Models;

class Role extends Eloquent {

	public $incrementing = false;

    protected $fillable = ['name_group', 'name_solo', 'description', 'secret'];

    protected $appends = ['member_count', 'custom'];

    public function members()
    {
        return $this->belongsToMany(Member::class,'members_roles');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'roles_permissions')->withPivot('grant');
    }

    public function world()
    {
        return $this->belongsTo(World::class);
    }

    public function setNameGroupAttribute($name)
    {
        $this->attributes['name_group'] = $name;
        $this->attributes['slug'] = str_slug($name);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function scopeOfType($query, $type)
    {
        return $query->where('type_id', $type->id);
    }

    public function scopeOfWorld($query, $world)
    {
        return $query->where('world_id', $world->id);
    }

    public function scopeOfWorldAndType($query, $world, $type)
    {
        return $query->ofWorld($world)->ofType($type);
    }

    public function can($permission)
    {
        $permission = $this->permissions()->wherePivot('grant', 1)->where('id', $permission->id)->first();

        return (bool) $permission;
    }

    public function getMemberCountAttribute()
    {
        return $this->members()->count();
    }

    public function getCustomAttribute()
    {
        return ! $this->attributes['type_id'];
    }

}
