<?php namespace Rpgo\Models;

use Illuminate\Database\Eloquent\Model;
use Rhumsaa\Uuid\Uuid;

class Eloquent extends Model {

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        /**
         * Use UUID if not incrementing id.
         */
        static::creating(function (Eloquent $model) {
            if ($model->incrementing)
                return;

            $key = $model->getKeyName();

            if (empty($model->$key))
                $model->$key = (string) Uuid::uuid4();
        });
    }

}