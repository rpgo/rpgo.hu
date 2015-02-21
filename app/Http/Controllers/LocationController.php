<?php namespace Rpgo\Http\Controllers;

use Rpgo\Http\Requests\AddLocation;
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

        $location->supralocations()->attach($parent, ['depth' => 1]);

        return redirect()->route('location.show', [$world, $location]);
    }

}
