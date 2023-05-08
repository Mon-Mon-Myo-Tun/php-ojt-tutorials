<?php
namespace App\Services;

use App\Contracts\Dao\StudentDaoInterface;
use App\Contracts\Services\StudentServiceInterface;
use App\Models\Student;

/**
 * User Service class
 */
class StudentService implements StudentServiceInterface
{
    private $studentDao;

    public function __construct(StudentDaoInterface  $studentDao)
    {
        $this->studentDao =  $studentDao;
    }
    

    public function createStudent(array $data): void{
        $this->studentDao->createStudent($data);
    }

    public function getAllStudents(): object
    {
        return $this->studentDao->getAllStudents();
    }

    public function getStudentNameById(int $id): object
    {
        return $this->studentDao->getStudentNameById($id);
    }
    
    public function updateStudent(array $data, $id): void

    {
        $this->studentDao->updateStudent($data, $id);
    }

    public function deleteStudent($id): void{
        $this->studentDao->deleteStudent($id);
    }
}
