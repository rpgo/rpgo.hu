<?php namespace Rpgo\Http\Parameters;

class WorldParameter {

    public function bind($slug)
    {
        return \Rpgo\Models\World::where('slug', $slug)->firstOrFail();
    }

}