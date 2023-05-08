<?php

namespace App\Exports;

use App\Models\Major;
use App\Models\Student;
use App\Exports\StudentsExport;
use Maatwebsite\Excel\Concerns\FromCollection;

class StudentsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Student::select('students.*','majors.name as major_name')
        ->join('majors','students.major_id','majors.id')
        ->get();
        
    }
}
