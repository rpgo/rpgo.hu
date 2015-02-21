<?php namespace Rpgo\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Factory;

abstract class Request extends FormRequest {

    public function validator(Factory $factory)
    {
        return $factory->make(
            $this->data(), $this->container->call([$this, 'rules']), $this->messages()
        );
    }

    private function data()
    {
        if (method_exists($this, 'sanitize'))
            $this->container->call([$this, 'sanitize']);

        return parent::all();
    }

}
