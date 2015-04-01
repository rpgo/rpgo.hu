<?php namespace Rpgo\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Rpgo\Rpgo;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class DetectUser {

    /**
     * @var Guard
     */
    private $guard;

    /**
     * @var Rpgo
     */
    private $rpgo;
    /**
     * @var SessionInterface
     */
    private $session;

    function __construct(Guard $guard, Rpgo $rpgo, SessionInterface $session)
    {
        $this->guard = $guard;
        $this->rpgo = $rpgo;
        $this->session = $session;
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

        if($user)
        {
            $user->online_at = Carbon::now();

            $user->save();
        }

		return $next($request);
	}

}
