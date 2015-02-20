<?php namespace Rpgo\Http\Controllers;

use Rpgo\Http\Requests;
use Rpgo\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Rpgo\Models\World;

class WorldController extends Controller {

	public function create()
    {
        return view('world.create');
    }

    public function index()
    {
        return view('world.index');
    }

    public function show($world)
    {
        return view('world.show');
    }

    public function store(Requests\CreateWorld $request)
    {
        $world = World::create($request->only('name', 'brand', 'slug'));

        return redirect()->route('world.show', compact('world'));
    }

}
