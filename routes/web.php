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
//  ----------------------------------------------------------------------------------------------------------------------------------=
//  ------------------------------------------------ Start Of User -------------------------------------------------------------------=
//  ----------------------------------------------------------------------------------------------------------------------------------=
Route::get('/', function () {
    return view('user/index');
});

Route::get('/about', function () {
    return view('user/about');
});

Route::get('/contact', function () {
    return view('user/contact');
});

Route::get('/sidebar-right', function () {
    return view('user/sidebar-right');
});
Route::get('/enroll', function(){
    return view('enrollment');
});










//  ----------------------------- Start Of Courses -------------------------------------------=



Route::get('/courses',"coursesController@allCourses");

// Route::get('/course/{id}'

Route::get('/courseList/{course_id}','coursesController@viewCourse');

Route::get('/download/{arg}','coursesController@donwloadPDF');


Route::get('/mycourses/{id}','userCoursesController@usercourse');

Route::get('/deletecourse','coursesController@deleteCourse');

Route::get('/searchcourse','coursesController@searchCourse');

Route::get('/getcoursebycategory','coursesController@getCourseByCategory');

Route::get('/enroll', function(){
    return view('enrollment');
});




//  ------------------------------- End Of Courses -------------------------------------------=












//  ----------------------------- Start Of Consultations -------------------------------------=
Route::get('/consultation',"consultationController@allConsultation");


Route::get('/myconsultation', function () {
    return view('user/Consultations/myconsultation');
});
//  ------------------------------- End Of Consultations -------------------------------------=












//  ------------------------------- Comments -------------------------------------------------=


Route::post('/addcomment' , 'commentController@store');


Route::get('/deletecomment', 'commentController@destroy');


Route::get('/editcomment', 'commentController@update');



//  ----------------------------------------------------------------------------------------------------------------------------------=
//  --------------------------------------------------End of User---------------------------------------------------------------------=
//  ----------------------------------------------------------------------------------------------------------------------------------=



//  ----------------------------------------------------------------------------------------------------------------------------------=
//  ----------------------------------------------- Start of Admin --------------------------------------------------------------------
//  ----------------------------------------------------------------------------------------------------------------------------------=
Route::get('/admi', function () {
    return view('/admin/admin');
});


Route::get('/admin-user', function () {
    return view('/admin/Adminstration/user');
});

Route::get('/admin-it-fields', function () {
    return view('/admin/IT_Fields/it_fields');
});



Route::get('/admin-adduser', function () {
    return view('/admin/Adminstration/adduser');
});

Route::get('/admin-addfield', function () {
    return view('/admin/IT_Fields/addfield');
});




























//  ----------------------------- Start Of Consultations -------------------------------------=

Route::get('/admin-consultant', function(){
    return view('/admin/Consultations/consultant');
});
//  ------------------------------- End Of Consultations -------------------------------------=






























//  ----------------------------- Start Of Courses -------------------------------------------=

Route::get('/admin-addcourse', function(){
    return view('/admin/Courses/addcourse');
});

Route::resource('admin/Courses','coursesController');

Route::get('/admin-course', function () {
    return view('/admin/course');
});

Route::post('/admin-course', 'coursesController@addCourse');

Route::get('/admin-course', 'coursesController@allCoursesAdmin');

Route::post('/courses/deleteCourse', 'coursesController@deleteCourse')->name('courses.deleteCourse');


Route::resource('/Reg-User', 'userCoursesController');

//  ------------------------------- End Of Courses -------------------------------------------=


















//  ----------------------------------------------------------------------------------------------------------------------------------=
//  ----------------------------------------------- End of Admin --------------------------------------------------------------------
//  ----------------------------------------------------------------------------------------------------------------------------------=


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
