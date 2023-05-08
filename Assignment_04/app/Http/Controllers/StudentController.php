<?php
namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Major;
use App\Http\Requests\StudentCreateRequest;
use App\Http\Requests\StudentUpdateRequest;
use App\Contracts\Services\StudentServiceInterface;
use App\Contracts\Services\MajorServiceInterface;
class StudentController extends Controller
{
    private $studentService;
    private $majorService;

    /**
     * Create a new controller instance.
     * @param studentServiceInterface $studentServiceInterface
     * @return void
     */
    public function __construct(StudentServiceInterface $studentServiceInterface,MajorServiceInterface $majorServiceInterface)
    {
        $this->studentService = $studentServiceInterface;
        $this->majorService = $majorServiceInterface;
    }

    public function create() 
    {
        $major=Major::select('id','name')->get();
        return view('studentCreate', [
            'major' => $major
        ]);
    }

    public function store(StudentCreateRequest $request) { 
        $this->studentService->createStudent($request->only([
            'name',
            'major',
            'phone',
            'email',
            'address',
        ]));
            return redirect()->route('student#list');
    }

    public function show(){
        $student = $this->studentService->getAllStudents();
        return view('student', [
            'student' => $student
        ]);
        
    }

    public function edit($id) {
        $major = $this->majorService->getName();
        $user = $this->studentService->getStudentNameById($id);
        return view('studentEdit',compact('user'),[
            'major' => $major
        ]);
    }
    
    public function update(StudentUpdateRequest $request, $id) {
       
        $this->studentService->updateStudent($request->only([
            'name','major','phone','email','address',
        ]), $id);
        return redirect()->route('student#list');
    }

    public function destory($id) {
        $this->studentService->deleteStudent($id);
        session()->flash('success', 'The student has been successfully deleted.');
        return redirect()->route('student#list');
    }
    

}
