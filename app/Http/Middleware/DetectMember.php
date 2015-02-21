<?php namespace Rpgo\Http\Middleware;

use Closure;
use Rpgo\Models\Member;
use Rpgo\Rpgo;

class DetectMember {

    /**
     * @var Rpgo
     */
    private $rpgo;

    function __construct(Rpgo $rpgo)
    {
        $this->rpgo = $rpgo;
    }

    /**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        $world = $this->rpgo->world();

        $user = $this->rpgo->user();

        $member = Member::ofWorldAndUser($world, $user)->first();

        $this->rpgo->member($member);

		return $next($request);
	}

}
