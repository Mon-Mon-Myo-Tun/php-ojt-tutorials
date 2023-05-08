<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Major;
use App\Http\Requests\MajorCreateRequest;
use App\Http\Requests\MajorUpdateRequest;
use App\Contracts\Services\MajorServiceInterface;

class MajorController extends Controller
{
    private $majorService;
     /**
     * Create a new controller instance.
     * @param majorServiceInterface $majorServiceInterface
     * @return void
     */
    public function __construct(MajorServiceInterface $majorServiceInterface)
    {
        $this->majorService = $majorServiceInterface;
    }
    
    

    public function create(){
        return view ('majorCreate');
    }
    
    public function store(MajorCreateRequest $request) 
    {
        $this->majorService->createMajor($request->only([
            'name',
        ]));
        return redirect()->route('show#list');
        
    }

    public function show() 
    {
        $major=$this->majorService->getName();
        return view('major', [
            'major' => $major
        ]);
    }
    public function edit($id){
        $user = $this->majorService->getNameById($id);
        return view('majorEdit',compact('user'));
    }

    public function destory($id){
        $this->majorService->deleteName($id);
        session()->flash('successDelete', 'The major has been successfully deleted.');
        return redirect()->route('show#list');
    }
    
    public function update(MajorUpdateRequest $request, $id){
        $this->majorService->updateName($request->only([
            'name',
        ]), $id);
        return redirect()->route('show#list');
             
    }
}
