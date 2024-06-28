<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'gender',
        'age',
        'grade',
        'father_name',
        'address',
        'class_id',
    ];
    public function class(){
        return $this->belongsTo(Classes::class, 'class_id');
    }

}
