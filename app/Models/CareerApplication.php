<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerApplication extends Model
{
    protected $fillable = [
     'career_id','name','email','phone','address',
    'position_applied','years_experience','previous_work',
    'key_responsibilities','expertise','extra_skills',
    'highest_qualification','degree_details','other_certifications',
    'joining_availability','working_mode',
    'preferred_exams','other_details',
    'roles','skills','resume','achievements'
    ];

   public function career()
{
    return $this->belongsTo(Career::class, 'career_id');
}
}
