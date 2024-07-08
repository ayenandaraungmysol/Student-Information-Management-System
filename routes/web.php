<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//login page and redirect
Route::get('/', function () {
    if(Auth::check()){
        if(Auth::user()->role->role_name === 'Admin'){
            return view('system_admin.sys_admin');
        }
        else return view('teacher.teacher_home');
    }
    return view('auth.login');
});
//Admin's route
Route::get('/admin/create', [App\Http\Controllers\StudentController::class, 'createStudent']);
Route::post('/admin/createSave', [App\Http\Controllers\StudentController::class, 'store'])->name('student.store');
Route::get('/admin/students', [App\Http\Controllers\StudentController::class, 'index'])->name('student.all');
Route::get('/admin/teachers',[App\Http\Controllers\AdminController::class,'teachers'])->name('teacher.all');
Route::get('/admin/insert',[\App\Http\Controllers\TeacherController::class,'createTeacher']);
Route::get('/admin/insertSave',[\App\Http\Controllers\TeacherController::class,'saveTeacher']);

//Teacher's route
Route::get('/teacher/students',[\App\Http\Controllers\TeacherController::class,'studentsOfTeacher'])->name('teacher.students');





//======================== Testing Route ==========================//

Route::get('/insert', [App\Http\Controllers\AdminController::class, 'create']);//testing route later use
Route::get('/create', [App\Http\Controllers\TeacherController::class, 'create']);//testing route later use

Route::get('/admin', function () {
    return view('system_admin.sys_admin');
});

Route::get('/teacher', function () {
    return view('teacher.teacher_home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
