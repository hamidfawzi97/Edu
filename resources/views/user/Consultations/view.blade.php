@extends('user/master')

@section('content')
 <?php
                if(!Auth::guest()){
                    $userID = \Auth::user()->id;
                    $userR = \Auth::user()->role;
                }else{
                    $userID = "Not Logged";
                    $userR  = " ";
                }

                ?>
	<div class="container">
<div class="col-md-12" style="border-bottom: 1px solid #3d84e6;"></div>
		
    <br>

		<div class="consultation" style="margin-bottom: 30px;">
	        <div class="col-md-10 consultation_content">
	            <!-- <img src="{{ asset('images/question.png')}}" class="cons_picture"> -->
	            <p>{{ $cons['Question'] }}</p>
	        </div>
	        <div class="col-md-10" style="border-bottom: 1px solid #3d84e6; margin-bottom: 9px;"></div>    
	        <div class="col-md-10" class="cons_ans">
	        	<span class="cons_ans">{{ $cons['Category']}}</span>
	        </div>
	    </div>


		<div class="row commDiv">

            <div class="col-md-12 col-md-offset-1">
                    <div id="answers"> <!-- id="comments" -->
                        @foreach($answers as $ans)
                        	<div class="col-md-10 consultation" style="margin-bottom: 30px;">
                            @if($userID == $ans['Consulter_id'])
                        		<div class="btn-group" style="float:right;margin-top: 10px;">
			                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" style="border:none">
			                        	<span class="fa fa-ellipsis-h"></span>
			                        </button>
			                        <ul class="dropdown-menu" role="menu" style="min-width: 93px;">
			                        	<li style="cursor:pointer;"><a id="{{$ans['ID']}}" class="delete">Delete</a></li>
			                            <li style="cursor:pointer;"><a id="{{$ans['ID']}}" class="edit" name=" ">Edit</a></li>
			                        </ul>
			                    </div>
                            @endif
          								<div class="col-md-10 consultation_content">
          									<p>{{$ans['Answer']}}</p>
          								</div>
          								<input type="hidden" class="hidans" value="{{$ans['Answer']}}">
          								<div class="col-md-11" style="border-bottom: 1px solid #3d84e6;"></div>
                          <button class="buton col-md-2 addreply" id="{{$ans['ID']}}" name=" ">Add Reply</button>
          							</div>
                        @foreach($replys as $reply)
                        @if($ans['ID'] == $reply['Answer_id'])
                        <div class="col-md-9 col-md-offset-1 consultation" style="margin-bottom: 30px;">
                          @if($userID == $reply['ReplyFrom'])
                            <div class="btn-group" style="float:right;margin-top: 10px;">
                              <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" style="border:none">
                                <span class="fa fa-ellipsis-h"></span>
                              </button>
                              <ul class="dropdown-menu" role="menu" style="min-width: 93px;">
                                <li style="cursor:pointer;"><a id="{{$reply['ID']}}" class="delete_r">Delete</a></li>
                                  <li style="cursor:pointer;"><a id="{{$reply['ID']}}" class="edit_r" name=" ">Edit</a></li>
                              </ul>
                          </div>
                          @endif
                          <div class="col-md-10 consultation_content">
                            <p>{{ $reply['Reply'] }}</p>
                          </div>
                          <input type="hidden" class="hidans_r" value="{{$reply['Reply']}}">
                          <div class="col-md-11" style="border-bottom: 1px solid #3d84e6;"></div>
                        </div>
                        @endif
                        @endforeach
                        @endforeach
                    </div>
                    @if($userR == 2 || $userR == 3)
                    <textarea id="{{ $cons['ID'] }}" style="margin-top: 20px; resize: none;" class="form-control col-md-10 textarea" name="answer" placeholder="Write your Answer .."></textarea><!-- name="comment" -->
                    <button id="submit" class="buton col-md-2" style="margin-top: 10px; float: right;">Add Answer</button>
                    @endif
            </div>
        </div>
	</div>
@endsection

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

