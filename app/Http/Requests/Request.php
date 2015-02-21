<?php namespace Rpgo\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest {

	public function all()
    {
        if (method_exists($this, 'sanitize'))
            $this->container->call([$this, 'sanitize']);

        return parent::all();
    }

}
