<?php

namespace App\Contracts\Dao;

interface StudentDaoInterface
{
    public function createStudent(array $data): void;
    public function getAllStudents(): object;
    public function getStudentNameById(int $id): object;
    public function updateStudent(array $data, $id): void;
    public function deleteStudent($students): void;
    
}
