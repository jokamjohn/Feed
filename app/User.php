<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use League\Flysystem\Exception;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function activity()
    {
        return $this->hasMany(Activity::class);
    }

    public function recordActivity($name, $model)
    {
        if (!method_exists($model, 'recordActivity')) {
            return new Exception('method recordActivity is not found');
        }
        return $model->recordActivity($name);
    }
}
