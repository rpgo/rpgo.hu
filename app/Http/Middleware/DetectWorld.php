<?php namespace Rpgo\Http\Middleware;

use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Rpgo\Rpgo;

class DetectWorld {

    /**
     * @var Rpgo
     */
    private $rpgo;
    /**
     * @var View
     */
    private $view;

    function __construct(Rpgo $rpgo, Application $app)
    {
        $this->rpgo = $rpgo;
        $this->view = $app->make('view');
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

        $this->view->share(compact('world'));

		return $next($request);
	}

}
