@extends('user/master')


@section('content')
<?php 
                $i = 0;
                if(!Auth::guest()){
                    $userID = \Auth::user()->id;
                }else{
                    $userID = "Not Logged";
                }

                ?>
<header id="head" class="secondary" style="background-image: url('{{ asset('/images/'.$course->CourseImg) }}');background-position:center; background-size: cover;background-repeat: no-repeat;height: 500px">
	<div class="container">
		<!-- <h1 id="courseName" style="margin-top: 230px">{{ $course->CourseName }}</h1> -->
	</div>
</header>

<style type="text/css">
	

	body{
		background-color: #f7f8fa;
	}


	.courseCards{
	background-color: #ffffff;
    color: black;
    margin-top: 10px;
    word-wrap: break-word;
    font-family: 'Oswald', 'sans-serif';
    /* border-radius: 10px; */
    font-size: 18px;
    border: 1px solid #dbdcdd;
	}
</style>
<div class="container" >

	<div class="col-md-9" style="min-height: 300px"> 
		<div class="col-md-12 courseCards" >
			<h2>Course Description</h2>
			<p>{{$course->Description}}</p>
		</div>
		<div class="col-md-12 courseCards" >
			<h2>What Will I Learn</h2>
			@foreach($objectives as $obj)
				<div class="col-md-10" style="margin-bottom: 10px"><i class="fa fa-check"></i>{{ $obj->objective }}</div>
			@endforeach
		</div>
		<div class="col-md-12 courseCards">
			<h2>Who Should Attend</h2>
			@foreach($shoulds as $should)
				<div class="col-md-10" style="margin-bottom: 10px"><i class="fa fa-arrow-right"></i>{{ $should->point }}</div>
			@endforeach
	</div>
	</div>

	<div class="col-md-3" style="position: relative;bottom: 100px;">
		<div class="course-card col-md-12" style="padding: 0px ; background-color: white;border: 1px solid #dbdcdd;margin-top: 10px">
			<div class="col-md-10 col-md-offset-1" style="padding: 0px;">
					<div align="center" class="embed-responsive embed-responsive-4by3">
						<video class="embed-responsive-item" controls>
							<source src="{{ asset('video/'.$course->VideoInduction) }}" type="video/mp4">
						</video>
					</div>
			</div>
			<div class="col-md-10 col-md-offset-1">
				
				<div class="col-md-12" style="font-size: 26px;text-align: center; margin-top: 20px;font-family: 'Oswald', 'sans-serif';">
					{{ $course->CourseName }}
				</div>

			</div>
			<div class="col-md-10 col-md-offset-1" style="margin-top: 35px;margin-bottom: 10px">
				<div>
					<?php  $z = 0;?>
					@foreach($users as $userr)
					@if($userr->User_id == $userID)
						<?php $z++; ?>
					@endif
					@endforeach
					@if($z == 0)
						<a href="{{ route('enroll',$course->ID) }}" class="buton2 col-md-12" style="height: 55px; padding-top: 13px">Enroll For 10$</a>
					@endif
				</div>
			</div>
		</div>

	</div>





































<!--         <div class="row text-center">
		  <div class="col-xs-6 col-md-4">
		  	<a href="{{ url('')}}" class="btn btn-primary">Enroll Now !!</a>
		  </div>
		  <div class="col-xs-6 col-md-4">
		  	<p >Price: <span>{{ $course->Price }}</span></p>
		  </div>
		  <div class="col-xs-6 col-md-4">
		  	<p>Rate: {{ $course->Rate }}
		  		<span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star"></span>
				<span class="fa fa-star"></span>
			</p>
		  </div>
		</div>

		<br>
		<br>	
		
		<div align="center" class="embed-responsive embed-responsive-16by9">
		    <video class="embed-responsive-item" controls>
		        <source src="{{ asset('video/'.$course->VideoInduction) }}" type="video/mp4">
		    </video>
		</div>
		
		<br>
		<br>

			<div id="courses">
		<section class="container">
			<h3>Course Description</h3>
			<div class="col-md-12">
				{{ $course->Description }}
			</div>
			<h3>Course Schema</h3>
			<a href="{{ action('coursesController@donwloadPDF',$course->Pdf) }}">{{ $course->Pdf }}</a>
		</section>
	</div>
-->	</div>









<script>
	var node = document.getElementById("title");
	node.value = document.getElementById('courseName').value();
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="assets/js/custom.js"></script>
@endsection