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
//  ------------------------------------------------------------------------------------------=
//  ------------------------------------------------ Start Of User ---------------------------=
//  ------------------------------------------------------------------------------------------=
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
Route::get('/log', function(){
    return view('login');
});



//  ----------------------------- Start Of Courses -------------------------------------------=


Route::get('/courses',"coursesController@allCourses");

// Route::get('/course/{id}'

Route::get('/courseList/{course_id}','coursesController@viewCourse')->middleware('auth');

Route::get('/download/{arg}','coursesController@donwloadPDF');


Route::get('/mycourses/{id}','userCoursesController@usercourse')->middleware('auth');

Route::get('/deletecourse','coursesController@deleteCourse');

Route::get('/searchcourse','coursesController@searchCourse');

Route::get('/getcoursebycategory','coursesController@getCourseByCategory');

Route::get('/course/{id}','coursesController@show2')->name('course');

Route::get('/enroll/{id}','userCoursesController@store')->middleware('auth')->name('enroll');
//  ------------------------------- End Of Courses -------------------------------------------=




//  ----------------------------- Start Of Consultations -------------------------------------=
Route::get('/consultation',"consultationController@allConsultation")->name('consultation');


Route::get('/myconsultation/{id}','consultationController@allMyConsultation')->middleware('auth');

Route::get('/ask',function (){
    return view('user/Consultations/addConsultation');
})->name('addConsultation');

Route::post('/addconsultation',"consultationController@store");

Route::get('/deleteconsultation',"consultationController@destroy");

Route::get('/answerconsultation/{id}',"consultationController@show");

Route::get('/getconsbycategory',"consultationController@getConsByCategory");

Route::get('/editconsultation',"consultationController@update");

Route::post('/addanswer', "answerController@store");

Route::get('/deleteanswer', "answerController@destroy");

Route::get('/editanswer', 'answerController@update');

Route::get('/deleteconsreply','consultationReplyController@destroy');

Route::get('/editconsreply','consultationReplyController@update');

Route::get('/addconsreply','consultationReplyController@store');
//  ------------------------------- End Of Consultations -------------------------------------=




//  ----------------------------- Start Of IT Fields -----------------------------------------=
// Route::get('/itfield',"itFieldController@allitfields");



//  ------------------------------ End Of IT Fields ------------------------------------------=





//  ------------------------------- Comments -------------------------------------------------=


Route::get('/getCommentsByVid','commentController@getCommentsByVideo');

Route::post('/addcomment' , 'commentController@store');


Route::get('/deletecomment', 'commentController@destroy');


Route::get('/editcomment', 'commentController@update');



Route::post('/addreply' , 'commentReplyController@store');


Route::get('/deletereply', 'commentReplyController@destroy');


Route::get('/editreply', 'commentReplyController@update');


//  ------------------------------------------------------------------------------------------=
//  --------------------------------------------------End of User-----------------------------=
//  ------------------------------------------------------------------------------------------=



//  ------------------------------------------------------------------------------------------=
//  ----------------------------------------------- Start of Admin ---------------------------=
//  ------------------------------------------------------------------------------------------=
Route::get('/admi','usersController@Admin')->middleware('auth');

Route::get('/admin-adduser',function (){
    return view('/admin/Adminstration/adduser');
})->name('adduser');


Route::resource('admin/Adminstration','usersController');

Route::get('/admin-user','usersController@index')->name('adminuser');

Route::post('/adduser','usersController@store');

Route::get('/admin-adduser', function () {
    return view('/admin/Adminstration/adduser');
})->middleware('auth');

Route::get('/deleteuser','usersController@destroy');

Route::resource('it_fields', 'itFieldController')->middleware('auth');

Route::get('/deleteitfield','itFieldController@destroy');


//  ----------------------------- Start Of Consultations -------------------------------------=

Route::get('/admin-consultant', function(){
    return view('/admin/Consultations/consultant');
})->middleware('auth');
//  ------------------------------- End Of Consultations -------------------------------------=



//  ----------------------------- Start Of Courses -------------------------------------------=

Route::get('/admin-addcourse', function(){
    return view('/admin/Courses/addcourse');
})->middleware('auth');

Route::resource('admin/Courses','coursesController');

Route::get('/admin-course', function () {
    return view('/admin/course');
})->name('admincourse')->middleware('auth');

Route::post('/admin-course', 'coursesController@addCourse');

Route::get('/admin-course', 'coursesController@allCoursesAdmin');

 
// Route::post('/admin-course', 'coursesController@storeContent');

// Route::get('/addcontent/{id}', 'coursesController@add_content')->middleware('auth');

Route::resource('admin/Video','videoController');

Route::resource('admin/quiz','quizController');

Route::get('/deleteQuizQuestion','quizController@destroy');

Route::get('/editQuizQuestion', 'quizController@update');

Route::get('/addquiz/{id}', 'quizController@add_quiz')->middleware('auth');

Route::get('/getQuizByVideo', 'coursesController@getQuizByVideo');

// Route::post('/course-store', 'videoController@store')->middleware('auth');

Route::get('/addcontent/{id}', 'videoController@add_content')->middleware('auth');

Route::post('/courses/deleteCourse', 'coursesController@deleteCourse')->name('courses.deleteCourse');


Route::resource('/Reg-User', 'userCoursesController');

//  ------------------------------- End Of Courses -------------------------------------------=


//  ------------------------------------------------------------------------------------------=
//  ----------------------------------------------- End of Admin -----------------------------=
//  ------------------------------------------------------------------------------------------=


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
