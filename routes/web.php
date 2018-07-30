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

Route::get('/courses', function () {
    return view('courses');
});

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

Route::get('/admin-user', function () {
    return view('/admin/user');
});

Route::get('/admin-adduser', function () {
    return view('/admin/adduser');
});
