<?php namespace Rpgo\Http\Parameters;

use Illuminate\Http\Request;

class RoleParameter {

    /**
     * @var Request
     */
    private $request;
    /**
     * @var WorldParameter
     */
    private $world;

    public function __construct(Request $request, WorldParameter $world)
    {
        $this->request = $request;
        $this->world = $world;
    }

    public function bind($slug)
    {
        $world = $this->getCurrentWorld();

        return $world->roles()->where('slug', $slug)->firstOrFail();
    }

    /**
     * Since we don't have route parameters when the route-model bindings occur,
     * we have to do a little extra work. Shame on you, Laravel! :)
     *
     * @return \Rpgo\Models\World
     */
    private function getCurrentWorld()
    {
        preg_match('/(^(?:[^\s](?=.+\..+\..+$))+.)/', $this->request->getHost(), $matches);

        $worldSlug = $matches[0];

        return $this->world->bind($worldSlug);
    }
}