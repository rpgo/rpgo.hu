<?php namespace Rpgo\Models;

interface ActivityRecorder {

    public function recordActivity($action, Eloquent $actor = null);

}