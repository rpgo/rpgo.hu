<?php namespace Rpgo\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Rpgo\Http\Requests\CreateWorld;
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

    public function show($world)
    {
        return view('world.show')->with(compact('world'));
    }

    public function store(CreateWorld $request, Guard $guard)
    {
        $user = $guard->user();

        $world = new World($request->only('name', 'brand', 'slug'));

        $world->creator()->associate($user);

        $world->save();

        return redirect()->route('world.show', compact('world'));
    }

}