<script type="text/javascript">











    $("#submit").click(function(){
        var text = $('.textarea').val();
        var consID = $('.textarea').attr('id');

        $.ajax({
            url:"/addanswer",
            type:"POST",
            data:{_token : '<?php echo csrf_token() ?>', answer:text, cons_id: consID},
            success:function (data) {
                  $("#answers").html(data);
            }
        })
    });

     $(document).on('click', '.delete', function() { 

            var ansID = $(this).attr('id');
            var confir = confirm('Ary you sure you want delete this Answer ?');
            if(confir){
                      $.ajax({
                      url:"/deleteanswer",
                     type:"GET",
                      data:{_token : '<?php echo csrf_token() ?>', answer:ansID},
                      success:function (data) {
                      				$("#answers").html(data);
                            }
                     })
            }else{
                
            }
    });

    $(document).on('click', '.edit', function() { 
            var ans_id = $(this).attr('id');
            var val = $(this).parents('.consultation').children('.hidans').val();
            if($(this).attr('name') == " "){
                $(this).parents('.consultation').append('<input type="text" value="'+val+'" class="form-control edt" style="display:inline-block;width:80%;margin-top:10px;"> <button class="btn btn-primary save" id="'+ans_id+'" " style="margin-left:15px;">Save</button>');
            }
            $(this).attr("name","clicked");
    });

     $(document).on('click', '.save', function() { 
            var ans_id = $(this).attr('id');
            var val = $(this).siblings('.edt').val();
            $.ajax({
            url:"/editanswer",
            type:"GET",
            data:{_token : '<?php echo csrf_token() ?>', answer:val , id:ans_id},
            success:function (data) {
                  $("#answers").html(data);
                  $(".save").remove();
                  $(".edt").remove();
                  $('#'+ans_id).attr('name'," ");
            }
        })
          
    });
























// ------------------------------------------------------------------------------------------------------------


     $(document).on('click', '.delete_r', function() { 

            var replyID = $(this).attr('id');
            var confir = confirm('Ary you sure you want delete this Reply ?');
            if(confir){
                      $.ajax({
                      url:"/deleteconsreply",
                     type:"GET",
                      data:{_token : '<?php echo csrf_token() ?>', reply:replyID},
                      success:function (data) {
                              $("#answers").html(data);
                          }
                     })
            }else{
                
            }
    });

    $(document).on('click', '.edit_r', function() { 
            var reply_id = $(this).attr('id');
            var val = $(this).parents('.consultation').children('.hidans_r').val();
            if($(this).attr('name') == " "){
                $(this).parents('.consultation').append('<input type="text" value="'+val+'" class="form-control edt_r" style="display:inline-block;width:80%;margin-top:10px;"> <button class="btn btn-primary save_r" id="'+reply_id+'" " style="margin-left:15px;">Save</button>');
                                      
            }
            $(this).attr("name","clicked");
    });

     $(document).on('click', '.save_r', function() { 
            var reply_id = $(this).attr('id');
            var val = $(this).siblings('.edt_r').val();
            $.ajax({
            url:"/editconsreply",
            type:"GET",
            data:{_token : '<?php echo csrf_token() ?>', reply:val , id:reply_id},
            success:function (data) {
                  $("#answers").html(data);
                  $(".save_r").remove();
                  $(".edt_r").remove();
                  $('#'+reply_id).attr('name'," ");
            }
        })
          
    });























// ----------------------------------------------------------------------------
    $(document).on('click', '.addreply', function() { 
            var ans_id = $(this).attr('id');
            if($(this).attr('name') == " "){
                $(this).parents('.consultation').append('<textarea class="form-control col-md-12 edt2" style="resize: none;margin-bottom: 10px;" placeholder="Type your reply..."></textarea><button class="buton savereply col-md-2" id="'+ans_id+'">Save</button>');
                                      
            }
            $(this).attr("name","clicked");
    });
    
    $(document).on('click', '.savereply', function() { 
        var ans_id = $(this).attr('id');
        var val = $(this).siblings('.edt2').val();   
      
        $.ajax({
            url:"/addconsreply",
            type:"GET",
            data:{_token : '<?php echo csrf_token() ?>', reply:val , answer_id:ans_id},
            success:function (data) {
                  $("#answers").html(data);
                  $(".savereply").remove();
                  $(".edt2").remove();
                  $('#'+ans_id).attr('name'," ");
            }
        })

    });


</script>

@endsection