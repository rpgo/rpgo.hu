<?php namespace Rpgo\Models;


interface ActivityReporter {

    public function reportActivity($action, ActivityRecorder $subject);

}