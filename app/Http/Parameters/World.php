<?php namespace Rpgo\Http\Parameters;

class World {

    public function bind($slug)
    {
        return \Rpgo\Models\World::where('slug', $slug)->firstOrFail();
    }

}