<?php namespace Rpgo\Http\Parameters;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Rpgo\Models\Location;

class LocationPath {

    /**
     * @var Request
     */
    private $request;
    /**
     * @var World
     */
    private $world;

    public function __construct(Request $request, World $world)
    {
        $this->request = $request;
        $this->world = $world;
    }

    public function bind($location_path)
    {
        $world = $this->getCurrentWorld();

        $path = explode('/', $location_path);

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