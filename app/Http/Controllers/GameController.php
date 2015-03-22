<?php namespace Rpgo\Http\Controllers;

class GameController extends Controller {

	public function index()
    {
        $world = $this->world();

        $world->load('choices.games');

        dd($world);
    }

}
