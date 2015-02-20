<?php namespace Rpgo\Http\Requests;

use Rpgo\Http\Requests\Request;

class CreateWorld extends Request {

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
            'name' => ['required', 'string', 'max:40', 'unique:worlds,name'],
            'slug' => ['required', 'string', 'max:20', 'regex:/^[-a-z0-9]+$/', 'unique:worlds,slug'],
            'brand' => ['required', 'string', 'max:10', 'unique:worlds,brand'],
		];
	}

}
