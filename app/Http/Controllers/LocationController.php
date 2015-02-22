<?php namespace Rpgo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Rpgo\Http\Requests\AddLocation;
use Rpgo\Http\Requests\DeleteLocation;
use Rpgo\Http\Requests\RelocateLocation;
use Rpgo\Models\Location;
use Rpgo\Models\World;

class LocationController extends Controller {

	public function show(World $world, Location $location)
    {
        return view('location.show')->with(compact('location'));
    }

    public function edit(World $world, Location $location)
    {
        return view('location.edit')->with(compact('location'));
    }

    public function create(World $world, Location $location)
    {
        return view('location.create')->with(compact('location'));
    }

    public function store(World $world, Location $parent, AddLocation $request)
    {
        $location = new Location($request->only('name'));

        $location->save();

        $location->worlds()->attach($world);

        $location->supralocations()->attach($location, ['depth' => 0]);

        foreach($parent->supralocations as $ancestor)
        {
            $location->supralocations()->attach($ancestor, ['depth' => $ancestor->pivot->depth + 1]);
        }

        return redirect()->route('location.show', [$world, $location]);
    }

    public function update(World $world, Location $location, Request $request)
    {
        $location->name = $request->get('name');

        $location->save();

        return redirect()->route('location.show', [$world, $location]);
    }

    public function remove(World $world, Location $location)
    {
        if ($world->rootlocation()->equals($location))
            return new Response('Forbidden', 503);

        return view('location.remove')->with(compact('location'));
    }

    public function delete(World $world, Location $location, DeleteLocation $request)
    {
        $parent = $location->parent();

        $this->deleteLocation($location);

        return redirect()->route('location.show', [$world, $parent]);
    }

    public function move(World $world, Location $location)
    {
        return view('location.move')->with(compact('world', 'location'));
    }

    public function relocate(World $world, Location $location, RelocateLocation $request)
    {
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
