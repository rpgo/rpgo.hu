<?php namespace Rpgo\Models;

use Carbon\Carbon;

class Choice extends Eloquent {

	public $incrementing = false;

	protected $fillable = ['title', 'request_limit', 'participation_limit', 'announced_at'];

	protected $dates = ['created_at', 'updated_at', 'announce_at', 'started_at'];

	public function setTitleAttribute($value)
	{
		$this->attributes['title'] = $value;
		$this->attributes['slug'] = str_slug($value);
	}

	public function worlds()
	{
		return $this->belongsToMany(World::class, 'world_choices');
	}

	public function games()
	{
		return $this->hasMany(Game::class);
	}

	public function isAnnounced()
	{
		return (bool) $this['announced_at'];
	}

	public function hasStarted()
	{
		return (bool) $this['started_at'];
	}

	public function announce()
	{
		$this['announced_at'] = Carbon::now();

		$this->save();
	}

	public function start()
	{
		$this['started_at'] = Carbon::now();

		$this->save();
	}

}
