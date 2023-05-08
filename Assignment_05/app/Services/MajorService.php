<?php
namespace App\Services;

use App\Contracts\Dao\MajorDaoInterface;
use App\Contracts\Services\MajorServiceInterface;
use App\Models\Major;
/**
 * User Service class
 */
class MajorService implements MajorServiceInterface
{
    private $MajorDao;

    public function __construct(MajorDaoInterface  $MajorDao)
    {
        $this->MajorDao =  $MajorDao;
    }
    public function createMajor(array $data): void{
        $this->MajorDao->createMajor($data);
    }
    public function getName(): object
    {
        return $this->MajorDao->getName();
    }
    
    public function deleteName($id): void
    {
        $this->MajorDao->deleteName($id);
    }

    public function getNameById(int $id): object
    {
        return $this->MajorDao->getNameById($id);
    }
    
    public function updateName(array $data, int $id): void
    {
        $this->MajorDao->updateName($data, $id);
    }

}
