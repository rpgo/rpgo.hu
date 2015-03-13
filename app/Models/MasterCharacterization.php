<?php namespace Rpgo\Models;

class MasterCharacterization extends Eloquent {

	public function character()
    {
        return $this->morphOne(MasterCharacter::class, 'characterization');
    }

}
