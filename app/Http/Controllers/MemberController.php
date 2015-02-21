<?php namespace Rpgo\Http\Controllers;

use Rpgo\Http\Requests\JoinWorld;
use Rpgo\Models\Member;
use Rpgo\Rpgo;

class MemberController extends Controller {

	public function index()
	{
		return view('member.index');
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

        return redirect()->route('member.show')->with(compact('member'));
	}

	public function show($member)
	{
		return view('member.show')->with(compact('member'));
	}

}
