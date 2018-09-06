@extends('user/master')

@section('content')
            <div class="container">

                              <div class="row form-group">

                                <div class="col-md-5" id="counter"><h1> Viewing {{$count}} results matching</h1></div>
                                <div class="col-md-4 col-md-offset-2">
                                  <label>Search:</label>
                                  <div class="input-group col-md-12 col-xs-12">
                                    <div class="inputWithIcon dam">
                                        <input type="text" placeholder="Search" id="query">
                                        <button class="search">
                                            <i class="fa fa-search fa-lg fa-fw" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                  </div>
                                </div>
                              </div>

  
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

                <div class="col-md-9 coursesContainer" id="courses">
          

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
        <script type="text/javascript">
            var node = document.getElementById("Courses");
            node.setAttribute("class", "active");


            $(document).on('click', '.search', function() { 
            var query = $("#query").val();
            if(query != ''){
                      $.ajax({
                      url:"/searchcourse",
                      type:"GET",
                      data:{_token : '<?php echo csrf_token() ?>', query:query},
                      success:function (data) {
                          $("#courses").html(data);
                          $("#counter").html("<h1> Viewing "+$("#count").val()+" results matching</h1>");
                      }
                     })
            } 
             });

        </script>
@endsection
<!--  // alert(data['courses']);
                        //      $("#courses").html(data['courses']);
                        //      $("#counter").html("<h1> Viewing "+data['count']+" results matching</h1>"); -->