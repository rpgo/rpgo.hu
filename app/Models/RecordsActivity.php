<?php namespace Rpgo\Models;

use ReflectionClass;

trait RecordsActivity {

    protected static function boot()
    {
        parent::boot();

        foreach(static::getModelEvents() as $event)
        {
            static::$event(function($subject) use ($event) {
                $subject->addActivity($event);
            });
        }
    }

    protected function addActivity($event)
    {
        $actor = $this->getActor();
        Activity::create([
            'subject_id' => $this['id'],
            'subject_type' => get_class($this),
            'type' => $this->getActivityType($event),
            'actor_id' => $actor['id'],
            'actor_type' => get_class($actor),
        ]);
    }

    protected function getActivityType($action)
    {
        $name = strtolower((new ReflectionClass($this))->getShortName());

        return $action . "_" . $name;
    }

    protected function getActor()
    {
        return $this['member'];
    }

    protected static getModelEvents()
    {
        if(isset(static::$record))
            return static::$record;

        return ['created', 'updated', 'deleted'];
    }
}