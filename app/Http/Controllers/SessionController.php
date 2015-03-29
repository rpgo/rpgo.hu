<?php namespace Rpgo\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Events\Dispatcher;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Rpgo\Events\UserLoggedIn;
use Rpgo\Events\UserLoggedOut;

class SessionController extends Controller {

	/**
	 * @var Guard
	 */
	private $guard;

	/**
	 * SessionController constructor.
	 *
	 * @param Guard $guard
	 */
	public function __construct(Guard $guard)
	{
		$this->guard = $guard;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('auth.login');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request, Dispatcher $event)
	{
		$this->validate($request, [
			'email' => 'required|email', 'password' => 'required',
		]);

		$credentials = $request->only('email', 'password');

		if ($this->guard->attempt($credentials, $request->has('remember')))
		{
			$event->fire(new UserLoggedIn($this->guard->user()));
			return redirect()->intended($this->redirectPath());
		}

		return redirect($this->loginPath())
			->withInput($request->only('email', 'remember'))
			->withErrors([
				'email' => $this->getFailedLoginMessage(),
			]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @return Response
	 */
	public function destroy(Dispatcher $event)
	{
		$this->guard->logout();

		$event->fire(new UserLoggedOut($this->user()));

		return redirect('/');
	}

	/**
	 * Get the failed login message.
	 *
	 * @return string
	 */
	protected function getFailedLoginMessage()
	{
		return 'These credentials do not match our records.';
	}

	public function redirectPath()
	{
		return route('rpgo.home');
	}

	public function loginPath()
	{
		return route('session.create');
	}

}
