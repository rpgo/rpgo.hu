<?php namespace Rpgo\Http\Controllers;

use Rpgo\Http\Requests\JoinWorld;

class MemberController extends Controller {

	public function index()
	{
		return view('member.index');
	}

	public function create()
	{
		return view('member.create');
	}

	public function store(JoinWorld $request)
	{
        dd($request);
	}

	public function show($member)
	{
		return view('member.show')->with(compact('member'));
	}

}
