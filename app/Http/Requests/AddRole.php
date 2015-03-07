<?php namespace Rpgo\Http\Requests;

use Rpgo\Rpgo;

class AddRole extends Request {

	public function sanitize()
	{
		$this->merge([
			'slug' => str_slug($this->get('name_solo'))
		]);
	}

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules(Rpgo $rpgo)
	{
		return [
			'name_group' => ['required', 'string', 'max:30', 'unique:roles,name_group,NULL,id,world_id,' . $rpgo->world()->id],
			'slug' => ['required', 'string', 'max:30', 'unique:roles,slug,NULL,id,world_id,' . $rpgo->world()->id],
			'name_solo' => ['required', 'string', 'max:30', 'unique:roles,name_solo,NULL,id,world_id,' . $rpgo->world()->id],
		];
	}

}
