<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jokam\Traits\RecordActivity;

class Comment extends Model
{
    use RecordActivity;

    /**Override the events recorded in the Records trait.
     *
     * @var array
     */
    protected static $recordEvents = ['created'];
    
    protected $fillable = ['user_id', 'post_id', 'body'];
}
