@extends('user/master')

@section('content')
    <header id="head" class="secondary">
        <div class="container">
            <h1>Courses</h1>
        </div>
    </header>
            <div class="container">
                <form action="" method="post" class="form-horizontal" style="margin-top: 20px;">
                              <div class="row form-group">
                                <div class="col col-md-4 col-md-offset-5">
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    <input type="text" id="search" name="searchCourse" placeholder="Username" class="form-control">
                                  </div>
                                </div>
                              </div>
                </form>
                <br/>  

                <div class="col-md-3 category">
                    <div class="category_head">Categories</div>
                    <div class="categories">
                        <ul class="">
                        <li><input type="checkbox" > Information Technology</li>
                        <li><input type="checkbox" > Project Management</li>
                        <li><input type="checkbox" > Management</li>
                        <li><input type="checkbox" > Human Resources</li>
                    </ul>
                    </div>
                </div>
                
                <div class="col-md-9 coursesContainer">
          

            @foreach ($courses as $course)
                <div class="col-md-4 col-xs-6">
                      <div class="single_course wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                        <div class="singCourse_imgarea">
                          <img src="{{ asset('images/'.$course['CourseImg']) }}" height="167px">
                          <div class="mask">                         
                            <a href="{{ action('coursesController@show',$course->ID) }}" class="course_more">View Course</a>
                          </div>
                        </div>
                        <div class="singCourse_content">
                        <h3 class="singCourse_title"><a href="{{ action('coursesController@show',$course->ID) }}">{{ $course["CourseName"] }}</a></h3>
                        <p class="singCourse_price"><span>${{ $course["Price"]}}</span></p>
                        <p>{{ $course["Description"]}}</p>
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
     
            $('#search').on('keyup',function(){
             
                        $value=$(this).val();
                         
                        $.ajax({
                         
                                type : 'get',
                                 
                                url : "{{ url('/courses')}}",
                                 
                                data:{'search':$value},
                                 
                                success:function(data){
                                 
                                     $('tbody').html(data);
                                 
                                }
                                 
                        });
                                 
                     
     
            })
     </script>

@endsection