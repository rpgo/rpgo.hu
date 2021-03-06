<?php namespace Rpgo\Http\Parameters;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Rpgo\Models\Location;

class LocationParameter {

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

    public function bind($location)
    {
        $world = $this->getCurrentWorld();

        $path = explode('/', $location);

        $slug = last($path);

        /** @var Collection $locations */
        $locations = Location::ofWorldAndWithSlug($world, $slug)->get();

        $location = $locations->filter(function(Location $location) use ($path) {
            return $location->path() == $path;
        })->first();

        if(! $location)
            throw new ModelNotFoundException;

        return $location;
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