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

    public function compose(View $view)
    {
        $user = $this->guard->user();

        $route = $this->request->route();

        $world = $route->getParameter('world');

        if($route->getName() == 'world.show')
            $world = null;

        $view->with(compact('user', 'world');

    }

}