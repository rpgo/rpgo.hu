<?php namespace Rpgo\Models;

class Participation extends Eloquent {

	public $incrementing = false;

    const REQUESTED = 'requested';
    const ACCEPTED = 'accepted';
    const INVITED = 'invited';
    const DENIED = 'denied';
    const ACTIVE = 'active';
    const INACTIVE = 'inactive';
    const FINISHED = 'finished';

    public static $statuses = [
        self::REQUESTED,
        self::ACCEPTED,
        self::INVITED,
        self::DENIED,
        self::ACTIVE,
        self::INACTIVE,
        self::FINISHED,
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function character()
    {
        return $this->belongsTo(Game::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

}
