<?php namespace Rpgo\Http\Controllers;

use Rpgo\Commands\CreateWorldCommand;
use Rpgo\Commands\PublishWorldCommand;
use Rpgo\Http\Requests\CreateWorld;
use Rpgo\Models\Character;
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
        $world = $this->world();
        $onlineCharacters = $world->characters()->online()->get();
        return view('world.main')->with(compact('onlineCharacters'));
    }

    public function publish()
    {
        $world = $this->world();

        $this->dispatchFromArray(PublishWorldCommand::class,compact('world'));

        return redirect()->route('dashboard.main', $world);
    }

}
