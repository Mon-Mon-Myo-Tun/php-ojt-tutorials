<?php

namespace App\Contracts\Dao;

interface UserDaoInterface
{
    public function getName(): object;
    public function validateName($request): object;
    public function getNameById(int $id): object;
    public function updateName(array $data,int $id): void;
    public function deleteName($majors): void;
    
    public function validateStudent($request): object;
    public function getAllStudents(): object;
    public function getStudentNameById(int $id): object;
    public function updateStudent(array $data, $id): void;
    public function deleteStudent($students): void;
    public function searchStudent():object;
    
}





