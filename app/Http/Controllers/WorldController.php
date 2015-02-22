<?php namespace Rpgo\Http\Controllers;

use Rpgo\Commands\CreateWorldCommand;
use Rpgo\Http\Requests\CreateWorld;
use Rpgo\Models\World;
use Rpgo\Rpgo;

class WorldController extends Controller {

	public function create()
    {
        return view('world.create');
    }

    public function index()
    {
        $worlds = World::published()->get();

        return view('world.index')->with(compact('worlds'));
    }

    public function show(World $world)
    {
        return view('world.show')->with(compact('world'));
    }

    public function store(CreateWorld $request)
    {
        $world = $this->dispatchFrom(CreateWorldCommand::class, $request);

        return redirect()->route('world.main', $world);
    }

    public function main()
    {
        return view('world.main');
    }

    public function publish(Rpgo $rpgo)
    {
        $world = $rpgo->world()->publish();

        $world->save();

        return redirect()->route('world.main', $world);
    }

}
