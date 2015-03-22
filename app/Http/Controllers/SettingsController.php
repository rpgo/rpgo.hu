<?php namespace Rpgo\Http\Controllers;

use Illuminate\Http\Response;

class SettingsController extends Controller {

	/**
	 * Show the form for editing the world settings.
	 *
	 * @return Response
	 */
	public function edit()
	{
		return view('settings.edit');
	}

	/**
	 * Update the settings in storage.
	 *
	 * @return Response
	 */
	public function update()
	{
		//
	}

}
