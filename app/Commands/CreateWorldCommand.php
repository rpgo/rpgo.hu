<?php namespace Rpgo\Commands;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Bus\SelfHandling;
use Rpgo\Models\Location;
use Rpgo\Models\Member;
use Rpgo\Models\User;
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

        $world = $this->createWorld($user);

        $admin = $this->createAdmin($user, $world);

        $this->createRootLocation($admin, $world);

        return $world;
	}

    /**
     * @param $user
     * @return World
     */
    private function createWorld(User $user)
    {
        $world = new World([
            'name' => $this->name,
            'brand' => $this->brand,
            'slug' => $this->slug,
        ]);

        $world->creator()->associate($user);

        $world->save();
        return $world;
    }

    /**
     * @param User $user
     * @param World $world
     * @return Member
     */
    private function createAdmin(User $user, World $world)
    {
        $admin = new Member(['name' => $this->admin]);

        $admin->user()->associate($user);

        $admin->world()->associate($world);

        $admin->save();

        return $admin;
    }

    /**
     * @param Member $admin
     * @param World $world
     */
    private function createRootLocation(Member $admin, World $world)
    {
        $location = new Location(['name' => trans('location.root')]);

        $admin->createdLocations()->save($location);

        $location->worlds()->attach($world);

        $location->sublocations()->attach($location, ['depth' => 0]);
    }

}
