@extends('user/master')

@section('content')
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

            <aside class="col-md-2" style="padding-right:1px;margin-top: 10px;">
                @foreach($videos as $vid)
                <div class="col-md-12 courseVideoAside">
                    <h2 style="margin:10px;">
                        Video {{$vid['Ord']}}
                        <span id="videoSpan" class="glyphicon glyphicon-plus" style="float:right; font-weight:bolder;"  onclick="getElementById('videoo').innerHTML= '{{ $vid['Link'] }}' "></span>
                    </h2>
                </div>
                <?php $count = 0; ?>
                @foreach($quizz as $quiz)
                @if($quiz['Video_id'] == $vid['ID'])
                <?php $count++; ?>
                @endif
                @endforeach
                @if($count > 0)
                <div class="col-md-12 courseQuizAside">
                    <h2 style="margin:10px;">
                        Quiz {{$vid['Ord']}}
                        <span class="glyphicon glyphicon-plus quizspan" style="float:right; font-weight:bolder" id="{{$vid['ID']}}"></span>
                    </h2>
                </div>
                @endif
                @endforeach
                
            </aside>

            
            <div class="col-md-10" id="videoo" style="margin-top: 10px;">
                
            </div>
        </div>

        
        <div class="row commDiv">

            <div class="col-md-9 col-md-offset-2">
                <!-- Comments to view -->
                    <div id="comments">
                        
                    </div>
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

</script>

@endsection
