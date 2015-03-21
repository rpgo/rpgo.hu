<?php namespace Rpgo\Models;

trait ReportsActivities {

    public function reportActivity($action, ActivityRecorder $subject)
    {
        $subject->recordActivity($action, $this);
    }

}