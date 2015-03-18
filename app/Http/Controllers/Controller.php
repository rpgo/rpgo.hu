<?php namespace Rpgo\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;

	private $rpgo;

	public function rpgo()
	{
		if( ! $this->rpgo)
			return $this->rpgo = app('Rpgo\Rpgo');

		return $this->rpgo;
	}

	public function world()
	{
		return $this->rpgo()->world();
	}

	public function user()
	{
		return $this->rpgo()->user();
	}

	public function member()
	{
		return $this->rpgo()->member();
	}

	public function can($permission)
	{
		return $this->rpgo()->can($permission);
	}

}
