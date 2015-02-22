<?php namespace Rpgo\Commands;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Bus\SelfHandling;
use Rpgo\Models\Location;
use Rpgo\Models\Member;
use Rpgo\Models\World;

class CreateWorldCommand extends Command implements SelfHandling {
    /**
     * @var
     */
    private $name;
    /**
     * @var
     */
    private $brand;
    /**
     * @var
     */
    private $slug;
    /**
     * @var
     */
    private $admin;

    /**
     * Create a new command instance.
     * @param string $name
     * @param string $brand
     * @param string $slug
     * @param string $admin
     */
	public function __construct($name, $brand, $slug, $admin)
	{
		//
        $this->name = $name;
        $this->brand = $brand;
        $this->slug = $slug;
        $this->admin = $admin;
    }

    /**
     * Execute the command.
     * @param Guard $guard
     * @return World
     */
	public function handle(Guard $guard)
	{
        $user = $guard->user();

        $world = new World([
            'name' => $this->name,
            'brand' => $this->brand,
            'slug' => $this->slug,
        ]);

        $world->creator()->associate($user);

        $member = new Member(['name' => $this->admin]);

        $member->user()->associate($user);

        $member->world()->associate($world);

        $world->save();

        $member->save();

        $location = new Location(['name' => trans('location.root')]);

        $member->createdLocations()->save($location);

        $location->worlds()->attach($world);

        $location->sublocations()->attach($location, ['depth' => 0]);

        return $world;
	}

}
