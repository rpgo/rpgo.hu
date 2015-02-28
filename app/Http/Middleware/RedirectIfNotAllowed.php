<?php namespace Rpgo\Http\Middleware;

use Closure;
use Rpgo\Rpgo;

class RedirectIfNotAllowed {

	/**
	 * @var Rpgo
	 */
	private $rpgo;

	public function __construct(Rpgo $rpgo)
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
		$route = $request->route()->getName();

		if( ! $this->rpgo->can('view.' . $route))
			return redirect()->guest(route('world.main', $this->rpgo->world()));

		return $next($request);
	}

}
