<?php namespace Rpgo\Http\Controllers;

use Illuminate\Http\Request;
use Rpgo\Http\Requests\AddRole;
use Rpgo\Models\Role;
use Rpgo\Rpgo;

class RoleController extends Controller {

	public function dashboard(Rpgo $rpgo)
    {
        $world = $rpgo->world();

        $roles = Role::ofWorld($world)->orderBy('name_solo')->get();

        return view('role.dashboard')->with(compact('roles'));
    }

    public function store(AddRole $request, Rpgo $rpgo)
    {
        $role = new Role($request->only('name_group', 'name_solo'));
        $role->fill(['secret' => false]);

        $role->world()->associate($rpgo->world());

        $role->save();

        return redirect()->route('role.dashboard', [$rpgo->world()]);
    }

    public function edit(Role $role)
    {
        return view('role.edit')->with(compact('role'));
    }

    public function desert(Request $request, Rpgo $rpgo)
    {
        $deserts = $request->get('selected');

        $roles = Role::find($deserts);

        foreach($roles as $role)
        {
            $role->members()->detach();
        }

        return redirect()->route('role.dashboard', [$rpgo->world()]);
    }

    public function delete(Request $request, Rpgo $rpgo)
    {
        $deserts = $request->get('selected');

        Role::destroy($deserts);

        return redirect()->route('role.dashboard', [$rpgo->world()]);
    }

}
