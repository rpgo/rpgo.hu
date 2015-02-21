<?php namespace Rpgo\Http\Requests;

class AddLocation extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

    public function sanitize()
    {
        $this->merge([
            'slug' => str_slug($this->get('name'))
        ]);
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
            'slug' => ['required'],
		];
	}

}
