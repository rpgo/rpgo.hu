<?php namespace Rpgo\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Rpgo\Services\Registrar;

class UserController extends Controller {

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * @param Request $request
     * @param Registrar $registrar
     * @param Guard $guard
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Registrar $registrar, Guard $guard)
    {
        $validator = $registrar->validator($request->all());

        if ($validator->fails())
        {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $guard->login($registrar->create($request->all()));

        return redirect()->route('rpgo.home');
    }

}
