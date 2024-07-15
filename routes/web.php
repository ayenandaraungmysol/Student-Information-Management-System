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
Route::get('/admin/create', [\App\Http\Controllers\StudentController::class, 'createStudent']);
Route::post('/admin/createSave', [\App\Http\Controllers\StudentController::class, 'store'])->name('student.store');
Route::get('/admin/students', [\App\Http\Controllers\StudentController::class, 'index'])->name('student.all');
Route::get('/admin/teachers', [\App\Http\Controllers\AdminController::class,'teachers'])->name('teacher.all');
Route::get('/admin/insert', [\App\Http\Controllers\TeacherController::class,'createTeacher']);
Route::post('/admin/insertSave', [\App\Http\Controllers\TeacherController::class,'saveTeacher'])->name('teacher.store');
Route::post('/admin/teachers/{id}', [\App\Http\Controllers\TeacherController::class,'delete'])->name('teacher.delete');
Route::post('/admin/students/{id}',  [\App\Http\Controllers\StudentController::class, 'deleteStudent'])->name('student.delete');
Route::get('/admin/updateTeacher/{id}', [\App\Http\Controllers\TeacherController::class,'updateTeacher'])->name('teacher.update');
Route::post('/admin/teacherSaveUpdate/{id}',  [\App\Http\Controllers\TeacherController::class,'updateSave'])->name('teacher.updateSave');
Route::get('/admin/student/{id}', [\App\Http\Controllers\StudentController::class, 'edit'])->name('student.edit');
Route::post('/admin/studentSaveEdit/{id}', [\App\Http\Controllers\StudentController::class, 'editSave'])->name('student.editSave');

//Teacher's route
Route::get('/teacher/students', [\App\Http\Controllers\TeacherController::class,'studentsOfTeacher'])->name('teacher.students');
Route::get('/teacher/details', [\App\Http\Controllers\TeacherController::class, 'detail'])->name('teacher.profile');





//======================== Testing Route ==========================//
Route::get('/manytomany',[\App\Http\Controllers\TeacherController::class,'manytomany']);

Route::get('/insert', [\App\Http\Controllers\AdminController::class, 'create']);//testing route later use
Route::get('/create', [\App\Http\Controllers\TeacherController::class, 'create']);//testing route later use

Route::get('/admin', function () {
    return view('system_admin.sys_admin');
});

Route::get('/teacher', function () {
    return view('teacher.teacher_home');
});

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
