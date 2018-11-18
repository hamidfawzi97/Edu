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
    <style type="text/css">
        .glyphicon:hover{
            cursor: pointer;
        }
    </style>
    <header id="head" class="secondary">
        <div class="container">
            <h1> {{ $course['CourseName'] }}</h1>
        </div>
    </header>


    <div class="row">
        <div class="row" style="margin-bottom:50px;">

            <aside class="col-md-1 aside" style="padding: 0px 0px;margin-top: 10px; @if($videos) @if(sizeof($videos) > 10) height: 820px; overflow-y: scroll; @endif @endif">
                @if($videos)
                @foreach($videos as $vid)
                <div class="col-md-10 col-md-offset-1 courseVideoAside lesson" id="{{ $vid['ID'] }}" onclick="getElementById('videoo').innerHTML= '{{ $vid['Link'] }}' ">
                    <h2 style="margin:10px; cursor: pointer; font-size: 16px;" onclick="getElementById('videoo').innerHTML= '{{ $vid['Link'] }}' ">
                        V {{$vid['Ord']}}
                    </h2>
                </div>
                <?php $count = 0; ?>
                @if($quizz)
                @foreach($quizz as $quiz)
                @if($quiz['Video_id'] == $vid['ID'])
                <?php $count++; ?>
                @endif
                @endforeach
                @endif
                @if($count > 0)
                <div class="col-md-10 col-md-offset-1 courseQuizAside quizspan" id="{{$vid['ID']}}">
                    <h2 style="margin:10px; cursor: pointer; font-size: 16px;">
                        Q {{$vid['Ord']}}
                    </h2>
                </div>
                @endif
                @endforeach
                @endif
                
            </aside>

            
            <div class="col-md-10" id="videoo" style="margin-top: 10px;">
                
            </div>
        </div>

        
        <div class="row commDiv">

            <div class="col-md-9 col-md-offset-2">
                <!-- Comments to view -->
                    <div id="comments">
                        
                    </div >
                <!-- Comment add -->

                        <textarea id="textarea" style="margin-top: 20px; resize: none;" class="form-control col-md-6" name="comment" placeholder="Write your comment"></textarea>
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
    $('.commDiv').hide();
    var currentVideo;
    $("#submit").click(function(){
        var text = $('#textarea').val();
        $.ajax({
            url:"/addcomment",
            type:"POST",
            data:{_token : '<?php echo csrf_token() ?>', comment:text ,VideoID : currentVideo},
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
                      data:{_token : '<?php echo csrf_token() ?>', comment:com_id,videoID: currentVideo},
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
            data:{_token : '<?php echo csrf_token() ?>', comment:val , id:com_id,videoID: currentVideo},
            success:function (data) {
                  $("#comments").html(data);
                  $(".save").remove();
                  $(".edt").remove();
                  $('#'+com_id).attr('name'," ");
            }
        })
          
    });


    $(document).on('click', '.quizspan', function(e){
        e.preventDefault();

        $('.commDiv').hide();

        var vid_id = $(this).attr('id');

        $.ajax({
            url:'/getQuizByVideo',
            type:'GET',
            data:{_token: "<?= csrf_token(); ?>" ,videoID: vid_id},
            success:function(data){
                $('#videoo').html(data);
            }
        });
    });


    $('#videoSpan').on('click', function(){
        $('.commDiv').show();
    });

     $(document).on('click', '.lesson', function(e){
        $('.commDiv').show();
        currentVideo = $(this).attr('id');
         $.ajax({
            url:'/getCommentsByVid',
            type:'GET',
            data:{_token: "<?= csrf_token(); ?>" ,videoID: currentVideo},
            success:function(data){
                $("#comments").html(data);
            }
        });
    });

    $('.courseVideoAside , .courseQuizAside').on('mouseenter', function(){
        $(this).animate({
            width:'103px'
        });
    }).on('mouseleave', function(){
        $(this).animate({
            width:'78px'
        });
    });

    // $('#videoSpan').on('click', function(){
    //     $('#quizz').hide();
    //     $('#videoo').show();
    //     $('.commDiv').show();
    // });


</script>

@endsection
