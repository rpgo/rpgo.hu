<?php namespace Rpgo\Http\Controllers;

use Illuminate\Http\Request;
use Rpgo\Models\Character;
use Rpgo\Rpgo;

class StatusController extends Controller {

	public function member()
    {
        $member = $this->member();

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
