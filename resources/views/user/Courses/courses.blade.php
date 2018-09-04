@extends('user/master')

@section('content')
            <div class="container">
                <form action="" method="post" class="form-horizontal" style="margin-top: 20px; border-bottom: 1px solid #efefef;">
                              <div class="row form-group">

                                <div class="col-md-5"><h1> Viewing {{$count}} results matching</h1></div>
                                <div class="col-md-4 col-md-offset-2">
                                  <label>Search:</label>
                                  <div class="input-group col-md-12 col-xs-12">
                                    <div class="inputWithIcon dam">
                                        <input type="text" placeholder="Search">
                                        <button class="">
                                            <i class="fa fa-search fa-lg fa-fw" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                </form>
                <br/>  
                <div class="col-md-12" style="border-bottom: 1px solid #efefef; margin-bottom: 15px;"></div>
                <div class="col-md-12">
                <div class="col-md-3 category">
                    <div class="category_head"><h3>Categories</h3></div>
                    <div class="categories">
                        <ul class="">
                        <li><input type="checkbox" name="Information Technology"> Information Technology</li>
                        <li><input type="checkbox" name="Project Management"> Project Management</li>
                        <li><input type="checkbox" name="Management"> Management</li>
                        <li><input type="checkbox" name="Human Resources"> Human Resources</li>
                    </ul>
                    </div>
                </div>
                
                <div class="col-md-9 coursesContainer">
          

            @foreach ($courses as $course)
                <div class="col-md-4 col-xs-12">
                      <div class="single_course wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                        <div class="singCourse_imgarea">
                          <img src="{{ asset('images/'.$course['CourseImg']) }}" height="167px">
                          <div class="mask">                         
                            <a href="{{ action('coursesController@show',$course->ID) }}" class="course_more">View Course</a>
                          </div>
                        </div>
                        <div class="singCourse_content">
                        <h3 class="singCourse_title"><a href="{{ action('coursesController@show',$course->ID) }}">{{ $course["CourseName"] }}</a></h3>
                        <p class="singCourse_desc">{{ $course["Description"]}}</p>
                        <p class="singCourse_price" style="margin: 0px 0px;"><span>${{ $course["Price"]}}</span></p>
                        </div>
                        <div class="singCourse_author">
                          <img src="{{ asset('images/'.$course['InstructorPhoto'])}}" alt="img">
                          <p>{{ $course["InstructorName"]}}</p>
                        </div>
                      </div>
                    </div>
                
            @endforeach
                </div>
             </div>
            </div>
@endsection
@section('js')
            <!-- JavaScript libs are placed at the end of the document so the pages load faster -->
           <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="assets/js/custom.js"></script>
   <script>
        var node = document.getElementById("Contact");
        node.setAttribute("class", "active");
    </script>
            <script>
                var node = document.getElementById("Courses");
                node.setAttribute("class", "active");
            </script>
        <script type="text/javascript">
            $(".checkbox").change(function() {
                if(this.checked) {
                    //Do stuff
                }
             });
        </script>
@endsection
