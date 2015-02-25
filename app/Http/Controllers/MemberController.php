<?php namespace Rpgo\Http\Controllers;

use Rpgo\Http\Requests\JoinWorld;
use Rpgo\Models\Member;
use Rpgo\Models\Role;
use Rpgo\Models\Type;
use Rpgo\Models\World;
use Rpgo\Rpgo;

class MemberController extends Controller {

	public function index(Rpgo $rpgo)
	{
        $world = $rpgo->world();

        $members = Member::ofWorld($world)->get();

		return view('member.index')->with(compact('members'));
	}

	public function create()
	{
		return view('member.create');
	}

	public function store(JoinWorld $request, Rpgo $rpgo)
	{
        $user = $rpgo->user();

        $world = $rpgo->world();

        $member = new Member($request->only('name', 'slug'));

        $member->user()->associate($user);

        $member->world()->associate($world);

        $member->save();

        $type = Type::where('label', 'reader')->first();

        $role = Role::ofWorld($world)->ofType($type)->first();

        $member->roles()->attach($role);

        return redirect()->route('member.show', [$world, $member]);
	}

	public function show(Member $member)
	{
		return view('member.show')->with(compact('member'));
	}

}
