<?php namespace Rpgo\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Rpgo\Models\Chapter;
use Rpgo\Models\Choice;

class GameController extends Controller {

	public function index()
    {
        $world = $this->world();

        $world->load(['choices.games', 'chapters.games' => function($query){
            return $query->where('finished_at', '<', Carbon::now());
        }]);

        /** @var Collection $choices */
        $choices = $world['choices'];

        /** @var Collection $chapters */
        $chapters = $world['chapters'];

        $choices = $choices->groupBy(function(Choice $choice) {
            if( ! $choice->isAnnounced())
                return 'planned';

            if ( ! $choice->hasStarted())
                return 'announced';

            return 'started';
        });

        $chapters = $chapters->filter(function(Chapter $chapter){
            return $chapter['games']->count();
        });

        return view('game.index')->with([
            'planned_games' => $choices->get('planned', []),
            'announced_games' => $choices->get('announced', []),
            'started_games' => $choices->get('started', []),
            'finished_games' => $chapters,
        ]);
    }

}
