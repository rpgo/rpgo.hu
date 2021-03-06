<?php namespace Rpgo;

use Rpgo\Models\Member;
use Rpgo\Models\Permission;
use Rpgo\Models\Role;
use Rpgo\Models\Type;
use Rpgo\Models\User;
use Rpgo\Models\World;

class Rpgo {

    private $world;

    private $member;

    private $user;

    public function world(World $world = null)
    {
       if($world)
           $this->world = $world;

        return $this->world;
    }

    public function member(Member $member = null)
    {
        if($member)
            $this->member = $member;

        return $this->member;
    }

    public function user(User $user = null)
    {
        if($user)
            $this->user = $user;

        return $this->user;
    }

    /**
     * @param string $permission
     * @return bool
     */
    public function can($permission)
    {
        $permission = Permission::point($permission);

        if(! $permission)
            return true;

        if( ! $this->world)
            return false;

        if(! $this->user)
        {
            $type = Type::point('stranger');
            $role = Role::ofWorldAndType($this->world, $type)->first();
            return $role->can($permission);
        }

        if(! $this->member || !$this->member['status'])
        {
            $type = Type::point('guest');
            $role = Role::ofWorldAndType($this->world, $type)->first();
            return $role->can($permission);
        }

        return $this->member->can($permission);
    }

}