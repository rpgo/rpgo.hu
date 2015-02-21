<?php namespace Rpgo\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\Guard;
use Rpgo\Http\Requests\CreateWorld;
use Rpgo\Models\Location;
use Rpgo\Models\Member;
use Rpgo\Models\World;

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

    public function store(CreateWorld $request, Guard $guard)
    {
        $user = $guard->user();

        $world = new World($request->only('name', 'brand', 'slug'));

        $world->creator()->associate($user);

        $member = new Member(['name' => $request['admin']]);

        $member->user()->associate($user);

        $member->world()->associate($world);

        $location = new Location(['name' => 'Helyszínek', 'slug' => 'helyszinek']);

        $world->save();

        $member->save();

        $location->save();

        $location->worlds()->attach($world);

        $location->sublocations()->attach($location, ['depth' => 0]);

        return redirect()->route('world.main', compact('world'));
    }

    public function main(World $world)
    {
        return view('world.main')->with(compact('world'));
    }

    public function publish(World $world)
    {
        $world->published_at = Carbon::now();

        $world->save();

        return redirect()->route('world.main', $world);
    }

}
