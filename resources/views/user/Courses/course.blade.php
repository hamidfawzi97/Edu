@extends('user/master')


@section('content')
	<header id="head" class="secondary">
        <div class="container">
            <h3 id="courseName">{{ $course->CourseName }}</h3>
			<p>
			    {{ $course->Description }}
			</p>
        </div>
    </header>

    
	<div class="container">
		<br>
		<br>	

        <div class="row text-center">
		  <div class="col-xs-6 col-md-4">
		  	<a href="{{ url('')}}" class="btn btn-primary">Enroll Now !!</a>
		  </div>
		  <div class="col-xs-6 col-md-4">
		  	<p >Price: <span>{{ $course->Price }}</span></p>
		  </div>
		  <div class="col-xs-6 col-md-4">
		  	<p>Rate: {{ $course->Rate }}
		  		<!-- <span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star"></span>
				<span class="fa fa-star"></span> -->
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
	</div>






    

	
    <script>
        var node = document.getElementById("title");
        node.value = document.getElementById('courseName').value();
    </script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
@endsection