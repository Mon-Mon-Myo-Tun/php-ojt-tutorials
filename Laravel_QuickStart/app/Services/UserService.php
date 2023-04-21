<?php
namespace App\Services;

use App\Contracts\Dao\UserDaoInterface;
use App\Contracts\Services\UserServiceInterface;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;

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
    public function getText(): object
    {
        return $this->userDao->getText();
    }
    public function validateText($request): object
    {
       return $this->userDao->validateText($request);
    }
    public function deleteText($tasks): void
    {
        $this->userDao->deleteText($tasks);
    }
}
