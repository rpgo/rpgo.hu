<?php namespace Rpgo\Http\Controllers;

class MemberController extends Controller {

	public function index()
	{
		return view('member.index');
	}

	public function create()
	{
		return view('member.create');
	}

	public function store()
	{
		//
	}

	public function show($member)
	{
		return view('member.show')->with(compact('member'));
	}

}
