<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TraineeAssessment extends Model
{
    protected $fillable = [
        'course_id',
        'trainee_id',
        'pretest',
        'posttest',
        'improvement',
        'average_trainee_satisfaction',
        'attachment'
    ];
    public function trainee()
    {
        return $this->belongsTo('App\Trainee');
    }

    public function course()
    {
        return $this->belongsTo('App\Course');
    }

}
