<?php namespace Rpgo\Http\Requests;

class AddRole extends Request {

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
	public function rules()
	{
		return [
			'name_group' => ['required', 'string', 'max:30'],
			'name_solo' => ['required', 'string', 'max:30'],
		];
	}

}
