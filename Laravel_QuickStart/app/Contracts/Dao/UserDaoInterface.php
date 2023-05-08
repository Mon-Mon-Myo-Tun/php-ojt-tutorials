<?php

namespace App\Contracts\Dao;

interface UserDaoInterface
{
    public function getText(): object;
    public function createTask(array $data): void;
    public function deleteText($id): void;
}
