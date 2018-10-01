@extends('user/master')

@section('content')
	<div class="container">
		<div class="col-md-10 col-md-offset-1 consultation" style="border: 1px solid #3d84e6; min-height: 180px">   <div style="min-height: 100px">
			<img src="{{ asset('images/photo-3.jpg')}}" style="float: right; border-radius: 50px" class="col-md-1">
			<p> Hi it's consultation</p>
			</div>
			<div class="col-md-12" style="border-bottom: 1px solid #d7d8d9"></div>
			<button class="btn btn-danger" style="float: left; margin-top: 11px;">Report</button>
		</div>
		<div class="col-md-10 col-md-offset-1 consultation">
			<div style="min-height: 100px">
			<img src="{{ asset('images/photo-3.jpg')}}" style="float: right; border-radius: 50px" class="col-md-1">
			<p> Hi it's Answer</p>
			</div>
			<div class="col-md-12" style="border-bottom: 1px solid #d7d8d9"></div>
			
		</div>
	</div>
@endsection

@section('js')

@endsection