<?php namespace Rpgo\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Rpgo\Models\World;

class RouteServiceProvider extends ServiceProvider {

	/**
	 * This namespace is applied to the controller routes in your routes file.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'Rpgo\Http\Controllers';

	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function boot(Router $router)
	{
		parent::boot($router);

        $router->bind('world', 'Rpgo\Http\Parameters\WorldParameter');
        $router->bind('member', 'Rpgo\Http\Parameters\MemberParameter');
        $router->bind('location', 'Rpgo\Http\Parameters\LocationParameter');
		$router->bind('role', 'Rpgo\Http\Parameters\RoleParameter');
		$router->bind('character', 'Rpgo\Http\Parameters\CharacterParameter');
	}

	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function map(Router $router)
	{
        $router->pattern('location', '^(.(?!' . trans('routes.location.except') . '))+');

		$router->group(['namespace' => $this->namespace], function($router)
		{
			require app_path('Http/routes.php');
		});
	}

}
