<?php namespace Rpgo\Http\Parameters;

class MemberParameter {

    public function bind($slug)
    {
        return \Rpgo\Models\Member::where('slug', $slug)->firstOrFail();
    }

}