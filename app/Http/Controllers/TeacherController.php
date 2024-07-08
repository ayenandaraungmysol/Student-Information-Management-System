<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Certificates;

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
    public function createTeacher(){
        $certificates = Certificate::all();
        return view('system_admin.create_teacher',['certificates' => $certificates]);
    }
    public function saveTeacher(Request $request){
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role_id' => 2,
        ]);
        $teacher = new Teacher([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'gender' => $request->input('gender'),
            'age' => $request->input('age'),
            'major_subject' => $request->input('major_sub'),
            'grade' => $request->input('grade'),
            'designation' => $request->input('designation'),
            'class_id' => $request->input('class_id'),
        ]);
        $user->teacher()->save($teacher);
        $certificates = $request->input('certificates');

        // foreach ($validated['certificates'] as $certificateName) {
        //     $certificate = Certificate::firstOrCreate(['name' => $certificateName]);
        //     $certificates[] = $certificate->id;
        // }

        $teacher->certificates()->attach($certificates);


        return "done";
    }
}
