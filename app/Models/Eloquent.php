<?php namespace Rpgo\Models;

use Illuminate\Database\Eloquent\Model;
use Rhumsaa\Uuid\Uuid;

class Eloquent extends Model {

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->useUuidIfNotIncrementing();
    }

    private function useUuidIfNotIncrementing()
    {
        if ($this->incrementing)
            return;

        $key = $this->getKeyName();

        if (empty($this->$key))
            $this->$key = (string) Uuid::uuid4();
    }

    public function getRouteKey()
    {
        return $this->slug;
    }

}