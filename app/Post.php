<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jokam\Traits\RecordActivity;

class Post extends Model
{
    use RecordActivity;
    
    protected $fillable = [
        'name', 'body', 'user_id'
    ];


}
