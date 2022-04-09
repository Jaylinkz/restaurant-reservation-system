<?php
namespace App\Imports;

use App\Models\result;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class resultsImport implements ToModel,WithHeadings
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new result([
            'course_name'=>$row[0],
            'course_code'=>$row[1],
            'semester'=>$row[2],
            'session'=>$row[3],
            'student_name'=>$row[4],
            'matric_number'=>$row[5],
            'CA'=>$row[6],
            'Exam_score'=>$row[7],
            'grade'=>$row[8],
        ]);
    }
}
