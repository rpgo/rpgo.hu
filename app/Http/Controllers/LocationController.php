<?php namespace Rpgo\Http\Controllers;

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

    public function create()
    {
        return view('location.create')->with(compact('location'));
    }

}
