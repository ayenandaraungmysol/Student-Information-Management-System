<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Classes;
use App\Models\Student;
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
        return view('system_admin.all_students',['students' => $students]);
    }
}
