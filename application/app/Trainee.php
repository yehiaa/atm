<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainee extends Model
{
    protected $fillable = [
        'name', 'email', 'phone',
        'country', 'city',
        'identity', 'identity_type',
        'speciality_id', 'refereedFrom', 'gender', 'government'];

}


