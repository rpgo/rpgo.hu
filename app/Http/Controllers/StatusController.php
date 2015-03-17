<?php namespace Rpgo\Http\Controllers;

use Illuminate\Http\Request;
use Rpgo\Models\Character;
use Rpgo\Rpgo;

class StatusController extends Controller {

	public function member(Rpgo $rpgo)
    {
        $member = $rpgo->member();

        $member['status'] = ! $member['status'];

        $member->save();

        return redirect()->back();
    }

    public function character(Character $character)
    {
        $character['status'] = ! $character['status'];

        $character->save();

        return redirect()->back();
    }

}
