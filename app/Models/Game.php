<?php namespace Rpgo\Models;

class Game extends Eloquent {

    public $incrementing = false;

    const OPEN = 'open';
    const REQUEST = 'request';
    const INVITATION = 'invitation';
    const MANUAL = 'manual';

    public static $attendances = [
        self::OPEN,
        self::REQUEST,
        self::MANUAL,
    ];

    /**
     * All the participations in this game
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function participations()
    {
        return $this->hasMany(Participation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function allParticipants()
    {
        return $this->belongsToMany(Character::class, 'participations')->withPivot('status');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function participants()
    {
        return $this->allParticipants()->wherePivot('status', Participation::ACTIVE);
    }

}
