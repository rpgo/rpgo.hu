<?php namespace Rpgo\Events\Subscribers;

use Illuminate\Events\Dispatcher;

interface Subscriber {

    /**
     * Register the listeners for the subscriber.
     *
     * @param Dispatcher $events
     */
    public function subscribe(Dispatcher $events);

}