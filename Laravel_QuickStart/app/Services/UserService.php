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
    
    public function createTask(array $data): void
    {
        $this->userDao->createTask( $data);
    }

    public function deleteText($id): void
    {
        $this->userDao->deleteText($id);
    }
}
