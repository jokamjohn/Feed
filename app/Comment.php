<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jokam\Traits\RecordActivity;

class Comment extends Model
{
    use RecordActivity;

    protected $fillable = ['user_id', 'post_id', 'body'];
}
