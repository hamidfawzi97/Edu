<?php

namespace App\Http\Controllers;

use App\courses;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
       
        $c_name = $request->input('c_name');
        $c_desc = $request->input('c_description');
        $inst_name = $request->input('inst_name');
        $c_video = $request->file('c_demoVideo');
        $certificate = $request->file('certificate');
        $c_pdf = $request->file('c_pdf');
        $ins_img = $request->file('ins_img');
        $price = $request->input('price');
        $c_img = $request->file('c_img');

        if($request->filled('c_name') && $request->filled('c_description') && $request->filled('inst_name') && $c_video && $certificate && $c_pdf){

            if($c_video->isValid() && $certificate->isValid() && $c_pdf->isValid()){

                $video_name = $c_video->getClientOriginalName();
                $cert = $certificate->getClientOriginalName();
                $pdf_name = $c_pdf->getClientOriginalName();
                $inss_img = $ins_img->getClientOriginalName();
                $cours_img = $c_img->getClientOriginalName();


                $video_extension = $request->c_demoVideo->extension();
                $pdf_extension = $request->c_pdf->extension();
                $certificate_extension = $request->certificate->extension();

                if( ($video_extension == 'mp4' || $video_extension == 'mkv') && $certificate_extension == 'pdf' && $pdf_extension == 'pdf'){


                    $course = new courses;
                    $course->CourseName = $c_name;
                    $course->Description = $c_desc;
                    $course->InstructorName = $inst_name;
                    $course->Price = $price;
                    $course->CourseImg = $cours_img;
                    $c_img->move('images' , $cours_img);
                    $course->InstructorPhoto = $inss_img;
                    $ins_img->move('images' , $inss_img);
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
          return redirect('/admin-course');   
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function show($course_id)
    {
        $course = Courses::find($course_id);

        return view('user/Courses/course')->with('course',$course);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function edit($course_id)
    {      
            $course = Courses::find($course_id);
            return view('admin/Courses/updateCourse')->with('course',$course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $course_id)
    {

        $c_name = $request->input('c_name');
        $c_desc = $request->input('c_description');
        $inst_name = $request->input('inst_name');
        $c_video = $request->file('c_demoVideo');
        $certificate = $request->file('certificate');
        $c_pdf = $request->file('c_pdf');
        $ins_img = $request->file('ins_img');
        $price = $request->input('price');
        $c_img = $request->file('c_img');

        if($request->filled('c_name') && $request->filled('c_description') && $request->filled('inst_name') && $request->filled('price')){

            if(!is_null($c_video)){
                $video_name = $c_video->getClientOriginalName();
                $video_extension = $request->c_demoVideo->extension(); 
            }if( !is_null($certificate)) {
                $cert = $certificate->getClientOriginalName();
                $certificate_extension = $request->certificate->extension();
            }if(!is_null($c_pdf)){
                $pdf_name = $c_pdf->getClientOriginalName();
                $pdf_extension = $request->c_pdf->extension();

            }if(!is_null($ins_img)){
                $inss_img = $ins_img->getClientOriginalName();
                $instruct_extension =  $request->ins_img->extension();
            }if(!is_null($c_img )){
                $cours_img = $c_img->getClientOriginalName();
                $cours_extension =  $request->c_img->extension();
                }

                    $course = Courses::find($course_id);
                    $course->CourseName = $c_name;
                    $course->Description = $c_desc;
                    $course->InstructorName = $inst_name;
                    $course->Price = $price;
                    if(!is_null($c_img )){
                        $course->CourseImg = $cours_img;
                        $c_img->move('images' , $cours_img);
                    }
                   
                    if(!is_null($ins_img)){
                        $course->InstructorPhoto = $inss_img;
                        $ins_img->move('images' , $inss_img);
                    }
                    
                    if(!is_null($c_video)){
                        $course->VideoInduction = $video_name;
                        $c_video->move('video', $video_name);
                    }

                     if(!is_null($certificate)){
                        $course->Certificate = $cert;
                        $certificate->move('pdf', $cert);
                    }

                    if(!is_null($c_pdf)){
                        $course->Pdf = $pdf_name;
                        $c_pdf->move('pdf', $pdf_name);
                    }

                    $course->save();

                    
                }
            
         

        return redirect('/admin-course');       
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
        $count = count($courses);
        return view('user/Courses/courses')->with('courses',$courses)->with('count',$count);
    }
    

    public function allCoursesAdmin()
    {
        $courses = courses::all();

        return view('/admin/Courses/course')->with('courses',$courses);
    }

    public function deleteCourse(Request $request){

        $course = courses::find($request->get('id'));
        if($course->delete()){
            return json_encode("Data Deleted");
        }
    }

     public function donwloadPDF($coursepdf)
    { 

        $file_path = public_path().'\pdf\\'.$coursepdf;


        return response()->download($file_path);
    }
    public function viewCourse($c_id)
    {
           $course = Courses::find($c_id);

        return view('user/Courses/courseList')->with('course',$course);
    }
}