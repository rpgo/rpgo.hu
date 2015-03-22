<?php namespace Rpgo\Http\Controllers;

class GameController extends Controller {

	public function index()
    {
        $world = $this->world();

        $world->load('choices.games');

        $games = $world['choices']->fetch('games');

        return view('game.index')->with(compact('games'));
    }

}
