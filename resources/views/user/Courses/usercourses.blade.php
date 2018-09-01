<!--
Author: WebThemez
Author URL: http://webthemez.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="free-educational-responsive-web-template-webEdu">
        <meta name="author" content="webThemez.com">
        <title>Courses</title>
        <link rel="favicon" href={{ asset('images/favicon.png') }}>
        <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
        <link rel="stylesheet" href={{ asset('css/bootstrap.min.css') }}>
        <link rel="stylesheet" href={{ asset('css/font-awesome.min.css') }}> 
        <link rel="stylesheet" href={{ asset('css/bootstrap-theme.css') }} media="screen"> 
        <link rel="stylesheet" href={{ asset('css/style.css') }}>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
<script src="assets/js/html5shiv.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->
    </head>

    <body>
        <!-- Fixed navbar -->
            @include('nav-bar')
        <!--/.nav-collapse -->
        


        <header id="head" class="secondary">
            <div class="container">
                <h1>Courses</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing eliras scele!</p>
            </div>
        </header>


        <div class="container">
<!--
            <div class="col-md-6 col-md-offset-6" style="margin-bottom:30px; margin-top:30px">
            <input type="text" name="search_text" id="search_text" placeholder="Search" />
            <input type="button" name="search_button" id="search_button">
            </div>
-->
            <br/>   
            <div class="col-md-3">
                <ul class="">
                    <li><input type="checkbox" > Information Technology</li>
                    <li><input type="checkbox" > Project Management</li>
                    <li><input type="checkbox" > Management</li>
                    <li><input type="checkbox" > Human Resources</li>
                </ul>
            </div>
            
            <div class="col-md-9 coursesContainer">
                
        @foreach ($courses as $course)
    
            <div class="col-md-4 col-xs-6">
                  <div class="single_course wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                    <div class="singCourse_imgarea">
                      <img src={{ asset('images/course-1.jpg') }}>
                      <div class="mask">                         
                        <a href="{{ url('/course')}}" class="course_more">View Course</a>
                      </div>
                    </div>
                    <div class="singCourse_content">
                    <h3 class="singCourse_title"><a href="{{ url('/course')}}">{{ $course["CourseName"]}}</a></h3>
                    <p class="singCourse_price"><span>${{ $course["Price"]}}</span></p>
                    <p>{{ $course["Description"]}}</p>
                    </div>
                    <div class="singCourse_author">
                      <img src="{{ asset('images/photo-3.jpg')}}" alt="img">
                      <p>{{ $course["InstructorName"]}}</p>
                    </div>
                  </div>
                </div>
        @endforeach

            
            </div>
            
            
<!--
            
            <div class="col-lg-8" style="float:right">
                <ul>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>

            </div>
-->
        
            <!--
<ul class="list-unstyled video-list-thumbs row">
<li class="col-lg-3 col-sm-4 col-xs-6">
<a href="#" title="Claudio Bravo, antes su debut con el Barça en la Liga">
<img src="http://i.ytimg.com/vi/ZKOtE9DOwGE/mqdefault.jpg" alt="Barca" class="img-responsive" height="130px" />
<h2>Claudio Bravo, antes su debut con el Barça en la Liga</h2>
<span class="play-button"></span>
<span class="duration">03:15</span>
</a>
</li>
<li class="col-lg-3 col-sm-4 col-xs-6">
<a href="#" title="Claudio Bravo, antes su debut con el Barça en la Liga">
<img src="http://i.ytimg.com/vi/ZKOtE9DOwGE/mqdefault.jpg" alt="Barca" class="img-responsive" height="130px" />
<h2>Claudio Bravo, antes su debut con el Barça en la Liga</h2>
<span class="play-button"></span>
<span class="duration">03:15</span>
</a>
</li>
<li class="col-lg-3 col-sm-4 col-xs-6"> 
<a href="#" title="Claudio Bravo, antes su debut con el Barça en la Liga">
<img src="http://i.ytimg.com/vi/ZKOtE9DOwGE/mqdefault.jpg" alt="Barca" class="img-responsive" height="130px" />
<h2>Claudio Bravo, antes su debut con el Barça en la Liga</h2>
<span class="play-button"></span>
<span class="duration">03:15</span>
</a>
</li>
<li class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
<a href="#" title="Claudio Bravo, antes su debut con el Barça en la Liga">
<img src="http://i.ytimg.com/vi/ZKOtE9DOwGE/mqdefault.jpg" alt="Barca" class="img-responsive" height="130px" />
<h2>Claudio Bravo, antes su debut con el Barça en la Liga</h2>
<span class="play-button"></span>
<span class="duration">03:15</span>
</a>
</li> 
</ul>
-->

        </div>
        <!--
