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

    public function trainees ()
    {
        return $this->belongsToMany(Trainee::class);
    }
    public function courses ()
    {
        return $this->belongsToMany(Course::class);
    }
    public function trainerEvaluationDetail ()
    {
        return $this->hasMany(TrainerEvaluationDetail::class);
    }

}
