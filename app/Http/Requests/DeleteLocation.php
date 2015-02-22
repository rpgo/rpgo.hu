<?php namespace Rpgo\Http\Requests;

class DeleteLocation extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		$location = $this->route()->getParameter('location_path');

        $world = $this->route()->getParameter('world');

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
