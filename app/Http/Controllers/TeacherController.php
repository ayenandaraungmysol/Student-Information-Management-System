<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Certificates;
use App\Models\Classes;

class TeacherController extends Controller
{
    //This is for Testing Need to modify these data
    public function create()
    {
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
    public function studentsOfTeacher()
    {
        $teacher_class = Auth::user()->teacher->class_id;
        $teacher_grade = Auth::user()->teacher->grade;
        $students = Student::where('class_id',$teacher_class)->where('grade', $teacher_grade)->get();
        return view('teacher.teacher_all_student',['students' => $students]);
    }
    public function createTeacher()
    {
        $certificates = Certificate::all();
        $classes = Classes::all();
        return view('system_admin.create_teacher',['certificates' => $certificates], ['classes' => $classes]);
    }
    public function saveTeacher(Request $request)
    {
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
            'major_subject' => $request->input('majorSub'),
            'grade' => $request->input('grade'),
            'designation' => $request->input('designation'),
            'class_id' => $request->input('teacher_class'),
        ]);
        //insert as a user
        $user->teacher()->save($teacher);

        $certificates = $request->input('certificates');

        //insert teacher's certificates into certificate table
        $teacher->certificates()->attach($certificates);

        return response()->json(['success' =>"Successfully Added Teacher", 200]);;
    }
    public function detail()
    {
        $teacher_info = Teacher::find(Auth::user()->teacher->id);
        $teacher = Teacher::findOrFail(Auth::user()->teacher->id);
        $certificates = $teacher->certificates;
        return view('teacher.profile', ['teacher_info' => $teacher_info], ['certificates' => $certificates]);
    }
    public function delete($id)
    {
        $teacher = Teacher::find($id);
        //if we want to delete teacher, we need to delete user table's data too!!! So. if we delete user table's data we don't need to delete teacher table's data
        //because we declare user_id in teacher table >>>> $table->foreignId('user_id')->constrained()->onDelete('cascade'); this line means that delete in user table the record also delete in teacher table
        $user = User::find($teacher->user_id);
        $user->delete();
        return \redirect()->route('teacher.all');
    }
    public function updateTeacher($id)
    {
        $teacher_info = Teacher::find($id);
        $classes = Classes::all();
        $certificates = Certificate::all();//
        $teacher_certificates = $teacher_info->certificates;
        $t_c_arr =($teacher_info->certificates)->toArray();//Convert Collection to Array

        /** This is for debugging start */
        //print_r($t_c_arr);
        // $check_val = '';
        // foreach($teacher_certificates as $t_certificate) {
        //     if(\in_array($t_certificate->certificates_name,$t_c_arr))
        //         \var_dump('inside if');
        //         $check_val .=$t_certificate->certificates_name;
        // }
        //echo ($check_val);die;
         /** This is for debugging end */

        return view('system_admin.update_teacher', ['teacher_info' => $teacher_info, 'classes' => $classes, 'certificates' => $certificates, 'teacher_certificates' => $teacher_certificates, 't_c_arr' => $t_c_arr]);//, 'teacher_certificates' => $teacher_certificates->toArray()['classes' => $classes], ['teacher_certificates' => $teacher_certificates]
    }
    //Teacher Information Updeate to Database
    public function updateSave($id, Request $request)
    {

        $teacher = Teacher::find($id);
        //update user table
        $teacher->user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role_id' => 2,
        ]);
        //update teacher table
        $teacher->name = $request->input('name');
        $teacher->email = $request->input('email');
        $teacher->password = bcrypt($request->input('password'));
        $teacher->phone = $request->input('phone');
        $teacher->address = $request->input('address');
        $teacher->gender = $request->input('gender');
        $teacher->age = $request->input('age');
        $teacher->major_subject =  $request->input('majorSub');
        $teacher->grade = $request->input('grade');
        $teacher->designation = $request->input('designation');
        $teacher->class_id = $request->input('teacher_class');
        $teacher->update();
        //update certificates table
        $certificates = $request->input('certificates');
        $teacher->certificates()->sync($certificates);
        return response()->json(['success' =>"Successfully Updated Teacher", 200]);
    }
    public function editStudent($id)
    {
        $student_info = Student::find($id);
        $classes = Classes::all();
        return view('teacher.t_student_edit', ['student' => $student_info, 'classes' => $classes]);
    }
    public function editSaveStudent($id, Request $request)
    {
        $student = Student::find($id);
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        $student->gender = $request->input('gender');
        $student->age = $request->input('age');
        $student->grade = $request->input('grade');
        $student->father_name = $request->input('fatherName');
        $student->address = $request->input('address');
        $student->class_id = (int)$request->input('student_class');
        $student->update();
        return response()->json(['success' => "Successfully Updated Student", 200]);
    }
    
    //Testing Method
    public function manytomany()
    {
        $teacher = Teacher::find(14);
        foreach($teacher->certificates as $certificate) {
            echo($certificate->certificates_name."<br>");
        }
    }
}
