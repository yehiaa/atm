<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CourseTrainer extends Pivot
{
    protected $fillable = ['course_id', 'trainer_id'];

    public function trainer()
    {
        return $this->belongsTo('App\Trainer');
    }

    public function course()
    {
        return $this->belongsTo('App\Course');
    }
}
