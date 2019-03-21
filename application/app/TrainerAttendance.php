<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Facades\DB;

class TrainerAttendance extends Pivot
{
    protected $fillable = ['trainer_id', 'lecture_id', 'attended_at', 'created_by'];

    public function trainer()
    {
        return $this->belongsTo('app\Trainer');
    }

    public function __delete()
    {
        DB::table('trainer_attendance')->where('trainer_id', '=', $this->trainer_id)->where('lecture_id','=', $this->lecture_id)->delete();
    }

    public function lecture()
    {
        return $this->belongsTo('app\Lecture');
    }
}
