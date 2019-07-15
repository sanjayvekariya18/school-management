<?php

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

Route::get('/master', function () {
    return view('layouts.master');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// admin

Route::get('admin/dashboard','admin\DashboardController@index');

Route::post('admin/student/action','admin\StudentController@action');
Route::resource('admin/student','admin\StudentController');

Route::post('admin/stream/action','admin\StreamController@action');
Route::resource('admin/stream','admin\StreamController');

Route::post('admin/semester/action','admin\SemesterController@action');
Route::resource('admin/semester','admin\SemesterController');

Route::post('admin/divison/action','admin\DivisonController@action');
Route::resource('admin/divison','admin\DivisonController');

Route::post('admin/subject/action','admin\SubjectController@action');
Route::resource('admin/subject','admin\SubjectController');

Route::post('admin/faculty/action','admin\FacultyController@action');
Route::resource('admin/faculty','admin\FacultyController');

Route::post('admin/faculty_subject/action','admin\FacultySubjectController@action');
Route::resource('admin/faculty_subject','admin\FacultySubjectController');

// Route::post('admin/test/action','admin\TestController@action');
// Route::resource('admin/test','admin\TestController');

Route::post('admin/category/action','admin\CategoryController@action');
Route::resource('admin/category','admin\CategoryController');

Route::post('admin/mcq_question/action','admin\McqQuestionController@action');
Route::resource('admin/mcq_question','admin\McqQuestionController');

Route::post('admin/tof_question/action','admin\TofQuestionController@action');
Route::resource('admin/tof_question','admin\TofQuestionController');

Route::post('admin/para_list/action','admin\ParaListController@action');
Route::resource('admin/para_list','admin\ParaListController');

Route::post('admin/test/action','admin\TestController@action');
Route::resource('admin/test','admin\TestController');

Route::post('admin/schedule/action','admin\ScheduleController@action');
Route::resource('admin/schedule','admin\ScheduleController');

Route::post('admin/enroll_student/action','admin\EnrollStudentController@action');
Route::resource('admin/enroll_student','admin\EnrollStudentController');

Route::post('admin/test_question/action','admin\TestQuestionController@action');
Route::resource('admin/test_question','admin\TestQuestionController');

// faculty

Route::get('faculty/dashboard','faculty\DashboardController@index');

Route::post('faculty/student/action','faculty\StudentController@action');
Route::resource('faculty/student','faculty\StudentController');

Route::post('faculty/stream/action','faculty\StreamController@action');
Route::resource('faculty/stream','faculty\StreamController');

Route::post('faculty/semester/action','faculty\SemesterController@action');
Route::resource('faculty/semester','faculty\SemesterController');

Route::post('faculty/divison/action','faculty\DivisonController@action');
Route::resource('faculty/divison','faculty\DivisonController');

Route::post('faculty/subject/action','faculty\SubjectController@action');
Route::resource('faculty/subject','faculty\SubjectController');

Route::post('faculty/faculty/action','faculty\FacultyController@action');
Route::resource('faculty/faculty','faculty\FacultyController');

Route::post('faculty/faculty_subject/action','faculty\FacultySubjectController@action');
Route::resource('faculty/faculty_subject','faculty\FacultySubjectController');

// Route::post('faculty/test/action','faculty\TestController@action');
// Route::resource('faculty/test','faculty\TestController');

Route::post('faculty/category/action','faculty\CategoryController@action');
Route::resource('faculty/category','faculty\CategoryController');

Route::post('faculty/mcq_question/action','faculty\McqQuestionController@action');
Route::resource('faculty/mcq_question','faculty\McqQuestionController');

Route::post('faculty/tof_question/action','faculty\TofQuestionController@action');
Route::resource('faculty/tof_question','faculty\TofQuestionController');

Route::post('faculty/para_list/action','faculty\ParaListController@action');
Route::resource('faculty/para_list','faculty\ParaListController');

Route::post('faculty/test/action','faculty\TestController@action');
Route::resource('faculty/test','faculty\TestController');

Route::post('faculty/schedule/action','faculty\ScheduleController@action');
Route::resource('faculty/schedule','faculty\ScheduleController');