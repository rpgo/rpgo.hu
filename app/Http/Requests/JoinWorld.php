<?php namespace Rpgo\Http\Requests;

use Rpgo\Rpgo;

class JoinWorld extends Request {

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
            'name' => ['required', 'string', 'max:30', 'unique:members,name,NULL,id,world_id,' . $rpgo->world()->id],
            'slug' => ['required', 'string', 'max:30', 'unique:members,slug,NULL,id,world_id,' . $rpgo->world()->id],
		];
	}

}
