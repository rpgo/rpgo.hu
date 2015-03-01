<?php namespace Rpgo\Http\Parameters;

class RoleParameter {

    public function bind($slug)
    {
        return \Rpgo\Models\Role::where('slug', $slug)->firstOrFail();
    }

}