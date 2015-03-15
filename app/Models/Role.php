<?php namespace Rpgo\Models;

class Role extends Eloquent {

	public $incrementing = false;

    protected $fillable = ['name_group', 'name_solo', 'description', 'rank', 'secret_role', 'membership'];

    protected $appends = ['member_count'];

    protected $casts = ['secret_role' => 'boolean'];

    public function members()
    {
        return $this->belongsToMany(Member::class,'members_roles')->orderBy('name');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'roles_permissions')->withPivot('grant');
    }

    public function world()
    {
        return $this->belongsTo(World::class);
    }

    public function setNameSoloAttribute($name)
    {
        $this->attributes['name_solo'] = $name;
        $this->attributes['slug'] = str_slug($name);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function scopeOfType($query, $type)
    {
        return $query->where('type_id', $type['id']);
    }

    public function scopeOfWorld($query, $world)
    {
        return $query->where('world_id', $world['id']);
    }

    public function scopeOfWorldAndType($query, $world, $type)
    {
        return $query->ofWorld($world)->ofType($type);
    }

    public function can($permission)
    {
        $permission = $this->permissions()->wherePivot('grant', 1)->where('id', $permission['id'])->first();

        return (bool) $permission;
    }

    public function getMemberCountAttribute()
    {
        return $this->members()->count();
    }

    public static function templates()
    {
        return self::with('type','permissions')->has('world', 0)->orderBy('name_solo', 'asc')->get();
    }

    public function owned_characters()
    {
        return $this->morphToMany(Character::class, 'owner', 'character_owners');
    }

    public function occupied_characters()
    {
        return $this->morphToMany(Character::class, 'tenant', 'character_tenants');
    }

}
