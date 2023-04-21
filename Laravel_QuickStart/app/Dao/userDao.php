<?php

namespace App\Dao;

use App\Contracts\Dao\UserDaoInterface;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;

class UserDao implements UserDaoInterface
{
    public function getText(): object
    {
        return Task::orderBy('created_at', 'asc')->get();
    }

    public function validateText($request): object
    {
        return  Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);
    }

    public function deleteText($tasks): void
    {
        $tasks->delete();
    }
}
