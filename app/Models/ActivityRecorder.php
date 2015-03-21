<?php namespace Rpgo\Models;

interface ActivityRecorder {

    public function recordActivity($action, ActivityRecorder $actor = null);

}