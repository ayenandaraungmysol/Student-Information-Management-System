<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Teacher;
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

        $student_new_grade = $student->grade;
        $student_new_class = $student->class_id;

        if( $student_old_grade ==  $student_new_grade) {
            if($student_old_class != $student_new_class) {
               // $this->notifyTeachers($student_old_class, $student_new_class, $student->grade);
                $old_class_teachers = Teacher::where('class_id',$student_old_class)->where('grade', $student->grade)->get();
                foreach($old_class_teachers as $old_class_teacher)
                {
                    \var_dump($old_class_teacher->class_id);
                    //return response()->json(['success' => 'Successfully Updated Student'.$old_class_teacher->class_id, 200]);
                }

                $new_class_teachers = Teacher::where('class_id',$student_new_class)->where('grade', $student->grade)->get();

                foreach($new_class_teachers as $new_class_teacher)
                {
                    \var_dump($new_class_teacher->class_id);die;

                    //return response()->json(['success' => 'Successfully Updated Student'.$new_class_teacher->class_id, 200]);
                }


            }
        }

    }
    public function notifyTeachers($student_old_class, $student_new_class, $student_grade)
    {
        $old_class_teacher = Teacher::where('class_id',$student_old_class)->where('grade', $student_grade)->get();
        $new_class_teacher = Teacher::where('class_id',$student_new_class)->where('grade', $student_grade)->get();

    }
}
