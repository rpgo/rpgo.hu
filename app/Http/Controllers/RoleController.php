<?php namespace Rpgo\Http\Controllers;

use Illuminate\Http\Request;
use Rpgo\Http\Requests\AddRole;
use Rpgo\Models\Member;
use Rpgo\Models\Permission;
use Rpgo\Models\Role;
use Rpgo\Models\Type;
use Rpgo\Models\World;
use Rpgo\Rpgo;

class RoleController extends Controller {

	public function dashboard()
    {
        $world = $this->world();

        $roles = $world->roles()->get();

        $templates = Role::templates();

        return view('role.dashboard')->with(compact('roles', 'templates'));
    }

    public function store(AddRole $request)
    {
        $role = new Role($request->only('name_group', 'name_solo', 'description', 'membership'));

        $role['secret_role'] = $request->has('secret_role');

        $role['rank'] = Role::ofWorld($this->world())->max('rank') + 1;

        $type = Type::find($request->get('type_id')) ?: Type::point('custom');

        $role['membership'] = $role['membership'] ?: $this->defaultMembership($type);

        $role->type()->associate($type);

        $role->world()->associate($this->world());

        $role->save();

        $permissions = array_map(function($grant){return ['grant' => $grant];}, $request->get('grants'));

        $role->permissions()->sync($permissions);

        return redirect()->route('role.dashboard', [$this->world()]);
    }

    public function create(Request $request)
    {
        $slug = $request->get(trans('role.template.variable'));

        $sections = explode('.', $slug);

        $world = $sections[0];

        $slug = isset($sections[1]) ? $sections[1] : '';

        if($world != 'rpgo')
            $template = Role::whereSlug($slug)->whereHas('world', function($query) use($world) {return $query->whereSlug($world);})->first();
        else
            $template = Role::whereSlug($slug)->has('world', 0)->first();

        if(! $template)
        {
            $type = Type::point('custom');
            $role = new Role();
            $permissions = Permission::all();
            $role['permissions'] = $permissions;
            $role['membership'] = $this->defaultMembership($type);
        }else
        {
            $type = $template['type'];
            $role = new Role($template->toArray());
            $role->permissions = $template['permissions'];
            $role['membership'] = $template['membership'] ?: $this->defaultMembership($type);
        }

        $role->type()->associate($type);

        return view('role.create')->with(compact('role'));
    }

    public function edit(Role $role)
    {
        return view('role.edit')->with(compact('role'));
    }

    public function desert(Request $request)
    {
        $deserts = $request->get('selected');

        $roles = Role::find($deserts);

        foreach($roles as $role)
        {
            $role->members()->detach();
        }

        return redirect()->route('role.dashboard', [$this->world()]);
    }

    public function delete(Request $request)
    {
        $deserts = $request->get('selected');

        Role::destroy($deserts);

        return redirect()->route('role.dashboard', [$this->world()]);
    }

    public function update(Request $request, Role $role)
    {
        $data = $request->only('name_group', 'name_solo', 'description', 'membership');
        $data['secret_role'] = $request->has('secret_role');

        $role->fill($data);
        $role->save();

        $permissions = array_map(function($grant){return ['grant' => $grant];}, $request->get('grants'));

        $role->permissions()->sync($permissions);

        return redirect()->route('role.dashboard', [$this->world()]);
    }

    public function rank(Request $request)
    {
        $ranks = $request->get('ranks');

        $this->validate($request, ['ranks' => 'array']);

        foreach($ranks as $id => $rank)
        {
            Role::whereId($id)->update(['rank' => $rank]);
        }

        return redirect()->route('role.dashboard', [$this->world()]);
    }

    public function hide(Request $request)
    {
        $toHide = $request->get('selected');

        $roles = Role::find($toHide);

        foreach ($roles as $role) {
            $role->update(['secret_role' => true]);
        }

        return redirect()->route('role.dashboard', [$this->world()]);
    }

    public function unhide(Request $request)
    {
        $toUnHide = $request->get('selected');

        $roles = Role::find($toUnHide);

        foreach ($roles as $role) {
            $role->update(['secret_role' => false]);
        }

        return redirect()->route('role.dashboard', [$this->world()]);

    }

    /**
     * @param $type
     * @return int
     */
    private function defaultMembership($type)
    {
        if ( $type['no_members'] )
            return -1;

        if ( $type['automates_members'] )
            return 1;

        return 0;
    }

}
