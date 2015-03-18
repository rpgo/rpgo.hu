<?php namespace Rpgo\Http\Controllers;

use Rpgo\Http\Requests\CreateCharacter;
use Rpgo\Models\Character;
use Rpgo\Models\MasterCharacterization;
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
        return view('character.create');
    }

    public function show(Character $character)
    {
        return view('character.show')->with(compact('character'));
    }

    public function store(CreateCharacter $request)
    {
        if($request->get('type') == 'player')
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

        return redirect()->route('character.index', [$this->world()]);
    }

}
