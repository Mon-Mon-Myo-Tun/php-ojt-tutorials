<?php
namespace App\Dao;

use App\Models\Student;
use App\Models\Major;
use Illuminate\Http\Request;
use App\Contracts\Dao\StudentDaoInterface;
use Illuminate\Support\Facades\Validator;

class StudentDao implements StudentDaoInterface
{
    public function validateStudent($request): object
    {
        return  Validator::make($request->all(), [
            
        ]);
    }

    public function createStudent(array $data): void
    {
        student::create([
            'name' => $data['name'],
            'phone'=>$data['phone'],
            'major_id' =>$data['major'],
            'email'=>$data['email'],
            'address'=>$data['address'],
        ]);
       
    }
    
    
    public function getAllStudents(): object{
        return Student::select('students.*','majors.name as subject')
        ->join('majors','students.major_id','majors.id')
        ->orderby('students.created_at','desc')
        ->get();
        dd($data[0]->toArray());
    }
    public function getStudentNameById(int $id): object
    {
        return Student::findOrFail($id);
    }
    public function updateStudent(array $data, $id): void
    {
        $students = Student::findOrFail($id);
        $students->update([
            'name' => $data['name'],
            'major_id' => $data['major'],
            'phone'=>$data['phone'],
            'email'=>$data['email'],
            'address'=>$data['address'],
          
        ]);
    }

    public function deleteStudent($id): void
    {
        $students = Student::findOrFail($id);
        $students->delete();
    }

}
