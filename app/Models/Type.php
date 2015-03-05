<?php namespace Rpgo\Models;

class Type extends Eloquent {

	public $incrementing = false;

    protected function setNameGroupAttribute($name)
    {
        $this->attributes['name_group'] = $name;
        $this->attributes['slug'] = str_slug($name);
    }

    public function roles()
    {
        return $this->hasMany(Role::class);
    }

    public function scopeNonSecret($query)
    {
        return $query->where('secret', 0);
    }

    public static function point($pointer)
    {
        if(is_array($pointer))
            return self::whereIn('pointer', $pointer)->get();
        return self::where('pointer', $pointer)->first();
    }

}
