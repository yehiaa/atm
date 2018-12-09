<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'country', 'city', 'identity', 'identity_type', 'speciality_id', 'bank_name', 'bank_account_number', 'experiences'];

    public function speciality(){
        return $this->belongsTo(Speciality::class);
    }
}
