<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Task;
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

    public function task(Request $request) {
        $validator =  $this->userService->validateText($request);
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        else {
            $task = new Task;
            $task->name = $request->name;
            $task->save();

        return redirect('/');
        }
    }
    public function remove(Task $tasks) {
        $this->userService->deleteText($tasks);
        return redirect('/');
    }
}
