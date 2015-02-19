<?php namespace Rpgo\Http\Controllers;

use Rpgo\Http\Requests;
use Rpgo\Http\Controllers\Controller;

use Illuminate\Http\Request;

class WorldController extends Controller {

	public function create()
    {
        return view('world.create');
    }

}
