@extends('user/master')

@section('content')
	
	<div class="container">
            <div class="col-md-offset-5">
                <h1>Add Consultation</h1> 
            </div>
		<div class="col-md-8 col-md-offset-2" style="margin-top: 40px">
			<form method="POST" action="{{ action('consultationController@store') }}">
				@csrf
				<textarea class="form-control" style="border-radius: 10px; resize: none; height: 250px; margin: 20px 0px; border: 1px solid #3d84e6;font-family: 'Oswald', sans-serif;" placeholder="Your Question..." name="question"></textarea>
				<select name="category" class="form-control" style="border-radius: 10px ;margin:20px 0px; border: 1px solid #3d84e6 ;font-family: 'Oswald', sans-serif;" >
					<option value="computer science">Computer Science</option>
					<option value="project management">Project Management</option>
					<option value="management">Management</option>
					<option value="human resources">Human Resources</option>
				</select>
				<input type="submit" name="submit" class="btn btn-primary col-md-2 col-md-offset-5" value="Post" style=" margin-top: 20px;font-family: 'Oswald', sans-serif;">
			</form>
		</div>
	</div>
@endsection

@section('js')

@endsection
