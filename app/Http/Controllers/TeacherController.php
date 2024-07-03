<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Student;

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
        $teacher_class = Auth::user()->teacher->class_id;
        $teacher_grade = Auth::user()->teacher->grade;
        $students = Student::where('class_id',$teacher_class)->where('grade', $teacher_grade)->get();
        return view('teacher.teacher_all_student',['students' => $students]);
    }
}
