<?php namespace Rpgo\Http\Middleware;

use Closure;
use Rpgo\Rpgo;

class DetectWorld {

    /**
     * @var Rpgo
     */
    private $rpgo;

    function __construct(Rpgo $rpgo)
    {
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
        $route = $request->route();

        $world = $route->getParameter('world');

        $this->rpgo->world($world);

        $route->forgetParameter('world');

		return $next($request);
	}

}
