<?php namespace Rpgo\Commands;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Database\Eloquent\Collection;
use Rpgo\Models\Location;
use Rpgo\Models\Member;
use Rpgo\Models\Permission;
use Rpgo\Models\Role;
use Rpgo\Models\Type;
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

        $this->createRoles($world);

        $admin = $this->createAdmin($user, $world);

        $this->createRootLocation($admin, $world);

        $support = User::support();

        if(! $support->equals($user))
            $this->createSupport($world, $support);

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
        $admin = $this->createMember($user, $world, $this->admin);

        $this->addRole($world, $admin, 'staff');

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

    private function createSupport($world, $support)
    {
        $member = $this->createMember($support, $world, $support->name);

        $this->addRole($world, $member, 'support');

        return $member;
    }

    private function createMember($user, $world, $name)
    {
        $member = new Member(['name' => $name]);

        $member->user()->associate($user);

        $member->world()->associate($world);

        $member->save();

        return $member;
    }

    private function createRoles(World $world)
    {
        $templates = Role::templates();

        $roles = new Collection();

        foreach($templates as $template)
        {
            $role = new Role([
                'name_group' => $template['name_group'],
                'name_solo' => $template['name_solo'],
                'description' => $template['description'],
                'secret_role' => $template['secret_role'],
                'automates_members' => $template['automates_members'],
            ]);

            $role->type()->associate($template['type']);

            $role->world()->associate($world);

            $role->save();

            foreach($template['permissions'] as $permission)
            {
                $role->permissions()->attach([$permission['id'] => ['grant' => $permission['pivot']['grant']]]);
            }

            $roles[] = $role;
        }

        return $roles;
    }

    /**
     * @param $world
     * @param $member
     */
    private function addRole($world, $member, $type)
    {
        $type = Type::point($type);

        $role = Role::ofWorld($world)->ofType($type)->latest()->first();

        $member->roles()->attach($role);
    }

}
