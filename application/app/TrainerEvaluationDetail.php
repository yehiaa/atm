<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainerEvaluationDetail extends Model
{

    protected $fillable=[
        'trainer_evaluation_id',
        'trainer_id',
        'scientific_skills',
        'presentation_skills',
        'communication_skills'
    ];

    public function trainerEvaluation()
    {
        return $this->belongsTo(TrainerEvaluation::class);
    }
    public function trainers()
    {
        return $this->belongsTo(Trainer::class);
    }
}
