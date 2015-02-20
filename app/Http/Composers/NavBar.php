<?php namespace Rpgo\Http\Composers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class NavBar {

    /**
     * @var Guard
     */
    private $guard;
    /**
     * @var Request
     */
    private $request;

    public function __construct(Guard $guard, Request $request)
    {
        $this->guard = $guard;
        $this->request = $request;
    }

    public function create(View $view)
    {
        $user = $this->guard->user();

        $world = $this->request->route()->getParameter('world');

        $view->with(compact('user'));

        $view->with(compact('world'));
    }

}