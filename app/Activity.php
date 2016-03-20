<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activities';
    
    protected $fillable = ['subject_id','subject_type','name','user_id'];
    
}
