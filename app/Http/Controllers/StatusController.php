<?php namespace Rpgo\Http\Controllers;

use Illuminate\Http\Request;
use Rpgo\Rpgo;

class StatusController extends Controller {

	public function toggle(Rpgo $rpgo)
    {
        $member = $rpgo->member();

        $member['status'] = ! $member['status'];

        $member->save();

        return redirect()->back();
    }

}
