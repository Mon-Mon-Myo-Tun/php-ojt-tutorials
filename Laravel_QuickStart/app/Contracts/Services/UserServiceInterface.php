<?php
namespace App\Contracts\Services;

interface UserServiceInterface
{
    public function getText(): object;
    public function createTask(array $data): void;
    public function deleteText($id): void;
}
