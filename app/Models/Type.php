<?php namespace Rpgo\Models;

class Type extends Eloquent {

	public $incrementing = false;

    public function roles()
    {
        return $this->hasMany(Role::class);
    }

    public static function point($pointer)
    {
        if(is_array($pointer))
            return self::whereIn('pointer', $pointer)->get();
        return self::where('pointer', $pointer)->first();
    }

}
