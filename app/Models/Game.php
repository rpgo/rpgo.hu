<?php namespace Rpgo\Models;

class Game extends Eloquent {

    use RecordsActivities;

    public $incrementing = false;

    protected $fillable = ['title', 'attendance'];

    const OPEN = 'open';
    const REQUEST = 'request';
    const MANUAL = 'manual';

    public static $attendances = [
        self::OPEN,
        self::REQUEST,
        self::MANUAL,
    ];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

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

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function choice()
    {
        return $this->belongsTo(Choice::class);
    }

    public function chapters()
    {
        return $this->belongsToMany(Chapter::class, 'chapter_games');
    }

}
