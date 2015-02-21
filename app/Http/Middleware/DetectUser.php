<?php namespace Rpgo\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Rpgo\Rpgo;

class DetectUser {

    /**
     * @var Guard
     */
    private $guard;

    /**
     * @var Rpgo
     */
    private $rpgo;

    function __construct(Guard $guard, Rpgo $rpgo)
    {
        $this->guard = $guard;
        $this->rpgo = $rpgo;
    }

    /**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        $user = $this->guard->user();

        $this->rpgo->user($user);

		return $next($request);
	}

}
