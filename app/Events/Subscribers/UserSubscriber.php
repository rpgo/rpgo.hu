<?php namespace Rpgo\Events\Subscribers;

use Illuminate\Events\Dispatcher;

class UserSubscriber implements Subscriber {

    /**
     * Register the listeners for the subscriber.
     *
     * @param Dispatcher $events
     */
    public function subscribe(Dispatcher $events)
    {
        $events->listen('Rpgo\Events\UserLoggedIn', 'Rpgo\Events\Handlers\StatusListener@whenUserLoggedIn');
        $events->listen('Rpgo\Events\UserLoggedOut', 'Rpgo\Events\Handlers\StatusListener@whenUserLoggedOut');
    }
}