<div id="courses">
<section class="container">
<h3>Development Courses</h3>
<div class="row">
<div class="col-md-4">
<div class="featured-box"> 
<div class="text">
<h3>Responsive Design</h3>
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
</div>
</div>
</div>
<div class="col-md-4">
<div class="featured-box"> 
<div class="text">
<h3>HTML5/CSS3</h3>
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
</div>
</div>
</div>
<div class="col-md-4">
<div class="featured-box"> 
<div class="text">
<h3>Web Designing</h3>
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-4">
<div class="featured-box"> 
<div class="text">
<h3>Web App Dev</h3>
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
</div>
</div>
</div>
<div class="col-md-4">
<div class="featured-box"> 
<div class="text">
<h3>Data Base</h3>
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
</div>
</div>
</div>
<div class="col-md-4">
<div class="featured-box"> 
<div class="text">
<h3>Mobile App Dev</h3>
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
</div>
</div>
</div>
</div>

</section>
</div>
-->

        <!-- container -->
        <!--
<div class="container">
<div class="row">
// Article content 
<section class="col-sm-12 maincontent">
<h3>Responsive Website</h3>
<p>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
</p>
<h3>Bootstrap</h3>
<p>Standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
</section>
</div>
</div>
-->
        <!-- /container -->
        <footer id="footer">

            <div class="container">
                <div class="row">
                    <div class="footerbottom">
                        <div class="col-md-3 col-sm-6">
                            <div class="footerwidget">
                                <h4>
                                    Course Categories
                                </h4>
                                <div class="menu-course">
                                    <ul class="menu">
                                        <li><a href="#">
                                            List of Technology 
                                            </a>
                                        </li>
                                        <li><a href="#">
                                            List of Business
                                            </a>
                                        </li>
                                        <li><a href="#">
                                            List of Photography
                                            </a>
                                        </li>
                                        <li><a href="#">
                                            List of Language
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="footerwidget">
                                <h4>
                                    Products Categories
                                </h4>
                                <div class="menu-course">
                                    <ul class="menu">
                                        <li> <a href="#">
                                            Individual Plans  </a>
                                        </li>
                                        <li><a href="#">
                                            Business Plans
                                            </a>
                                        </li>
                                        <li><a href="#">
                                            Free Trial
                                            </a>
                                        </li>
                                        <li><a href="#">
                                            Academic
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="footerwidget">
                                <h4>
                                    Browse by Categories
                                </h4>
                                <div class="menu-course">
                                    <ul class="menu">
                                        <li><a href="#">
                                            All Courses
                                            </a>
                                        </li>
                                        <li> <a href="#">
                                            All Instructors
                                            </a>
                                        </li>
                                        <li><a href="#">
                                            All Members
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                All Groups
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6"> 
                            <div class="footerwidget"> 
                                <h4>Contact</h4> 
                                <p>Lorem reksi this dummy text unde omnis iste natus error sit volupum</p>
                                <div class="contact-info"> 
                                    <i class="fa fa-map-marker"></i> Kerniles 416  - United Kingdom<br>
                                    <i class="fa fa-phone"></i>+00 123 156 711 <br>
                                    <i class="fa fa-envelope-o"></i> youremail@email.com
                                </div> 
                            </div><!-- end widget --> 
                        </div>
                    </div>
                </div>
                <div class="social text-center">
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                    <a href="#"><i class="fa fa-flickr"></i></a>
                    <a href="#"><i class="fa fa-github"></i></a>
                </div>

                <div class="clear"></div>
                <!--CLEAR FLOATS-->
            </div>
            <div class="footer2">
                <div class="container">
                    <div class="row">

                        <div class="col-md-6 panel">
                            <div class="panel-body">
                                <p class="simplenav">
                                    <a href="index.html">Home</a> | 
                                    <a href="about.html">About</a> |
                                    <a href="courses.html">Courses</a> |
                                    <a href="price.html">Price</a> |
                                    <a href="videos.html">Videos</a> |
                                    <a href="contact.html">Contact</a>
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6 panel">
                            <div class="panel-body">
                                <p class="text-right">
                                    Copyright &copy; 2014. Template by <a href="http://webthemez.com/" rel="develop">WebThemez.com</a>
                                </p>
                            </div>
                        </div>

                    </div>
                    <!-- /row of panels -->
                </div>
            </div>
        </footer>


        <!-- JavaScript libs are placed at the end of the document so the pages load faster -->
        <script>
        var node = document.getElementById("mycourses");
        node.setAttribute("class", "active");
    </script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script src="assets/js/custom.js"></script>
    </body>
</html>
