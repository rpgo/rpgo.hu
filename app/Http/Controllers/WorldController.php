<?php namespace Rpgo\Http\Controllers;

use Rpgo\Http\Requests;
use Rpgo\Http\Controllers\Controller;

use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        dd($request);
    }

}
