<?php namespace Rpgo\Models;

class Role extends Eloquent {

	public $incrementing = false;

    protected $fillable = ['name_group', 'name_solo', 'description', 'secret'];

    public function members()
    {
        return $this->belongsToMany(Member::class,'members_roles');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'roles_permissions');
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

}
