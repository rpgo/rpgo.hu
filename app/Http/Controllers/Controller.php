<?php namespace Rpgo\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;

	public function world()
	{
		return app('Rpgo\Rpgo')->world();
	}

	public function user()
	{
		return app('Rpgo\Rpgo')->user();
	}

	public function member()
	{
		return app('Rpgo\Rpgo')->member();
	}

	public function can($permission)
	{
		return app('Rpgo\Rpgo')->can($permission);
	}

}
