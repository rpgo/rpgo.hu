<?php namespace Rpgo\Http\Middleware;

use Closure;
use Rpgo\Rpgo;

class SetLanguage {

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

		$world->load('settings');

		$settings = $world['settings'];

		$language = $settings['language'];

		app()->setLocale($language);

		return $next($request);
	}

}
