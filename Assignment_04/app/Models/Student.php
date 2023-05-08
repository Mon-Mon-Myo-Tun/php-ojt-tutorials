<?php

namespace App\Models;
use App\Models\Major;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Student extends Model
{
    use HasFactory;
    protected $fillable = ['id','name','major_id','phone','email','address','created-at','updated-at'];

    public function major()
    {
        return $this->belongsTo(Major::class);
    }
}
