<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $dates = ['start_datetime', 'end_datetime'];
    protected $fillable =   ['name', 'logo', 'alternative_name', 'price', 'percentage_to_pass', 'start_datetime', 'end_datetime', 'description'];

    public function lectures ()
    {
        return $this->hasMany('App\Lecture');
    }

    public function trainers ()
    {
        return $this->belongsToMany('App\Trainer');
    }


    public function registrations()
    {
        return $this->hasMany('App\CourseRegistration');
    }
}
