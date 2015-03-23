<?php namespace Rpgo\Http\Controllers;

class GameController extends Controller {

	public function index()
    {
        $world = $this->world();

        $world->load(['choices.games', 'chapters.games']);

        $choices = $world['choices'];

        $chapters = $world['chapters'];

        return view('game.index')->with(compact('choices', 'chapters'));
    }

}
