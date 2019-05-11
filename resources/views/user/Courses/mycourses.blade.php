@extends('user/master')

@section('content')

            <div class="container-fluid">
               <div class="col-md-12" style="border-bottom: 1px solid #3d84e6; margin-bottom: 15px;"></div>
               <div class="col-md-2">
                 <img src="{{ asset('images/banner2.jpg') }}" width="300" height="900" style="margin-top: 95px">
               </div>
               <div class="col-md-8">
                              <div class="row form-group">

                                <div class="col-md-5" id="counter"><h1> Viewing {{$count}} results matching</h1></div>
                                <div class="col-md-4 col-md-offset-2">
                                  <label>Search:</label>
                                  <div class="input-group col-md-12 col-xs-12">
                                    <div class="inputWithIcon dam">
                                        <input type="text" placeholder="Search" id="query" class="searchInput">
                                        <button class="search">
                                            <i class="fa fa-search fa-lg fa-fw" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                  </div>
                                </div>
                              </div>

  
                <div class="col-md-12" style="border-bottom: 1px solid #3d84e6; margin-bottom: 15px;"></div>
                <div class="col-md-12">
                <div class="col-md-3 category">
                    <div class="category_head"><h3>Categories</h3></div>
                    <div class="categories">
                        <ul class="">
                        <li>
                            <label class="checkboxcontainer">Computer Science
                            <input type="checkbox"  name="computer science" id="check1">
                            <span class="checkmark"></span>
                            </label>
                        </li>
                        <li>
                            <label class="checkboxcontainer">Project Management
                            <input type="checkbox"  name="project management" id="check2">
                            <span class="checkmark"></span>
                            </label>
                        </li>
                        <li>

                            <label class="checkboxcontainer">Management
                            <input type="checkbox"  name="management" id="check3">
                            <span class="checkmark"></span>
                            </label>

                        </li>
                        <li>
                            <label class="checkboxcontainer">Human Resources
                            <input type="checkbox"  name="human resources" id="check4">
                            <span class="checkmark"></span>
                            </label>
                        </li>
                    </ul>
                    </div>
                    <button class="buton col-md-3 col-md-offset-9 col-xs-6 col-xs-offset-3" id="cheek">Apply</button>
                </div>

                <div class="col-md-9 coursesContainer" id="courses">
          

                  @foreach ($courses as $course)
                      <div class="col-md-4 col-xs-12">
                            <div class="single_course wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                              <div class="singCourse_imgarea">
                                <img src="{{ asset('images/'.$course[0]['CourseImg']) }}" height="167px">
                                <div class="mask">                         
                                  <a href="{{ action('coursesController@show2',$course[0]['ID']) }}" class="course_more">View Course</a>
                                </div>
                              </div>
                              <div class="singCourse_content">
                              <h3 class="singCourse_title"><a href="{{ action('coursesController@show2',$course[0]['ID']) }}">{{ $course[0]["CourseName"] }}</a></h3>
                              <p class="singCourse_desc"> @if(strlen($course[0]['Description']) > 30)
                                            {{ substr($course[0]['Description'], 0 ,29) }}
                                            <?php echo"...."?>

                                    @else
                                            {{ $course[0]['Description'] }}
                                    @endif</p>
                              <p class="singCourse_price" style="margin: 0px 0px;"><span>${{ $course[0]["Price"]}}</span></p>
                              </div>
                              <div class="singCourse_author">
                                <img src="{{ asset('images/'.$course[0]['InstructorPhoto'])}}" alt="img">
                                <p>{{ $course[0]["InstructorName"]}}</p>
                              </div>
                            </div>
                          </div>
                      
                  @endforeach
                </div>
             </div>
           </div>
           <div class="col-md-2">
             <img src="{{ asset('images/banner2.jpg') }}" width="300" height="900" style="margin-top: 95px">
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

             $(document).on('click', '#cheek', function() {
                var arr = new Array(); 
                var cont = 0;
                for (var i = 1; i <= 4; i++) {
                  if ($('#check'+i).is(':checked')) {
                    arr.push($('#check'+i).attr('name'));
                  }
                }if(arr.length > 0){
                  $.ajax({
                    url:"/getcoursebycategory",
                    type:"GET",
                    data:{_token: '<?php echo csrf_token() ?>',category:arr},
                    success:function (data) {
                       $("#courses").html(data);
                       $("#counter").html("<h1> Viewing "+$("#count").val()+" results matching</h1>"); 
                    }
                  });
                }else{
                  var arr2 = new Array();
                  for (var i = 0; i <= 4; i++) {
                    arr2.push($('#check'+i).attr('name'));
                  }
                  $.ajax({
                    url:"/getcoursebycategory",
                    type:"GET",
                    data:{_token: '<?php echo csrf_token() ?>',category:arr2},
                    success:function (data) {
                       $("#courses").html(data);
                       $("#counter").html("<h1> Viewing "+$("#count").val()+" results matching</h1>"); 
                    }
                  });
                }
             });
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

            $('#query').bind("enterKey",function(e){
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
            $('#query').keyup(function(e){
                if(e.keyCode == 13)
                {
                    $(this).trigger("enterKey");
                }
            });            

        </script>
@endsection
<!--  // alert(data['courses']);
                        //      $("#courses").html(data['courses']);
                        //      $("#counter").html("<h1> Viewing "+data['count']+" results matching</h1>"); -->