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

        foreach (static::getEventName() as $event) {

            static::$event(function ($model) use ($event) {
                Activity::create([
                    'subject_id' => $model->id,
                    'subject_type' => get_class($model),
                    'name' => $model->getActivityName($model, $event),
                    'user_id' => $model->user_id
                ]);

            });
        }
    }

    /**Return the events to be recorded.
     *
     * @return array
     */
    protected static function getEventName()
    {
        if (isset(static::$recordEvents)) {
            return static::$recordEvents;
        }

        return ['created', 'deleted', 'updated'];
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