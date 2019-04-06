<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainerEvaluation extends Model
{

    protected $fillable=[
        'course_id',
        'trainee_id',
        'comment',
        'recommendation',
        'attachment',
        ];

    public function trainee ()
    {
        return $this->belongsTo(Trainee::class);
    }
    public function course ()
    {
        return $this->belongsTo(Course::class);
    }
    public function trainerEvaluationDetail ()
    {
        return $this->hasMany(TrainerEvaluationDetail::class);
    }

}
