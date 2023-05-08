<?php

namespace App\Dao;

use App\Contracts\Dao\UserDaoInterface;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;

class UserDao implements UserDaoInterface
{
    public function getText(): object
    {
        return Task::orderBy('created_at', 'desc')->get();
    }

    public function createTask(array $data): void
    {
        Task::create([
            'name' => $data['name']
        ]);
    }
    
    public function deleteText($id): void
    {
        $task = Task::findOrFail($id);
        $task->delete();
    }
}
