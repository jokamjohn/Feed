<?php


namespace Jokam\Traits;


use App\Activity;
use ReflectionClass;

trait RecordActivity
{
    /**
     * Create an activity when a model is created.
     * Follow the boot method convention.
     */
    protected static function bootRecordActivity()
    {
        foreach (static::getEventName() as $event) {

            static::$event(function ($model) use ($event) {
                $model->recordActivity($event);
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

    /**Create the activity.
     *
     * @param $event
     */
    public function recordActivity($event)
    {
        Activity::create([
            'subject_id' => $this->id,
            'subject_type' => get_class($this),
            'name' => $this->getActivityName($this, $event),
            'user_id' => $this->user_id
        ]);
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