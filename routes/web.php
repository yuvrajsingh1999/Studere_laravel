<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Faculty Controllers

Route::get('/faculty', [App\Http\Controllers\FacultyController::class, 'index'])->name('faculty');
Route::get('/facultyprofile', [App\Http\Controllers\FacultyController::class, 'create'])->name('facultyprofile');
Route::post('/profile', [App\Http\Controllers\FacultyController::class, 'store']);
Route::get('/enterprofile', [App\Http\Controllers\FacultyController::class, 'show'])->name('enterprofile');
Route::get('/attendence', [App\Http\Controllers\FacultyController::class, 'attendence']);
Route::get('/stumarkatt', [App\Http\Controllers\FacultyController::class, 'markStuAttendence']);
Route::get('/facmarkatt', [App\Http\Controllers\FacultyController::class, 'markFacAttendence']);
Route::post('/stuattendence', [App\Http\Controllers\AttendenceController::class, 'store']);
Route::post('/markfacattendence', [App\Http\Controllers\FacultyAttenController::class, 'store']);
Route::get('/uploadmaterial', [App\Http\Controllers\CourseController::class, 'uploadmat']);
Route::get('upload', 'App\Http\Controllers\MaterialsController@createForm');
Route::post('upload', [App\Http\Controllers\MaterialsController::class, 'fileUpload'])->name('fileUpload');

//student Controller

Route::get('/stutimetable', [App\Http\Controllers\StudentController::class, 'stuTimeTable']);
Route::get('/student', [App\Http\Controllers\StudentController::class, 'index'])->name('student');
Route::get('/studentprofile', [App\Http\Controllers\StudentController::class, 'create'])->name('studentprofile');
Route::post('/stuprofile', [App\Http\Controllers\StudentController::class, 'store']);
Route::get('/enterstuprofile', [App\Http\Controllers\StudentController::class, 'show'])->name('enterstuprofile');
Route::get('/showatten', [App\Http\Controllers\AttendenceController::class, 'show']);
Route::post('/stuatten', [App\Http\Controllers\AttendenceController::class, 'show']);
Route::get('/showmaterial', [App\Http\Controllers\CourseController::class, 'showmat']);
Route::get('/download', 'App\Http\Controllers\MaterialsController@showStudent');
Route::get('/file-download', 'App\Http\Controllers\MaterialsController@fileDownload');
Route::get('/viewfile/{id}', 'App\Http\Controllers\MaterialsController@fileView');


//Admin Controller

Route::get('/admin', [App\Http\Controllers\UserChartController::class, 'index'])->name('admin');
Route::get('accept/{id}', [App\Http\Controllers\AdminsController::class, 'create'])->name('accept');
Route::get('/requestaccount', [App\Http\Controllers\AdminsController::class, 'show'])->name('request');
Route::get('/mailadmin', [App\Http\Controllers\AdminsController::class, 'mailAdmin']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/teamShow', 'App\Http\Controllers\AdminsController@teamShow');

Route::get('/support', 'App\Http\Controllers\HomeController@support');
///timetable


Route::get('courses', 'App\Http\Controllers\CourseController@index')->name('courses');
Route::get('courses/store', 'App\Http\Controllers\CourseController@store')->name('course.store');
// Route::get('courses/show', 'App\Http\Controllers\CourseController@show')->name('courses.show');

Route::get('departments', 'App\Http\Controllers\DepartmentsController@index')->name('departments');
Route::post('departments/store', 'App\Http\Controllers\DepartmentsController@store')->name('department.store');
Route::delete('departments/remove/{id}', 'App\Http\Controllers\DepartmentsController@remove')->name('department.remove');
Route::get('time-table', 'App\Http\Controllers\TimeTableController@index')->name('timetable.index');
Route::get('/showtime', 'App\Http\Controllers\TimeTableController@showAll')->name('timetable.showAll');

Route::get('generate', 'App\Http\Controllers\TimeTableController@generate');

Route::get('level', 'App\Http\Controllers\LevelsController@index')->name('level');

Route::get('venues', 'App\Http\Controllers\VenuesController@index')->name('venues');
Route::post('venues/store', 'App\Http\Controllers\VenuesController@store')->name('venue.store');

Route::get('settings', 'App\Http\Controllers\SettingsController@index')->name('settings');
Route::post('settings/store', 'App\Http\Controllers\SettingsController@store')->name('settings.store');

//mails
Route::post('send-mail', [App\Http\Controllers\ContactController::class, 'sendMail']);
Route::get('/contact-form', [App\Http\Controllers\ContactController::class, 'showForm']);
Route::post('/contact-form', [App\Http\Controllers\ContactController::class, 'storeForm'])->name('contact.save');
Route::get("email", [App\Http\Controllers\HomeController::class, "composeEmail"])->name("email");

Route::get("email", [App\Http\Controllers\HomeController::class, "composeEmail"])->name("email");

