<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
//    protected $table = 'activities';
    
    protected $fillable = ['subject_id','subject_type','name','user_id'];

    /**Get the user who owns this activity.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**Get the model to which this activity belongsTo (subject).
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function subject()
    {
        return $this->morphTo();
    }
}
