<?php namespace Rpgo\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model {

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function world()
    {
        return $this->belongsTo(World::class);
    }

}
