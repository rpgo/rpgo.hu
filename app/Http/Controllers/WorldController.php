<?php namespace Rpgo\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Rpgo\Commands\CreateWorldCommand;
use Rpgo\Commands\PublishWorldCommand;
use Rpgo\Http\Requests\CreateWorld;
use Rpgo\Models\Type;
use Rpgo\Models\World;
use Rpgo\Rpgo;
use Spatie\Browsershot\Browsershot;

class WorldController extends Controller {

	public function create()
    {
        return view('world.create');
    }

    public function index()
    {
        $worlds = World::published()->with('roles')->get();

        $types = Type::nonSecret()->get();

        return view('world.index')->with(compact('worlds', 'types'));
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
        $world = $rpgo->world();

        $this->dispatchFromArray(PublishWorldCommand::class,compact('world'));

        return redirect()->route('world.main', $world);
    }

}
