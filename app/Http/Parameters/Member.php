<?php namespace Rpgo\Http\Parameters;

class Member {

    public function bind($slug)
    {
        return \Rpgo\Models\Member::where('slug', $slug)->firstOrFail();
    }

}