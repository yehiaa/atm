<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TrainerAttendance extends Pivot
{
    protected $fillable = ['trainer_id', 'lecture_id', 'attended_at', 'created_by'];

    public function trainer()
    {
        return $this->belongsTo('app\Trainer');
    }

    public function lecture()
    {
        return $this->belongsTo('app\Lecture');
    }
}
