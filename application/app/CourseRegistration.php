<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CourseRegistration extends Pivot
{
    // course / trainee
    // registration time ...
    //
//     payment here , payment types cash , visa, nomination, nomination reference
//     payment amount , payment type , nomination reference, payment by, payment datetime

//    attendance also goes in trainee_attendance .....
//    attendance also goes in trainer_attendance .....
//    created by createdAt , attendanceDatetime

    protected $fillable = [
        'course_id', 'trainee_id',
        'created_by', 'payment_by',
        'payment_at', 'status',
        'notes', 'payment_amount',
        'payment_type', 'nomination_id',
        'nomination_reference'];

}
