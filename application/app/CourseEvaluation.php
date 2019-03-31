<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseEvaluation extends Model
{
    protected $fillable = [
        'course_id',
        'trainee_id',
        'organization',
        'educational_tools',
        'cofee_break',
        'overall_evaluation',
        'comment',
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
