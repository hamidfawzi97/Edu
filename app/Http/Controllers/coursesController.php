<?php

namespace App\Http\Controllers;

use App\courses;
use App\video;
use App\quiz;
use App\objective;
use App\should;
use App\user_courses;
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
        $pnts = $request->input('points');
        $objs = $request->input('objective');
        $c_name = $request->input('c_name');
        $c_desc = $request->input('c_description');
        $inst_name = $request->input('inst_name');
        $c_video = $request->file('c_demoVideo');
        $certificate = $request->file('certificate');
        $c_pdf = $request->file('c_pdf');
        $ins_img = $request->file('ins_img');
        $price = $request->input('price');
        $c_img = $request->file('c_img');
        $c_category = $request->get('category');

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
                    $course->Category = $c_category;
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

                    foreach ($objs as $value) {
                        $obj = new objective;
                        $obj->objective = $value;
                        $obj->course_id = $course->ID;
                        $obj->save();
                    }
                    foreach ($pnts as $value) {
                        $pnt = new should;
                        $pnt->point = $value;
                        $pnt->course_id = $course->ID;
                        $pnt->save();
                    }
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
       
    }


    public function show2($course_id)
    {
        $course = Courses::find($course_id);
        $obj    = Objective::where('course_id',$course->ID)->get();
        $should = Should::where('course_id',$course->ID)->get();
        $users  = user_courses::where('Courses_id',$course->ID)->get();
        return view('user/Courses/course')->with('course',$course)->with('objectives',$obj)->with('shoulds',$should)->with('users',$users);
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
        $c_category = $request->get('category');
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
                    $course->Category = $c_category;
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


    public function searchCourse(Request $request)
    {
       $query = $request['query'];
       $courses =  courses::where('CourseName','LIKE','%'.$query.'%')->get();
       $output = '';
       $counter = 0;
       foreach ($courses as $course) {
           $counter++;
           $output .='
                           <div class="col-md-4 col-xs-12">
                      <div class="single_course wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                        <div class="singCourse_imgarea">
                          <img src="'.asset('images/'.$course['CourseImg']).'" height="167px">
                          <div class="mask">                         
                            <a href="'.action('coursesController@show',$course->ID).'" class="course_more">View Course</a>
                          </div>
                        </div>
                        <div class="singCourse_content">
                        <h3 class="singCourse_title"><a href="'.action('coursesController@show',$course->ID).'">'.$course["CourseName"].'</a></h3>
                        <p class="singCourse_desc">'.$course["Description"].'</p>
                        <p class="singCourse_price" style="margin: 0px 0px;"><span>$'.$course["Price"].'</span></p>
                        </div>
                        <div class="singCourse_author">
                          <img src="'.asset('images/'.$course['InstructorPhoto']).'" alt="img">
                          <p>'.$course["InstructorName"].'</p>
                        </div>
                      </div>
                    </div>

                    ';
       }

       $output .=' 
                    <input type="hidden" value='.$counter.' id="count">
       ';
       return $output;
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
        $course = courses::find($request['course']);
        $course->delete();
        $output = '';
        $corses = courses::all();
        foreach ($corses as $cour) {
            $output .=' 
                        <tr id="'.$cour["ID"].'"> 
                        <td scope="row"><input type="checkbox" class="check" /></td>
                        <td><a href="'.action("userCoursesController@show",$cour["ID"]).'">'.$cour['CourseName'].'</a></td>
                        <td>'.$cour['Description'].'</td>
                        <td>'.$cour['Rate'].'</td>
                        <td>'.$cour['VideoInduction'].'</td>
                        <td>'.$cour['Certificate'].'</td>
                        <td>'.$cour['InstructorName'].'</td>
                        <td>'.$cour['Pdf'].'</td>
                        <td>
                            <a href = "#" id="'.$cour['ID'].'" class="ti-trash delete" title="Delete"></a>
                            <a class="ti-pencil" title="Edit" href="'.action('coursesController@edit',$cour['ID']).'"></a>
                        </td>
                      </tr>

                      ';
        }
        return $output;
    }

     public function donwloadPDF($coursepdf)
    { 

        $file_path = public_path().'\pdf\\'.$coursepdf;


        return response()->download($file_path);
    }

    public function getCourseByCategory(Request $request)
    {
        $category = $request['category'];
        $courses = courses::all();
        $counter = 0;
        $output = '';
        foreach ($courses as $course) {

         for ($i=0; $i < sizeof($category); $i++) { 
             if($course['Category'] == $category[$i]){

                $counter++;
                $output .='
                           <div class="col-md-4 col-xs-12">
                      <div class="single_course wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                        <div class="singCourse_imgarea">
                          <img src="'.asset('images/'.$course['CourseImg']).'" height="167px">
                          <div class="mask">                         
                            <a href="'.action('coursesController@show',$course->ID).'" class="course_more">View Course</a>
                          </div>
                        </div>
                        <div class="singCourse_content">
                        <h3 class="singCourse_title"><a href="'.action('coursesController@show',$course->ID).'">'.$course["CourseName"].'</a></h3>
                        <p class="singCourse_desc">'.$course["Description"].'</p>
                        <p class="singCourse_price" style="margin: 0px 0px;"><span>$'.$course["Price"].'</span></p>
                        </div>
                        <div class="singCourse_author">
                          <img src="'.asset('images/'.$course['InstructorPhoto']).'" alt="img">
                          <p>'.$course["InstructorName"].'</p>
                        </div>
                      </div>
                    </div>

                    ';
             }
         }
           
       }
       $output .=' 
                    <input type="hidden" value='.$counter.' id="count">
       ';
       

       return $output;

    }

    public function viewCourse($c_id)
    {
        $course = Courses::find($c_id);

        $videos = Video::where('Courses_id', $c_id)
                        ->orderBy('Ord', 'asc')
                        ->get();

        $quizz = quiz::all();

        $quizes = json_encode($quizz);
        if($course){
          return view('user/Courses/courseList')->with('course',$course)->with('videos',$videos)->with('quizz',$quizz)->with('quizes',$quizes);
        }else{
          return abort(404);
        }
        
    }

    public function getQuizByVideo(Request $request){

      $videoID = $request->get('videoID');

      $quizes = quiz::where('Video_id', $videoID)->get();

      $output = '';
      $i=1;
      foreach ($quizes as $quiz) {
          $output .= '<div class="col-md-8 col-md-offset-3" id="questions" style="border: 1px solid; border-radius: 5px; padding: 20px; margin-bottom: 20px;">
                        <span id="correctOrNot'.$i.'"></span><h3 style="color:black; margin:5px 0 10px 10px; display:inline;">'.$i.'. '.$quiz->question.'</h3><br/><br/>
                        <div style="margin:10px 0 30px 30px; color:black;">
                        <input type="radio" name="answer'.$i.'" value="'.$quiz->ch1.'" style="margin-right:5px;"/>'.$quiz->ch1.'<br/><br/>
                        <input type="radio" name="answer'.$i.'" value="'.$quiz->ch2.'" style="margin-right:5px;"/>'.$quiz->ch2.'<br/><br/>
                        <input type="radio" name="answer'.$i.'" value="'.$quiz->ch3.'" style="margin-right:5px;"/>'.$quiz->ch3.'<br/><br/>
                        <input type="radio" name="answer'.$i.'" value="'.$quiz->ch4.'" style="margin-right:5px;"/>'.$quiz->ch4.'<br/><br/>
                        </div>
                    </div>
                    <script>
                        $("#answerBtn").on("click", function(e){
                            e.preventDefault();

                            if($("input[name=\"answer'.$i.'\"]:checked").val() == "'.$quiz->answer.'"){

                              $("#correctOrNot'.$i.'").attr("class", "fa fa-check");
                              $("#correctOrNot'.$i.'").css("color", "green");

                            }else{

                              $("#correctOrNot'.$i.'").attr("class", "fa fa-close");
                              $("#correctOrNot'.$i.'").css("color", "red");

                            }

                        });
                    </script>

                    ';
          $i++;
      }

      $output .= '<input id="answerBtn" type="button" value="Answer" class="btn btn-success col-md-offset-9"/>';

      return $output;

    }
}