<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UniversityAffiliation extends Model
{
    protected $table = 'university_affiliations';
    protected $fillable = ['name'];
}
