<?php namespace Rpgo\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Eloquent implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword, ReportsActivities;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    public $incrementing = false;

    public function createdWorlds()
    {
        return $this->hasMany(World::class, 'creator_id');
    }

    /**
     * @return static
     */
    public static function support()
    {
        return static::orderBy('created_at','asc')->first();
    }

    public function memberships()
    {
        return $this->hasMany(Member::class);
    }

    public function scopeOnline($query)
    {
        return $query->where('users.status', true);
    }

}
