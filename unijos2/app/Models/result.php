<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class result extends Model
{
    use HasFactory;
    //declares the listed feilds as fiilable
protected $fillable =(['id','course_name',
'course_code',
'semester',
'session',
'student_name',
'matric_number',
'CA',
'Exam_score',
'grade']);
//relationship declearation between users and results
    public function users(){
        return $this->belongsTo(User::class,'results_users');
    }
}

