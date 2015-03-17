<?php namespace Rpgo\Http\Parameters;

class CharacterParameter {

    public function bind($slug)
    {
        return \Rpgo\Models\Character::where('slug', $slug)->firstOrFail();
    }

}