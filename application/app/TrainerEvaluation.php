<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainerEvaluation extends Model
{
    public function details()
    {
        // you need to add this class .... TrainerEvaluationDetail
//        return $this->hasMany(TrainerEvaluationDetail::class);
    }
}
