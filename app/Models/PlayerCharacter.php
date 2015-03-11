<?php namespace Rpgo\Models;

class PlayerCharacter extends Character {

    public static function boot()
    {
        static::addGlobalScope(new CharacterScope(CharacterScope::PLAYER));

        parent::boot();
    }

}
