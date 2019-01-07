<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TraineeAttendance extends Pivot
{
    protected $fillable = ['trainee_id', 'lecture_id', 'attended_at', 'created_by'];

    public function trainee()
    {
        return $this->belongsTo('app\Trainee');
    }

    public function lecture()
    {
        return $this->belongsTo('app\Lecture');
    }
}
