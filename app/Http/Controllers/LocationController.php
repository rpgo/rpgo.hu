<?php namespace Rpgo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Rpgo\Http\Requests\AddLocation;
use Rpgo\Http\Requests\DeleteLocation;
use Rpgo\Http\Requests\RelocateLocation;
use Rpgo\Models\Location;
use Rpgo\Models\World;
use Rpgo\Rpgo;

class LocationController extends Controller {

	public function show(Location $location)
    {
        return view('location.show')->with(compact('location'));
    }

    public function renameForm(Location $location)
    {
        return view('location.rename')->with(compact('location'));
    }

    public function create(Location $location)
    {
        return view('location.create')->with(compact('location'));
    }

    public function store(Location $parent, AddLocation $request)
    {
        $member = $this->member();

        $world = $this->world();

        $location = new Location($request->only('name'));

        $member->createdLocations()->save($location);

        $location->worlds()->attach($world);

        $location->supralocations()->attach($location, ['depth' => 0]);

        foreach($parent->supralocations as $ancestor)
        {
            $location->supralocations()->attach($ancestor, ['depth' => $ancestor->pivot->depth + 1]);
        }

        return redirect()->route('location.show', [$world, $location]);
    }

    public function renameAction(Location $location, Request $request)
    {
        $world = $this->world();

        $location->name = $request->get('name');

        $location->save();

        return redirect()->route('location.show', [$world, $location]);
    }

    public function remove(Location $location)
    {
        $world = $this->world();

        if ($world->rootlocation()->equals($location))
            return new Response('Forbidden', 503);

        return view('location.remove')->with(compact('location'));
    }

    public function delete(Location $location, DeleteLocation $request)
    {
        $world = $this->world();

        $parent = $location->parent();

        $this->deleteLocation($location);

        return redirect()->route('location.show', [$world, $parent]);
    }

    public function move(Location $location)
    {
        $world = $this->world();

        if ($world->rootlocation()->equals($location))
            return new Response('Forbidden', 503);

        return view('location.move')->with(compact('world', 'location'));
    }

    public function relocate(Location $location, RelocateLocation $request)
    {
        $world = $this->world();

        $target_id = $request->get('target_id');

        /** @var Location $target */
        $target = Location::find($target_id);

        foreach($location->sublocations as $sublocation)
        {
            $sublocation->supralocations()->detach($location->supralocations->diff([$location])->lists('id'));
        }

        foreach($target->supralocations->diff([$location]) as $ancestor)
        {
            foreach($location->sublocations as $sublocation)
            {
                $sublocation->supralocations()->attach($ancestor, ['depth' => $sublocation->pivot->depth + $ancestor->pivot->depth + 1]);
            }
        }

        return redirect()->route('location.show', [$world, $location]);

    }

    private function deleteLocation(Location $location)
    {
        $sublocations = $location->sublocations;

        $location->sublocations()->sync([]);

        $location->supralocations()->sync([]);

        $location->worlds()->sync([]);

        $location->delete();

        foreach($sublocations as $sublocation)
            $this->deleteLocation($sublocation);
    }

}
