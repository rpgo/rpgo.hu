<?php namespace Rpgo\Events\Handlers;

use Rpgo\Events\UserLoggedIn;
use Rpgo\Events\UserLoggedOut;
use Rpgo\Models\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class StatusListener {

    /**
     * @var SessionInterface
     */
    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

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