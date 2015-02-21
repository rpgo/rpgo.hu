<?php namespace Rpgo;

use Rpgo\Models\Member;
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

}