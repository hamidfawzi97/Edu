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
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/courses',"coursesController@allCourses");

Route::get('/course', function () {
    return view('course');
});

Route::get('/courseList/{course_id}' , function($course_id){
    return view('courseList');
});

Route::get('/consultation', function () {
    return view('consultation');
});

Route::get('/sidebar-right', function () {
    return view('sidebar-right');
});

Route::get('/videos', function () {
    return view('videos');
});

Route::get('/admi', function () {
    return view('/admin/admin');
});

Route::get('/admin-course', function () {
    return view('/admin/course');
});

Route::post('/admin-course', 'coursesController@addCourse');

Route::get('/admin-course', 'coursesController@allCoursesAdmin');

Route::get('/courses/deleteCourse', 'coursesController@deleteCourse')->name('courses.deleteCourse');

Route::get('/admin-user', function () {
    return view('/admin/user');
});

Route::get('/admin-it-fields', function () {
    return view('/admin/it_fields');
});


Route::get('/Reg-User', function () {
    return view('/admin/RegisteredUser');
});


Route::get('/admin-adduser', function () {
    return view('/admin/adduser');
});

Route::get('/admin-addfield', function () {
    return view('/admin/addfield');
});

Route::get('/admin-consultant', function(){
    return view('/admin/consultant');
});

Route::get('/mycourses/{id}','userCoursesController@usercourse');

Route::get('/admin-addcourse', function(){
    return view('/admin/addcourse');
});

Route::get('/enroll', function(){
    return view('enrollment');
});


