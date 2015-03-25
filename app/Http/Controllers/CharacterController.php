<?php namespace Rpgo\Http\Controllers;

use Illuminate\Http\Request;
use Rpgo\Http\Requests\CreateCharacter;
use Rpgo\Models\Character;
use Rpgo\Models\MasterCharacterization;
use Rpgo\Models\Partition;
use Rpgo\Models\PlayerCharacterization;
use Rpgo\Rpgo;

class CharacterController extends Controller {

	public function index()
    {
        $characters = Character::all();
        return view('character.index')->with(compact('characters'));
    }

    public function create()
    {
        session(['character.create.step' => 'type']);

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
        switch(session('character.create.step')){
            case "type":
                return $this->type($request);
        }

        /*if($request->get('type') == 'player')
        {
            $characterization = new PlayerCharacterization();
        }else
        {
            $characterization = new MasterCharacterization();
        }

        $characterization->save();

        $character = new Character($request->only('name'));

        $character->creator()->associate($this->member());

        $character->characterization()->associate($characterization);

        $character->save();

        $character->owner_members()->attach($this->member());

        $character->occupant_members()->attach($this->member());

        $world = $this->world()->load('partitions.communities');

        $partitions = $world['partitions'];

        foreach($partitions as $partition)
        {
            $chosen_communities = $request->get($partition['slug'], []);

            foreach($chosen_communities as $chosen)
            {
                $community = $partition['communities']->keyBy('id')[$chosen];
                $character->communities()->attach($community);
            }
        }

        return redirect()->route('character.index', [$world]);*/
    }

    private function type($request)
    {
        session([
            'character.create.type' => $request->get('type'),
            'character.create.step' => 'name',
        ]);

        return view('character.create');

    }

}
