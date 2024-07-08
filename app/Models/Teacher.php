<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'email',
        'password',
        'phone',
        'address',
        'gender',
        'age',
        'major_subject',
        'grade',
        'designation',
        'class_id',

    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function class(){
        return $this->belongsTo(Classes::class, 'class_id');
    }
    public function certificates(){
        return $this->belongsToMany(Certificate::class);
    }

}
