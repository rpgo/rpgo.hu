<?php namespace Rpgo\Http\Controllers;

use Illuminate\Http\Request;
use Rpgo\Models\Character;
use Rpgo\Models\Game;
use Rpgo\Models\MasterCharacterization;
use Rpgo\Models\Participation;
use Rpgo\Models\PlayerCharacterization;

class CharacterController extends Controller {

	public function index()
    {
        $characters = Character::all();
        return view('character.index')->with(compact('characters'));
    }

    public function create()
    {
        session([
            'character.create' => [
                'step' => 'type',
                'data' => [
                    'name' => trans('character.create.preview.johndoe'),
                    'type' => 'unknown',
                    'partitions' => [],
                ],
                'next' => '',
            ],
        ]);

        $world = $this->world();

        $world->load('partitions.communities');

        $partitions = $world['partitions'];

        return view('character.create')->with(compact('partitions'));
    }

    public function show(Character $character)
    {
        return view('character.show')->with(compact('character'));
    }

    public function store(Request $request)
    {
        return $this->{session('character.create.step')}($request);

        /**/
    }

    public function type(Request $request)
    {
        session(['character.create.data.type' => $request->get('type')]);

        $this->step('communities', 'name');

        return view('character.create');
    }

    public function communities(Request $request)
    {
        $world = $this->world()->load('partitions.communities');

        $partitions = $world->partitions;

        $partition = $partitions->where('slug', $request->get('partition'))->first();

        $communities = $request->get($request->get('partition'));

        $partition->load(['communities' => function($query) use($communities) {
            return $query->whereIn('id', $communities);
        }]);

        session(['character.create.data.partitions.' . $partition['slug'] => $partition->toArray()]);

        $next = $this->getNextPartition($partitions);

        if($next)
            $this->step('communities');
        else
            $this->step('name');

        return view('character.create');
    }

    public function name(Request $request)
    {
        $this->step('confirm');

        session(['character.create.data.name' => $request->get('name')]);

        return view('character.create');
    }

    public function confirm(Request $request)
    {
        $data = session('character.create.data');

        if($data['type'] == 'player')
        {
            $characterization = new PlayerCharacterization();
        }else
        {
            $characterization = new MasterCharacterization();
        }

        $characterization->save();

        $character = new Character(['name' => $data['name']]);

        $character->creator()->associate($this->member());

        $character->characterization()->associate($characterization);

        $character->save();

        $character->owner_members()->attach($this->member());

        $character->occupant_members()->attach($this->member());

        foreach($data['partitions'] as $partition)
        {
            foreach($partition['communities'] as $community)
            {
                $character->communities()->attach($community['id']);
            }
        }

        $character->load('communities.starting_game');
        $starting_games = $character->communities->fetch('starting_game.id')->toBase()->unique();

        foreach($starting_games as $starting_game)
        {
            $game = Game::find($starting_game);

            $participation = new Participation([
                'status' => Participation::INVITED,
            ]);

            $participation->character()->associate($character);
            $participation->game()->associate($game);
            $participation->save();
        }

        return redirect()->route('character.index', [$this->world()]);
    }

    private function step($player, $master = null)
    {
        if(! $master)
            $master = $player;

        if(session('character.create.data.type') == 'player')
            session(['character.create.step' => $player]);
        else
            session(['character.create.step' => $master]);

        $this->next();
    }

    private function getNextPartition(\ArrayAccess $partitions)
    {
        foreach ($partitions as $partition) {
            if( ! session()->has('character.create.data.partitions.' . $partition->slug))
                return $partition;
        }

        return null;
    }

    private function next()
    {
        if(session('character.create.step') == 'communities')
        {
            $world = $this->world()->load('partitions.communities');

            $partitions = $world->partitions;

            $partition = $this->getNextPartition($partitions);

            session(['character.create.next' => $partition['slug']]);
        }
    }

}
