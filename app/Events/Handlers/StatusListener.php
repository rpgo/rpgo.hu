<?php namespace Rpgo\Events\Handlers;

use Rpgo\Events\UserLoggedIn;
use Rpgo\Events\UserLoggedOut;

class StatusListener {

    public function whenUserLoggedOut(UserLoggedOut $event)
    {
        $user = $event->user;

        $user['status'] = false;

        $user->save();
    }

    public function whenUserLoggedIn(UserLoggedIn $event)
    {
        $user = $event->user;

        $user['status'] = true;

        $user->save();
    }

}