<?php
namespace App\Dao;

use App\Models\Major;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Contracts\Dao\MajorDaoInterface;
use Illuminate\Support\Facades\Validator;

class MajorDao implements MajorDaoInterface
{   
    public function createMajor(array $data): void
    {
        Major::create([
            'name' => $data['name'],
        ]);
    }
    
    public function getName(): object
    {
        return Major::orderBy('created_at', 'desc')->get();
    }
    
    public function getNameById(int $id): object
    {
        return Major::findOrFail($id);
    }
    
    public function updateName(array $data, $id): void
    {
        $majors = Major::findOrFail($id);
        $majors->update([
            'name' => $data['name'],
        ]);
    }
    public function deleteName($id): void
    {
        $major = Major::findOrFail($id);
        $major->delete();
    }

}
