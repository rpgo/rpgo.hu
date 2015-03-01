<?php namespace Rpgo\Http\Controllers;

use Rpgo\Models\Role;
use Rpgo\Rpgo;

class RoleController extends Controller {

	public function dashboard(Rpgo $rpgo)
    {
        $world = $rpgo->world();

        $roles = Role::ofWorld($world)->orderBy('name_solo')->get();

        return view('role.dashboard')->with(compact('roles'));
    }

    public function store()
    {
        return 'store';
    }

    public function edit()
    {
        return 'edit';
    }

}
