<?php

namespace App\Dao;
use App\Models\Major;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Contracts\Dao\UserDaoInterface;
use Illuminate\Support\Facades\Validator;

class UserDao implements UserDaoInterface
{
    public function getName(): object
    {
        return Major::orderBy('created_at', 'asc')->get();
    }
    public function validateName($request): object
    {
        return  Validator::make($request->all(), [
            'name' => 'required|max:255|unique:majors',
        ]);    
    }
    public function getNameById(int $id): object
    {
        return Major::findOrFail($id);
    }
    
    public function updateName(array $data, $id): void
    {
        $majors = Major::findOrFail($id);
        $majors->update([
            'name' => $data['name'],
        ]);
    }
    public function deleteName($majors): void
    {
        $majors->delete();
    }

    public function validateStudent($request): object
    {
        return  Validator::make($request->all(), [
            'name' => 'required|max:255',
            'major'=>'required',
            'phone'=>'required|max:15',
            'email' => 'required|max:255|unique:students',
            'address'=>'required|max:255',
        ]);
    }
    public function getAllStudents(): object{
        return Student::select('students.*','majors.name as subject')
        ->join('majors','students.major_id','majors.id')
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

    public function deleteStudent($students): void
    {
        $students->delete();
    }

}
