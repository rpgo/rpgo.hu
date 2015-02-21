<?php namespace Rpgo\Http\Middleware;

use Closure;
use Rpgo\Rpgo;

class Recognize {

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
        $world = $this->rpgo->world();

        if(! $this->rpgo->member())
            return redirect()->guest(route('world.main', $world));

		return $next($request);
	}

}
