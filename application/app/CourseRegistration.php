<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CourseRegistration extends Pivot
{
    // course / trainee
    // registration time ...
    //
//     payment here , payment types cash , visa, nomination, nomination reference
//     payment amount , payment type , nomina   qtion reference, payment by, payment datetime
//    attendance also goes in trainee_attendance .....
//    attendance also goes in trainer_attendance .....
//    created by createdAt , attendanceDatetime


    const PAYMENT_TYPE_CASH = 1;
    const PAYMENT_TYPE_VISA = 2;
    const PAYMENT_TYPE_AFFILIATION = 3;
    protected $fillable = [
        'course_id', 'trainee_id',
        'created_by', 'payment_by',
        'payment_at', 'status',
        'notes', 'payment_amount',
        'payment_type', 'affiliation_id',
        'reference'];

    public function trainee()
    {
        return $this->belongsTo('App\Trainee');
    }

    public function affiliation()
    {
        return $this->belongsTo('App\Affiliation');
    }

    public function course()
    {
        return $this->belongsTo('App\Course');
    }
}
