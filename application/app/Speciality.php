<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    protected $table = 'specialties';

    protected $fillable = ['name'];
}
