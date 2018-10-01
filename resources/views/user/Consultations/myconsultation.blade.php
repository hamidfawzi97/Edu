@extends('user/master')

@section('content')
<div class="col-md-12" style="border-bottom: 1px solid #3d84e6; margin-bottom: 15px;"></div>
<div class="container">
<a href ="{{ route('addConsultation') }}" class="buton2 col-md-2">Add Question</a>
<div class="consultations col-md-8 col-md-offset-4">
                @foreach($consult as $cons)
                <div class="consultation" style="margin-bottom: 30px;">
                    <div class="col-md-12 consultation_content">
                        <img src="{{ asset('images/question.png')}}" class="cons_picture">
                        <p>{{$cons->Question}}</p>
                    </div>
                    <div class="col-md-10" style="border-bottom: 1px solid #3d84e6; margin-bottom: 9px;"></div>    
                    <div class="col-md-10" class="cons_ans"><span class="cons_ans">10 Answers</span>
                        <a href="{{ action('consultationController@show',$cons) }}" class="col-md-2 buton2" style="float: right;">View</a>
                    </div>
                </div>
                @endforeach
        </div>            
    
</div>
         @endsection
   @section('js')
        <!-- JavaScript libs are placed at the end of the document so the pages load faster -->
        <script>
            var node = document.getElementById("MyConsultations");
            node.setAttribute("class", "active");
        </script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script src="assets/js/custom.js"></script>
        <script type="text/javascript">
            $(document).on('click', '.delete', function() { 

            var con_id = $(this).attr('id');
            var confir = confirm('Ary you sure you want delete this consultation?');
            if(confir){
                      $.ajax({
                      url:"/deleteconsultation",
                      type:"GET",
                      data:{_token : '<?php echo csrf_token() ?>', cons:con_id},
                      success:function (data) {

                             $("#cons").html(data);
                             }
                     })
            }else{
                
            }
    });
        </script>
 @endsection