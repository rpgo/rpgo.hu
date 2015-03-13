<?php namespace Rpgo\Models;

class PlayerCharacterization extends Eloquent {

    public function character()
    {
        return $this->morphOne(PlayerCharacter::class, 'characterization');
    }

}
