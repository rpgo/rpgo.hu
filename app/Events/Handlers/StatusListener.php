<?php namespace Rpgo\Events\Handlers;

use Rpgo\Events\UserLoggedOut;

class StatusListener {

    public function whenUserLoggedOut(UserLoggedOut $event)
    {
        $user = $event->user;

        $user->load('memberships.occupied_characters');

        foreach ($user->memberships as $membership) {
            $membership['status'] = false;
            $membership->save();
        }
    }

}