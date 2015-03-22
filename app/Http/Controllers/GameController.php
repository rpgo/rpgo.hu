<?php namespace Rpgo\Http\Controllers;

class GameController extends Controller {

	public function index()
    {
        $world = $this->world();

        $world->load('choices.games');

        $choices = $world['choices'];

        return view('game.index')->with(compact('choices'));
    }

}
