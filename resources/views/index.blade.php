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
	<title>Home</title>
	<link rel="favicon" href={{ asset('images/favicon.png') }}>
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href={{ asset('css/bootstrap.min.css') }}>
	<link rel="stylesheet" href={{ asset('css/font-awesome.min.css') }}> 
	<link rel="stylesheet" href={{ asset('css/bootstrap-theme.css') }} media="screen"> 
	<link rel="stylesheet" href={{ asset('css/style.css') }}>
    <link rel='stylesheet' id='camera-css'  href={{ asset('css/camera.css') }} type='text/css' media='all'> 
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
				<a class="navbar-brand" href={{ url('/') }}>
					<img src={{ asset('images/logo.png') }} alt="Techro HTML5 template"></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right mainNav">
					<li class="active"><a href={{ url('/') }}>Home</a></li>
					<li><a href={{ url('/about') }}>About</a></li>
					<li><a href={{ url('/courses') }}>Courses</a></li>
					<li><a href={{ url('/price') }}>Price</a></li>
					<li><a href={{ url('/videos') }}>Videos</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="sidebar-right.blade.php">Right Sidebar</a></li>
							<li><a href="#">Dummy Link1</a></li>
							<li><a href="#">Dummy Link2</a></li>
							<li><a href="#">Dummy Link3</a></li>
						</ul>
					</li>
					<li><a href={{ url('/contact') }}>Contact</a></li>

				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	<!-- /.navbar -->

	<!-- Header -->
	<header id="head">
		<div class="container">
             <div class="heading-text">							
							<h1 class="animated flipInY delay1">Start Online Education</h1>
							<p>Free Online education template for elearning and online education institute.</p>
						</div>
            
					<div class="fluid_container">                       
                    <div class="camera_wrap camera_emboss pattern_1" id="camera_wrap_4">
                        <div data-thumb={{ asset('images/slides/thumbs/img1.jpg') }} data-src={{ asset('images/slides/img1.jpg') }}>
                            <h2>We develop.</h2>
                        </div> 
                        <div data-thumb={{ asset('images/slides/thumbs/img2.jpg') }} data-src={{ asset('images/slides/img2.jpg') }}>
                        </div>
                        <div data-thumb={{ asset('images/slides/thumbs/img3.jpg') }} data-src={{ asset('images/slides/img3.jpg') }}>
                        </div> 
                    </div><!-- #camera_wrap_3 -->
                </div><!-- .fluid_container -->
		</div>
	</header>
	<!-- /Header -->

  <div class="container">
    <div class="row">
					<div class="col-md-3">
						<div class="grey-box-icon">
							<div class="icon-box-top grey-box-icon-pos">
								<img src= {{ asset('images/1.png') }} alt=""/>
							</div><!--icon box top -->
							<h4>Online Courses</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tempus eleifend risus ut congue
							eset nec lacus elit dor broma.</p>
     						<p><a href="#"><em>Read More</em></a></p>
						</div><!--grey box -->
					</div><!--/span3-->
					<div class="col-md-3">
						<div class="grey-box-icon">
							<div class="icon-box-top grey-box-icon-pos">
								<img src={{ asset('images/2.png') }} alt="" />
							</div><!--icon box top -->
							<h4>Meet our Staff</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tempus eleifend risus ut congue
							eset nec lacus elit dor broma.</p>
     						<p><a href="#"><em>Read More</em></a></p>
						</div><!--grey box -->
					</div><!--/span3-->
					<div class="col-md-3">
						<div class="grey-box-icon">
							<div class="icon-box-top grey-box-icon-pos">
								<img src={{ asset('images/3.png') }} alt="" />
							</div><!--icon box top -->
							<h4>Latest Updates</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tempus eleifend risus ut congue
							eset nec lacus elit dor broma.</p>
     						<p><a href="#"><em>Read More</em></a></p>
						</div><!--grey box -->
					</div><!--/span3-->
					<div class="col-md-3">
						<div class="grey-box-icon">
							<div class="icon-box-top grey-box-icon-pos">
								<img src={{ asset('images/4.png') }} alt="" />
							</div><!--icon box top -->
							<h4>Placements</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tempus eleifend risus ut congue
							eset nec lacus elit dor broma.</p>
     						<p><a href="#"><em>Read More →</em></a></p>
						</div><!--grey box -->
					</div><!--/span3-->
				</div>
    </div>
      <section class="news-box top-margin">
        <div class="container">
            <h2><span>New Courses</span></h2>
            <div class="row">
       
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="newsBox">
                        <div class="thumbnail">
                            <figure><img src={{ asset('images/news2.jpg') }} alt=""></figure>
                            <div class="caption maxheight2">
                            <div class="box_inner">
                                        <div class="box">
                                            <p class="title"><h5>Developer</h5></p>
                                            <p>Lorem ipsum dolor sit amet, conc tetu er adipi scing. Praesent ves tibuum molestie lacuiirhs. Aenean.</p>
                                        </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="newsBox">
                        <div class="thumbnail">
                            <figure><img src={{ asset('images/news3.jpg') }} alt=""></figure>
                            <div class="caption maxheight2">
                            <div class="box_inner">
                                        <div class="box">
                                            <p class="title"><h5>Photography   </h5></p>
                                            <p>Lorem ipsum dolor sit amet, conc tetu er adipi scing. Praesent ves tibuum molestie lacuiirhs. Aenean.</p>
                                        </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="newsBox">
                        <div class="thumbnail">
                            <figure><img src={{ asset('images/news4.jpg') }} alt=""></figure>
                            <div class="caption maxheight2">
                           <div class="box_inner">
                                        <div class="box">
                                            <p class="title"><h5>Audio Editing</h5></p>
                                            <p>Lorem ipsum dolor sit amet, conc tetu er adipi scing. Praesent ves tibuum molestie lacuiirhs. Aenean.</p>
                                        </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
  
	
      <section class="container">
      <div class="row">
      	<div class="col-md-8"><div class="title-box clearfix "><h2 class="title-box_primary">About Us</h2></div> 
        <p><span>Perspiciatis unde omnis iste natus error sit voluptatem. Cum sociis natoque penatibus et magnis dis parturient montes ascetur ridiculus musull dui.</span></p>
        <p>Lorem ipsumulum aenean noummy endrerit mauris. Cum sociis natoque penatibus et magnis dis parturient montes ascetur ridiculus mus. Null dui. Fusce feugiat malesuada odio.</p><p>Lorem ipsumulum aenean noummy endrerit mauris. Cum sociis natoque penatibus et magnis dis parturient montes ascetur ridiculus mus. Null dui. Fusce feugiat malesuada odio.</p>
        <a href="#" title="read more" class="btn-inline " target="_self">read more</a> </div>
              
          
          <div class="col-md-4"><div class="title-box clearfix "><h2 class="title-box_primary">Up Coming Courses</h2></div> 
            <div class="list styled custom-list">
            <ul>
            <li><a title="Snatoque penatibus et magnis dis partu rient montes ascetur ridiculus mus." href="#">Mathematics and Computer Science</a></li>
            <li><a title="Fusce feugiat malesuada odio. Morbi nunc odio gravida at cursus nec luctus." href="#">Mathematics and Philosophy</a></li>
            <li><a title="Penatibus et magnis dis parturient montes ascetur ridiculus mus." href="#">Philosophy and Modern Languages</a></li>
            <li><a title="Morbi nunc odio gravida at cursus nec luctus a lorem. Maecenas tristique orci." href="#">History (Ancient and Modern)</a></li>
            <li><a title="Snatoque penatibus et magnis dis partu rient montes ascetur ridiculus mus." href="#">Classical Archaeology and Ancient History</a></li>
            <li><a title="Fusce feugiat malesuada odio. Morbi nunc odio gravida at cursus nec luctus." href="#">Physics and Philosophy</a></li>
            </ul>
            </div>
         </div>
      </div>
      </section>
      
    	 
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
	<script src={{ asset('js/modernizr-latest.js') }}></script> 
	<script type="text/javascript" src={{ asset('js/jquery.min.js') }}></script>
    <script type="text/javascript" src={{ asset('js/fancybox/jquery.fancybox.pack.js') }}></script>
    
    <script type="text/javascript" src={{ asset('js/jquery.mobile.customized.min.js') }}></script>
    <script type="text/javascript" src={{ asset('js/jquery.easing.1.3.js') }}></script> 
    <script type="text/javascript" src={{ asset('js/camera.min.js') }}></script> 
    <script src={{ asset('js/bootstrap.min.js') }}></script> 
	<script src={{ asset('js/custom.js') }}></script> 
       <script>
    jQuery(function(){
      
      jQuery('#camera_wrap_4').camera({
                transPeriod: 500,
                time: 3000,
        height: '600',
        loader: 'false',
        pagination: true,
        thumbnails: false,
        hover: false,
                playPause: false,
                navigation: false,
        opacityOnGrid: false,
        imagePath: 'C:/Users/Hamed/blog/public/images'
      });

    });
      
  </script>
      
	</script>
    
</body>
</html>
