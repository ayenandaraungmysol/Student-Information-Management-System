<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Teacher;
use App\Mail\SendMail;
use App\Mail\SendMailToTeacher;
use Exception;

//use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    //Student Creation Page
    public function createStudent()
    {
        $classes = Classes::all();
        return view('system_admin.create_student', ['classes' => $classes]);
    }

    public function store(Request $request)
    {
        $student = new Student;
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        $student->gender = $request->input('gender');
        $student->age = $request->input('age');
        $student->grade = $request->input('grade');
        $student->father_name = $request->input('fatherName');
        $student->address = $request->input('address');
        $student->class_id = (int)$request->input('student_class');
        $student->save();
       // return response()->json(['success' =>"Successfully Added Student", 200]);
       return response()->json(['success' =>"Successfully Added Student", 200]);
    }

    public function index()
    {
        $students = Student::all();
        //$students = Student::paginate(5);
        return view('system_admin.all_students',['students' => $students]);
    }
    public function deleteStudent($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect(route('student.all'));
    }
    public function edit($id)
    {
        $student_info = Student::find($id);
        $classes = Classes::all();
        return view('system_admin.edit_student', ['student' => $student_info, 'classes' => $classes]);
    }
    public function editSave($id, Request $request)
    {
        $student = Student::find($id);

        $student_old_grade = $student->grade;
        $student_old_class = $student->class_id;

        $student_old_class_name = $student->class->class_name;

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

        $student = Student::find($id);
        $student_new_grade = $student->grade;
        $student_new_class = $student->class_id;

        $student_new_class_name = $student->class->class_name;

        if( $student_old_grade ==  $student_new_grade) {
            if($student_old_class != $student_new_class) {
                $old_class_teachers = Teacher::where('class_id',$student_old_class)->where('grade', $student->grade)->get();
                $new_class_teachers = Teacher::where('class_id',$student_new_class)->where('grade', $student->grade)->get();
                $this->notifyTeachers($old_class_teachers, $new_class_teachers, $student, $student_old_class_name);
            }
        }
        return response()->json(['success' => 'Successfully Updated Student', 200]);
    }
    public function notifyTeachers($old_teachers, $new_teachers, $student, $student_old_class_name)
    {

        $old_teacher ='';
        $new_teacher ='';

        foreach($old_teachers as $o_teacher)
        {
            Mail::to('ayenandaraung.mysol@gmail.com')->send(new SendMailToTeacher($student->name, $student->grade, $student_old_class_name, $student->class->class_name,date('Y-m-d'), $o_teacher->name));
            //$old_teacher .='Teacher Name is :'. $o_teacher->name.'Class is :'.$o_teacher->class->class_name;
            //Need To send Email here
        }
        foreach($new_teachers as $n_teacher)
        {
            Mail::to('ayenandaraung.mysol@gmail.com')->send(new SendMailToTeacher($student->name, $student->grade, $student_old_class_name, $student->class->class_name,date('Y-m-d'), $n_teacher->name));
            //$new_teacher .= 'Teacher Name is :'. $n_teacher->name.'Class is :'.$n_teacher->class->class_name;
            //Need To send Email here
        }
        $details = [
            'title' => "Inform the student's class changes",
            'body' => 'This is a Notification Mail for Student'.$student->name.' Class Changing from '.$student_old_class_name.'to'. $student->class->class_name.' Old Teachers are '.$old_teacher.'New Teachers are '.$new_teacher
        ];

        //Mail::to('ayenandaraung.mysol@gmail.com')->send(new SendMail($details));

        return 'Email sent!';
       //return view('home', ['old_teachers' => $old_teachers, 'new_teachers' => $new_teachers]);die;
    }
}
