<?php

namespace App\Contracts\Dao;

interface MajorDaoInterface

{   public function createMajor(array $data): void;
    public function getName(): object;
    public function getNameById(int $id): object;
    public function updateName(array $data,int $id): void;
    public function deleteName($majors): void;
}





