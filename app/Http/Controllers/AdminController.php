<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use App\Models\Teacher;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function create()
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => bcrypt('password'),
            'role_id' => 1,
        ]);
        $admin = new Admin([
            'name' => 'John Doe',
            'gender' => 'Male',
            'email' => 'john.doe@example.com',
            'password' => bcrypt('password'),
            'phone' => '0933454354',
            'address' => 'Yangon',

        ]);
        // $teacher = new Teacher([
        //     'name' => 'John Doe',
        //     'email' => 'john.doe@example.com',
        //     'password' => bcrypt('password'),
        //     'phone' => '09401841526',
        //     'address' => 'Myeik',
        //     'gender' => 'Male',
        //     'age' => '20',
        //     'major_subject' =>'Mathematics',
        //     'grade' =>'10',
        //     'designation' =>'family teacher',
        //     'class_id' => 1,

        // ]);
        $user->admin()->save($admin);
        return 'done';

    }
    public function teachers()
    {
        $teachers = Teacher::all();
        //$teachers = Teacher::paginate(5);
        return \view('system_admin.all_teachers',['teachers' => $teachers]);
    }
}
