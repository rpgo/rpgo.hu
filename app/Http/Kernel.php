<?php namespace Rpgo\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel {

	/**
	 * The application's global HTTP middleware stack.
	 *
	 * @var array
	 */
	protected $middleware = [
		'Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode',
		'Illuminate\Cookie\Middleware\EncryptCookies',
		'Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse',
		'Illuminate\Session\Middleware\StartSession',
		'Illuminate\View\Middleware\ShareErrorsFromSession',
		//'Rpgo\Http\Middleware\VerifyCsrfToken', //If enabled, push queues fail... //TODO: figure out a way to use it before production!
        'Rpgo\Http\Middleware\DetectUser',
	];

	/**
	 * The application's route middleware.
	 *
	 * @var array
	 */
	protected $routeMiddleware = [
		'auth' => 'Rpgo\Http\Middleware\Authenticate',
		'auth.basic' => 'Illuminate\Auth\Middleware\AuthenticateWithBasicAuth',
		'guest' => 'Rpgo\Http\Middleware\RedirectIfAuthenticated',
        'guide' => 'Rpgo\Http\Middleware\DetectWorld',
        'usher' => 'Rpgo\Http\Middleware\DetectMember',
        'stranger' => 'Rpgo\Http\Middleware\RedirectIfMember',
        'warden' => 'Rpgo\Http\Middleware\Recognize',
		'permission' => 'Rpgo\Http\Middleware\RedirectIfNotAllowed',
	];

}
