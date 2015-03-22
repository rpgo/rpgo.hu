<?php namespace Rpgo\Http\Controllers;

use Illuminate\Http\Response;
use Rpgo\Http\Requests\EditSettings;
use Rpgo\Models\Settings;


class SettingsController extends Controller {

	/**
	 * @var Settings
	 */
	private $settings;

	/**
	 * SettingsController constructor.
	 */
	public function __construct()
	{
		$world = $this->world();
		$this->settings = $world['settings'];
	}

	/**
	 * Show the form for editing the world settings.
	 *
	 * @return Response
	 */
	public function edit()
	{
		$settings = $this->settings;

		return view('settings.edit')->with(compact('settings'));
	}

	/**
	 * Update the settings in storage.
	 *
	 * @return Response
	 */
	public function update(EditSettings $request)
	{
		$settings = $this->settings;

		$this->updateLanguage($request, $settings);

		$settings->save();

		return view('settings.edit')->with(compact('settings'));
	}

	/**
	 * @param EditSettings $request
	 * @param Settings $settings
	 * @return mixed
     */
	
	private function updateLanguage(EditSettings $request, $settings)
	{
		if ($request->has('language'))
			$settings['language'] = $request->get('language');
	}

}
