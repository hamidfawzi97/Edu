<?php

namespace App\Http\Controllers;

use App\user_courses;
use App\courses;
use Illuminate\Http\Request;

class userCoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('usercourses');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\user_courses  $user_courses
     * @return \Illuminate\Http\Response
     */
    public function show(user_courses $user_courses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user_courses  $user_courses
     * @return \Illuminate\Http\Response
     */
    public function edit(user_courses $user_courses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user_courses  $user_courses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user_courses $user_courses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user_courses  $user_courses
     * @return \Illuminate\Http\Response
     */
    public function destroy(user_courses $user_courses)
    {
        //
    }

     public function userCourse($userid)
    {
      
        $user = user_courses::where('User_id', $userid)->get();
        foreach ($user as $value) {
        $courses[] = courses::where('ID',$value['Courses_id'])->get();             
       }
       return $courses[0][0][""];
        //return view('userCourses')->with('courses', $courses);
        }

}
