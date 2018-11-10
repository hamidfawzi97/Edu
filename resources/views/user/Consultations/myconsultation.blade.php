@extends('user/master')

@section('content')
    <?php
    $i=0;
                if(!Auth::guest()){
                    $userID = \Auth::user()->id;
                }else{
                    $userID = "Not Logged";
                }

                ?>

    <div class="container" style="min-height: 504px">
        <div class="col-md-12" style="border-bottom: 1px solid #3d84e6; margin-bottom: 15px;"></div>
            <div class="col-md-3 col-xs-12 category">
                    <div class="category_head"><h3>Categories</h3></div>
                    <div class="categories">
                        <ul class="">
                        <li>
                            <label class="checkboxcontainer">Computer Science
                            <input type="checkbox"  name="computer science" id="check1">
                            <span class="checkmark"></span>
                            </label>
                        </li>
                        <li>
                            <label class="checkboxcontainer">Project Management
                            <input type="checkbox"  name="project management" id="check2">
                            <span class="checkmark"></span>
                            </label>
                        </li>
                        <li>

                            <label class="checkboxcontainer">Management
                            <input type="checkbox"  name="management" id="check3">
                            <span class="checkmark"></span>
                            </label>

                        </li>
                        <li>
                            <label class="checkboxcontainer">Human Resources
                            <input type="checkbox"  name="human resources" id="check4">
                            <span class="checkmark"></span>
                            </label>
                        </li>
                    </ul>
                    </div>
                    @if($userID != "Not Logged")
                    <a href ="{{ route('addConsultation') }}" class="buton2 col-md-7 col-xs-12" style="margin-top: 10px; padding-bottom: 9px;padding-top: 10px">Add Question</a>
                     <button class="buton col-md-3 col-xs-6 col-md-offset-2 col-xs-12" id="cheek">Apply</button>
                    @else
                    <button class="buton col-md-3 col-xs-6 col-md-offset-9 col-xs-12" id="cheek">Apply</button>
                    @endif
                </div>
        <div class="consultations col-md-8 col-md-offset-1 col-xs-12">
                <?php $i = 0;?>
                @foreach($consult as $cons)
               <div class="consultation" style="margin-bottom: 30px;">
                    <div class="col-md-12 consultation_content">
                        <img src="{{ asset('images/question.png')}}" class="cons_picture">
                        <div value="{{$cons->Question}}">
                            @if(strlen($cons->Question) > 30)
                                            {{ substr($cons->Question, 0 ,29) }}
                                            <?php echo"...."?>

                                    @else
                                            {{ $cons->Question }}
                                    @endif</div>
                    </div>
                    <div class="col-md-10 dadada" style="border-bottom: 1px solid #3d84e6; margin-bottom: 9px;"></div>    
                    <div class="col-md-10 cons_ans"><span class="cons_ans col-md-2">{{ $ans[$i] }} Answers</span>
                        <a href="{{ action('consultationController@show',$cons['ID']) }}" class="col-md-2 buton2" style="float: right;">View</a>
                    @if($cons->User_id == $userID)
                        <button class="buton2 col-md-2 del" id="{{$cons['ID']}}" style="margin-right:10px;">Delete</button>
                        <button class="buton2 col-md-2 edt" id="{{$cons['ID']}}" name=" ">Edit</button>
                        <input id="q" type="hidden" name="hidden" value="{{$cons->Question}}">
                    @endif  
                    </div>
                </div>
                <?php $i++;?>
                @endforeach
        </div>            

</div>
   @endsection
   @section('js')
        <script>
            var node = document.getElementById("MyConsultations");
            node.setAttribute("class", "active");
        </script>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script src="assets/js/custom.js"></script>

        <script type="text/javascript">
             $(document).on('click', '#cheek', function() {
                // var arr = new Array(); 
                // var cont = 0;
                alert('hi');
                // for (var i = 1; i <= 4; i++) {
                //   if ($('#check'+i).is(':checked')) {
                //     arr.push($('#check'+i).attr('name'));
                //   }
                // }if(arr.length > 0){
                //   $.ajax({
                //     url:"/getconsbycategory",
                //     type:"GET",
                //     data:{_token: '<?php echo csrf_token() ?>',category:arr},
                //     success:function (data) {
                //        $(".consultations").html(data);
 
                //     }
                //   });
                // }else{
                //   var arr2 = new Array();
                //   for (var i = 0; i <= 4; i++) {
                //     arr2.push($('#check'+i).attr('name'));
                //   }
                //   $.ajax({
                //     url:"/getconsbycategory",
                //     type:"GET",
                //     data:{_token: '<?php echo csrf_token() ?>',category:arr2},
                //     success:function (data) {
                //        $(".consultations").html(data); 
                //     }
                //   });
                // }
             });


        </script>
   @endsection