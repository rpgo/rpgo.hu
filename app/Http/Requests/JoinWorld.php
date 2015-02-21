<?php namespace Rpgo\Http\Requests;

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
	public function rules()
	{
		return [
			//
		];
	}

}
