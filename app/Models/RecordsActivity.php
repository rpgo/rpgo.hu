<?php namespace Rpgo\Models;

use ReflectionClass;

trait RecordsActivity {

    protected static $records = ['created', 'updated', 'deleted'];

    protected static function bootRecordsActivity()
    {
        foreach(static::getModelEventsToRecord() as $event)
        {
            static::$event(function(static $subject) use ($event) {
                $subject->recordActivity($event);
            });
        }
    }

    protected static function getModelEventsToRecord()
    {
        return static::$records;
    }

    public function recordActivity($action, Eloquent $actor = null)
    {
        if( ! $actor )
            $actor = $this->getActor();

        Activity::create([
            'subject_id' => $this['id'],
            'subject_type' => get_class($this),
            'type' => $this->getActivityType($action),
            'actor_id' => $actor['id'],
            'actor_type' => get_class($actor),
        ]);
    }

    protected function getActivityType($action)
    {
        $model = strtolower((new ReflectionClass($this))->getShortName());

        return $action . "_" . $model;
    }

    protected function getActor()
    {
        return $this['member'];
    }
}