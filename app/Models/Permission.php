<?php namespace Rpgo\Models;

class Permission extends Eloquent {

    public $incrementing = false;

    public function roles()
    {
        return $this->belongsToMany(Role::class,'roles_permissions');
    }

    public static function point($pointer)
    {
        if(is_array($pointer))
            return self::whereIn('pointer', $pointer)->get();
        return self::where('pointer', $pointer)->first();
    }

}
