<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    public function speciality(){
        return $this->belongsTo(Speciality::class);
    }
}
