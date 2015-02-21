<?php namespace Rpgo\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Rpgo\Rpgo;

class DetectUser {

    /**
     * @var Guard
     */
    private $guard;

    /**
     * @var View
     */
    private $view;
    /**
     * @var Rpgo
     */
    private $rpgo;

    function __construct(Guard $guard, Application $app, Rpgo $rpgo)
    {
        $this->guard = $guard;
        $this->view = $app->make('view');
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

        $this->view->share(compact('user'));

		return $next($request);
	}

}
