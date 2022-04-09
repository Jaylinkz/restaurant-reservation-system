<?php

namespace App\Exports;

use App\Models\result;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class resultsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return result::all();
        //return result::select('id','course_name',
       // 'course_code',
        //'semester',
        //'session',
        //'student_name',
        //'matric_number',
        //'CA',
        //'Exam_score',
        //'grade');
    }


public function headings():array{
    return['id','course_name',
    'course_code',
    'semester',
    'session',
    'student_name',
    'matric_number',
    'CA',
    'Exam_score',
    'grade'];
}
}
