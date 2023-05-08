<?php
namespace App\Contracts\Services;
interface MajorServiceInterface
{
    public function createMajor(array $data): void;
    public function getName(): object;
    public function getNameById(int $id): object;
    public function updateName(array $data,int $id): void;
    public function deleteName($id): void;
}



