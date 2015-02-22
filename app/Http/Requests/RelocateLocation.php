<?php namespace Rpgo\Http\Requests;

use Rpgo\Http\Requests\Request;
use Rpgo\Rpgo;

class RelocateLocation extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize(Rpgo $rpgo)
	{
        $location = $this->route()->getParameter('location');

        $world = $rpgo->world();

        return ! $world->rootlocation()->equals($location);
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			//
		];
	}

}
