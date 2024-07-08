<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;
    protected $fillable =['certificates_name'];
    public function teachers(){
        return $this->belongsToMany(Teacher::class);
    }
}
