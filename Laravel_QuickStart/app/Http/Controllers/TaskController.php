<?php
namespace App\Http\Controllers;
use App\Http\Requests\TaskCreateRequest;
use Illuminate\Support\Facades\Validator;
use App\Contracts\Services\UserServiceInterface;

class TaskController extends Controller
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

    public function show(){
        $tasks =  $this->userService->getText();

        return view('task', [
            'task' => $tasks
        ]);
    }

    public function task(TaskCreateRequest $request) {
        $this->userService->createTask($request->only([
            'name',
           
        ]));

        return redirect('/');
      
    }
    public function remove($id) {
        $this->userService->deleteText($id);
        return redirect('/');
    }
}
