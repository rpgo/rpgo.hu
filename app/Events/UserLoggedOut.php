<?php namespace Rpgo\Events;

use Illuminate\Queue\SerializesModels;
use Rpgo\Models\User;

class UserLoggedOut extends Event {

	use SerializesModels;

	/**
	 * @var User
	 */
	public $user;

	/**
	 * Create a new event instance.
	 *
	 * @param User $user
	 */
	public function __construct(User $user)
	{
		$this->user = $user;
	}

}
