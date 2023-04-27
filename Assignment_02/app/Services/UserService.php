<?php
namespace App\Services;

use App\Contracts\Dao\UserDaoInterface;
use App\Contracts\Services\UserServiceInterface;
use App\Models\Major;
use Illuminate\Support\Facades\Validator;
use App\Models\Student;

/**
 * User Service class
 */
class UserService implements UserServiceInterface
{
    private $userDao;

    public function __construct(UserDaoInterface $userDao)
    {
        $this->userDao = $userDao;
    }
    public function getName(): object
    {
        return $this->userDao->getName();
    }
    
    public function validateName($request): object
    {
       return $this->userDao->validateName($request);
    }
    public function deleteName($majors): void
    {
        $this->userDao->deleteName($majors);
    }
    public function getNameById(int $id): object
    {
        return $this->userDao->getNameById($id);
    }
    public function updateName(array $data, int $id): void
    {
        $this->userDao->updateName($data, $id);
    }

    public function validateStudent($request): object
    {
       return $this->userDao->validateStudent($request);
    }

    public function getAllStudents(): object
    {
        return $this->userDao->getAllStudents();
    }

    public function getStudentNameById(int $id): object
    {
        return $this->userDao->getStudentNameById($id);
    }
    
    public function updateStudent(array $data, $id): void

    {
        $this->userDao->updateStudent($data, $id);
    }

    public function deleteStudent($students): void{
        $this->userDao->deleteStudent($students);
    }
}
