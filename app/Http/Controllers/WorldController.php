<?php namespace Rpgo\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Rpgo\Commands\CreateWorldCommand;
use Rpgo\Http\Requests\CreateWorld;
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

    public function publish(Rpgo $rpgo, ImageManager $img, Browsershot $shot)
    {
        $world = $rpgo->world()->publish();

        $world->save();

        $shot->setUrl('http://'. $world->slug . '.' . env('APP_DOMAIN'))
            ->setWidth(1024)
            ->setHeight(786)
            ->save(storage_path('app/previews/tmp.jpg'));

        $img = $img->make(storage_path('app/previews/tmp.jpg'));

        $img->resize(130,130);

        $img->save(public_path('images/previews/' . $world->slug . '.jpg'));

        return redirect()->route('world.main', $world);
    }

}
