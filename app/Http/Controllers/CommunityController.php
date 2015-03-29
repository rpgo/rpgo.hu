<?php namespace Rpgo\Http\Controllers;

class CommunityController extends Controller {

	public function dashboard()
	{
		$this->world()->load('partitions.communities');

		return view('community.dashboard');
	}

}
