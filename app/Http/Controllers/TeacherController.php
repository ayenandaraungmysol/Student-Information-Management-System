<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Teacher;
class TeacherController extends Controller
{
    //This is for Testing Need to modify these data
    public function create(){
        $user = User::create([
            'name' => 'ANDA',
            'email' => 'anda.app@example.com',
            'password' => bcrypt('password'),
            'role_id' => 2,
        ]);
        $teacher = new Teacher([
            'name' => 'ANDA',
            'email' => 'anda.app@example.com',
            'password' => bcrypt('password'),
            'phone' => '09401841526',
            'address' => 'Myeik',
            'gender' => 'Female',
            'age' => '26',
            'major_subject' => 'English',
            'grade' => '10',
            'designation' => 'Family Teacher',
            'class_id' => 1,
        ]);
        $user->teacher()->save($teacher);
        return 'done';
    }
    public function studentsOfTeacher(){

    }
}
