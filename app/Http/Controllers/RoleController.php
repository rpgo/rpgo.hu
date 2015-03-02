<?php namespace Rpgo\Http\Controllers;

use Illuminate\Http\Request;
use Rpgo\Http\Requests\AddRole;
use Rpgo\Models\Member;
use Rpgo\Models\Permission;
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

        $permissions = Permission::lists('id');

        $role->save();

        $role->permissions()->attach($permissions, ['grant' => false]);

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

    public function update(Request $request, Rpgo $rpgo, Role $role)
    {
        $data = $request->only('name_group', 'name_solo', 'description');
        $data['secret'] = $request->has('secret');

        $role->fill($data);
        $role->save();

        return redirect()->route('role.dashboard', [$rpgo->world()]);
    }

    public function assign(Request $request, Rpgo $rpgo, Role $role)
    {
        $member = Member::whereName($request->get('member'))->first();

        $role->members()->attach($member);

        return redirect()->route('role.edit', [$rpgo->world(), $role]);
    }

    public function discharge(Request $request, Rpgo $rpgo, Role $role)
    {
        $members = $request->get('members');

        $role->members()->detach($members);

        return redirect()->route('role.edit', [$rpgo->world(), $role]);
    }

}
