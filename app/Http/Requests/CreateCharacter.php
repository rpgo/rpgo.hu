<?php namespace Rpgo\Http\Requests;

use Rpgo\Rpgo;

class CreateCharacter extends Request {

	public function sanitize()
	{
		$this->merge([
			'slug' => str_slug($this->get('name'))
		]);
	}

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize(Rpgo $rpgo)
	{
		$exists = $rpgo->world()->characters()->where('characters.slug', $this->get('slug'))->count();

		return ! $exists;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name' => ['required'],
			'type' => ['required', 'in:player,master'],
		];
	}

}
