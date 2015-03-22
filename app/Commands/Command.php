<?php namespace Rpgo\Commands;

abstract class Command {

	public function fire($event)
    {
        app('events')->fire($event);
    }

}