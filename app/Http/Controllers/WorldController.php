<?php namespace Rpgo\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Rpgo\Http\Requests\CreateWorld;
use Rpgo\Models\Member;
use Rpgo\Models\World;

class WorldController extends Controller {

	public function create()
    {
        return view('world.create');
    }

    public function index()
    {
        $worlds = World::all();

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

        $world->save();

        $member->save();

        return redirect()->route('world.main', compact('world'));
    }

    public function main(World $world)
    {
        return view('world.main')->with(compact('world'));
    }

}
