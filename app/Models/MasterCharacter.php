<?php namespace Rpgo\Models;

class MasterCharacter extends Character {

	public static function boot()
    {
        static::addGlobalScope(new CharacterScope(CharacterScope::MASTER));

        parent::boot();
    }

}
