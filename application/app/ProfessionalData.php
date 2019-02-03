<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfessionalData extends Model
{
    protected $table = 'professional_data';
    protected $fillable = ['name'];
}
