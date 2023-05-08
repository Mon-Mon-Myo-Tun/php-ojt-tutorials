<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Major extends Model
{
    use HasFactory;
    protected $fillable = ['id','name','created-at','updated-at'];

    public function student()
    {
        return $this->hasMany(Student::class);
    }
}
