<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'country',
        'city', 'identity', 'identity_type',
        'speciality_id', 'bank_name', 'bank_branch',
        'bank_account_number', 'is_cooperate', 'affiliate_university', 'experiences'];

    public function speciality(){
        return $this->belongsTo(Speciality::class);
    }
}
