<?php
namespace App\Http\Controllers;
use App\Models\Major;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Contracts\Services\UserServiceInterface;

class StudentController extends Controller
{
    private $userService;

    /**
     * Create a new controller instance.
     * @param UserServiceInterface $userServiceInterface
     * @return void
     */
    public function __construct(UserServiceInterface $userServiceInterface)
    {
        $this->userService = $userServiceInterface;
    }

    public function CreateMajor() {
        return view('createMajor');
    }
    
    public function AddMajor(Request $request) 
    {
        $validator= $this->userService->validateName($request);
        if ($validator->fails()) 
        {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        else 
        {
            $major = new Major();
            $major->name = $request->name;
            $major->save();

        return redirect('/createstudent');
        }
    }

    public function ShowMajorList() 
    {
        $major=$this->userService->getName();
        return view('major', [
            'major' => $major
        ]);
    }

    public function EditMajor($id){
        $user = $this->userService->getNameById($id);
        return view('editMajor',compact('user'));
    }

    public function RemoveMajor(major $majors){
        $this->userService->deleteName($majors);
        session()->flash('successDelete', 'The major has been successfully deleted.');
        return redirect()->route('show#list');
    }
    
    public function UpdateMajor(Request $request, $id){
        $this->userService->updateName($request->only([
            'name',
        ]), $id);
        return redirect()->route('show#list');
             
    }
    public function CreateStudent() 
    {
        $major=$this->userService->getName();
        return view('createStudent', [
            'major' => $major
        ]);
    }

    public function AddStudent(Request $request) {
        $validator= $this->userService->validateStudent($request);
        if ($validator->fails())
        {
            return redirect('/createstudent')
                ->withInput()
                ->withErrors($validator);
        }
        else 
        {
            $student = new Student();
            $student->name = $request->name;

            $major = Major::where('name', $request->major)->first();
            if ($major) {
                $student->major_id = $major->id;
            } else {
                return redirect('/createstudent')
                    ->withInput()
                    ->withErrors(['major' => 'Invalid major selected']);
            }
            $student->phone= $request->phone;
            $student->email = $request->email;
            $student->address = $request->address;
            $student->save();
            return redirect('/studentlist');
        }
    }

    public function ShowStudentList(){
        $student = $this->userService->getAllStudents();
        return view('student', [
            'student' => $student
        ]);
        
    }

    public function EditStudentList($id) {
        $major = $this->userService->getName();
        $user = $this->userService->getStudentNameById($id);
        return view('editStudent',compact('user'),[
            'major' => $major
        ]);
    }
    
    public function UpdateStudent(Request $request, $id) {
       
        $this->userService->updateStudent($request->only([
            'name','major','phone','email','address',
        ]), $id);
        return redirect()->route('student#list');
    }

    public function RemoveStudent(Student $students) {
        $this->userService->deleteStudent($students);
        session()->flash('success', 'The student has been successfully deleted.');
        return redirect()->route('student#list');
    }
    

}
