<?php namespace Rpgo\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Rpgo\Models\Session;
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
            $session = Session::find($this->session->getId());

            if(! $session->user_id)

            $session->user_id = $user->id;

            $session->save();
        }

		return $next($request);
	}

}
