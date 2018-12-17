<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    protected $dates = ['start_datetime', 'end_datetime'];
    protected $fillable = ['name', 'start_datetime', 'end_datetime', 'course_id', 'hall_id', 'notes'];

    public function course()
    {
        return $this->belongsTo('App\Course');
    }


    public function hall()
    {
        return $this->belongsTo('App\Hall');
    }
}
