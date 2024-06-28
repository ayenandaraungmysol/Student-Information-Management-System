<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;
    protected $fillable =['class_name'];

    public function students(){
        return $this->hasMany(Student::class, 'class_id');
    }
    public function teachers(){
        return $this->hasMany(Teacher::class, 'class_id');
    }

}