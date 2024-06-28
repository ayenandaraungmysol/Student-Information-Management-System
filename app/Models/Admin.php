<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'gender',
        'email',
        'password',
        'phone',
        'address'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
