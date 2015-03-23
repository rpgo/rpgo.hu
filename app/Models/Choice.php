<?php namespace Rpgo\Models;

class Choice extends Eloquent {

	public $incrementing = false;

	protected $fillable = ['title', 'limit'];

	public function setTitleAttribute($value)
	{
		$this->attributes['title'] = $value;
		$this->attributes['slug'] = str_slug($value);
	}

	public function world()
	{
		return $this->belongsTo(World::class);
	}

	public function games()
	{
		return $this->hasMany(Game::class);
	}

}
