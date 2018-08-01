<?php

namespace App\Http\Controllers;

use App\courses;
use Illuminate\Http\Request;

class coursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function show(courses $courses)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function edit(courses $courses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, courses $courses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function destroy(courses $courses)
    {
        //
    }


public function searchCourse($course)
    {
       $courses =  courses::where('CourseName','LIKE','%'.$course.'%')->get();
       return view('courses')->with('courses',$courses);
    }

    
        
    public function allCourses()
    {
        $courses = courses::all();

        return view('courses')->with('courses',$courses);
    }
    

    public function allCoursesAdmin()
    {
        $courses = courses::all();

        return view('/admin/course')->with('courses',$courses);
    }

    public function deleteCourse(Request $request){

        courses::destroy($request->input('id'));
    }

    public function addCourse(Request $request){

        $c_name = $request->input('c_name');
        $c_desc = $request->input('c_description');
        $inst_name = $request->input('inst_name');
        $c_video = $request->file('c_demoVideo');
        $certificate = $request->file('certificate');
        $c_pdf = $request->file('c_pdf');


        if($request->filled('c_name') && $request->filled('c_description') && $request->filled('inst_name') && $c_video && $certificate && $c_pdf){

            if($c_video->isValid() && $certificate->isValid() && $c_pdf->isValid()){

                $video_name = $c_video->getClientOriginalName();
                $cert = $certificate->getClientOriginalName();
                $pdf_name = $c_pdf->getClientOriginalName();

                $video_extension = $request->c_demoVideo->extension();
                $pdf_extension = $request->c_pdf->extension();
                $certificate_extension = $request->certificate->extension();

                if( ($video_extension == 'mp4' || $video_extension == 'mkv') && $certificate_extension == 'pdf' && $pdf_extension == 'pdf'){


                    $course = new courses;
                    $course->CourseName = $c_name;
                    $course->Description = $c_desc;
                    $course->InstructorName = $inst_name;

                    $course->VideoInduction = $video_name;
                    $c_video->move('video', $video_name);

                    $course->Certificate = $cert;
                    $certificate->move('pdf', $cert);

                    $course->Pdf = $pdf_name;
                    $c_pdf->move('pdf', $pdf_name);


                    $course->save();

                    
                }
            }
        }
         return view('/admin/course');
    }
}
