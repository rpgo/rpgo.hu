<?php namespace Rpgo\Http\Composers;

use Illuminate\Contracts\View\View;
use Rpgo\Rpgo;

class RpgoComposer {

    /**
     * @var Rpgo
     */
    private $rpgo;

    function __construct(Rpgo $rpgo)
    {
        $this->rpgo = $rpgo;
    }

    public function compose(View $view)
    {
        $user = $this->rpgo->user();
        $world = $this->rpgo->world();
        $member = $this->rpgo->member();

        $view->with(compact('user', 'world', 'member'));
    }

    public function create(View $view)
    {
        $this->compose($view);
    }

}