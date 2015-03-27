<?php namespace Rpgo\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Events\Dispatcher;
use Illuminate\Http\Response;
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
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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

}
