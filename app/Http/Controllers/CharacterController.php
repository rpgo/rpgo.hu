<?php namespace Rpgo\Http\Controllers;

use Rpgo\Http\Requests;
use Rpgo\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CharacterController extends Controller {

	public function index()
    {
        return view('character.index');
    }

    public function create()
    {
        return view('character.create');
    }

    public function show($character)
    {
        return view('character.show');
    }

}
