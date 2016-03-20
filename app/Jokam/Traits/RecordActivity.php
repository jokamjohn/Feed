<?php


namespace Jokam\Traits;


use App\Activity;
use ReflectionClass;

trait RecordActivity
{
    /**
     * Create an activity when a model is created.
     */
    protected static function boot()
    {
        parent::boot();

        static::created(function ($model) {
            Activity::create([
                'subject_id' => $model->id,
                'subject_type' => get_class($model),
                'name' => $model->getActivityName($model, 'created'),
                'user_id' => $model->user_id
            ]);

        });
    }

    /**Create a name for the activity table name field.
     *
     * @param $model
     * @param $action
     * @return string
     */
    protected function getActivityName($model, $action)
    {
        $name = strtolower((new ReflectionClass($model))->getShortName());

        return "{$action}_{$name}";
    }

}