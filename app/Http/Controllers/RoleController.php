<?php namespace Rpgo\Http\Controllers;

use Rpgo\Models\Role;
use Rpgo\Rpgo;

class RoleController extends Controller {

	public function index(Rpgo $rpgo)
    {
        $world = $rpgo->world();

        $roles = Role::ofWorld($world)->get();

        return view('role.index')->with(compact('roles'));
    }

    public function store()
    {
        return 'store';
    }

    public function show()
    {
        return 'show';
    }

}
