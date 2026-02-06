<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseRegistration extends Model
{
   protected $fillable = [
        'student_id',
        'name',
        'email',
        'phone',
        'alt_phone',
        'center',
        'course_type',
        'dob',
        'roll_no',
        'community',
        'employed',
        'aadhaar_path',
        'payment_id',
    ];

    public function payment()
{
    return $this->belongsTo(\App\Models\Payment::class, 'payment_id');
}
}
