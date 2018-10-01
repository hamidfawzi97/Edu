@extends('user/master')

@section('content')
    <header id="head" class="secondary">
        <div class="container">
            <h1> {{ $course['CourseName'] }}</h1>
        </div>
    </header>


    <div class="row">
        <div class="row" style="margin-bottom:50px;">

            <aside class="col-md-2" style="padding-right:1px;">
                @foreach($videos as $vid)
                <div class="col-md-12 courseVideoAside">
                    <h2 style="margin:10px;">Video {{$vid['Ord']}}<span class="glyphicon glyphicon-plus" style="float:right; font-weight:bolder;"></span> </h2>
                </div>
                @endforeach
                <!-- 
                <div class="col-md-12 courseQuizAside">
                    <h2 style="margin:10px;">Quiz 1 <span class="glyphicon glyphicon-plus" style="float:right; font-weight:bolder;"></span> </h2>
                </div> -->
                <button class="btn btn-success" style="width:100%; margin-top:1px;">Done</button>
            </aside>


            <div align="center" class="embed-responsive embed-responsive-16by9 col-md-8 col-md-offset-1" style="margin-top: 10px;">
                <video class="embed-responsive-item" controls>
                    <source src="small.mp4" type="video/mp4">
                </video>
            </div>
        </div>

        
        <div class="row">

            <div class="col-md-9 col-md-offset-2">
                <!-- Comments to view -->
                    <div id="comments">
                        
                    </div>
                <!-- Comment add -->

                        <textarea id="textarea" style="margin-top: 20px;" class="form-control col-md-6" name="comment" placeholder="Write your comment"></textarea>
                        <button id="submit" class="btn btn-primary col-md-2" style="margin-top: 10px; float: right;">Send</button>

            </div>
        </div>

    </div>
@endsection
    <!-- End Footer -->

<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

<script type="text/javascript">

    $("#submit").click(function(){
        var text = $('#textarea').val();
        $.ajax({
            url:"/addcomment",
            type:"POST",
            data:{_token : '<?php echo csrf_token() ?>', comment:text},
            success:function (data) {
                  $("#comments").html(data);
            }
        })
    });

     $(document).on('click', '.delete', function() { 

            var com_id = $(this).attr('id');
            var confir = confirm('Ary you sure you want delete this comment?');
            if(confir){
                      $.ajax({
                      url:"/deletecomment",
                     type:"GET",
                      data:{_token : '<?php echo csrf_token() ?>', comment:com_id},
                      success:function (data) {

                             $("#comments").html(data);
                             }
                     })
            }else{
                
            }
    });

    $(document).on('click', '.edit', function() { 
            var com_id = $(this).attr('id');
            var val = $(this).parents('.commentsDiv').children('.com').val();
            var node = document.getElementById(com_id);
            if($(this).attr('name') == " "){
                $(this).parents('.commentsDiv').append('<input type="text" value="'+val+'" class="form-control edt"> <button class="btn btn-primary save" id="'+com_id+'" ">Save</button>');
          
            }
            $(this).attr("name","clicked");
    });

     $(document).on('click', '.save', function() { 
            var com_id = $(this).attr('id');
            var val = $(this).siblings('.edt').val();
            $.ajax({
            url:"/editcomment",
            type:"GET",
            data:{_token : '<?php echo csrf_token() ?>', comment:val , id:com_id},
            success:function (data) {
                  $("#comments").html(data);
                  $(".save").remove();
                  $(".edt").remove();
                  $('#'+com_id).attr('name'," ");
            }
        })
          
    });

</script>
@endsection
