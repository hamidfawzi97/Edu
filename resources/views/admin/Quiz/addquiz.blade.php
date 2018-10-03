@extends('admin/admin_master')
@section('content')
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="{{ url('/admin-course')}}">Courses</a></li>
                            <li class="active">Course Content</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Course Content</strong>
                            <!-- <label><input type="checkbox" class="check" id="checkAll"> Check All</label> |

                            <a href="#" class="col-md-2 col-md-offset-10">Delete </a> -->
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-lg-12">
                                    <form class="ques_form" method="POST" action="{{ action('quizController@store') }}" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div style="margin-bottom: 10px;" class="ques_header">
                                            <label>No. of questions:</label>
                                            <input class="form-control ques_num" value="1" min="1" type="number" name="questions_num" style="width: 5%; padding-left: 5px; margin-left: 5px; display: inline;"/>

                                            <button id="add_more" class="btn btn-primary">Add Questions</button>
                                        </div>
                                        <input type="hidden" name="videoID" value="{{ $videoID }}">
                                        
                                        <div class="newQues" style="margin-bottom: 30px;"></div>
                                        <input class="btn btn-success submit" type="submit" name="submit" value="Add" disabled=""/>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="{{ asset('admin/js/vendor/jquery-2.1.4.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="{{ asset('admin/js/plugins.js')}}"></script>
    <script src="{{ asset('admin/js/main.js')}}"></script>

    <script src="{{ asset('admin/js/lib/data-table/datatables.min.js')}}"></script>
    <script src="{{ asset('admin/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ asset('admin/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('admin/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
    <script src="{{ asset('admin/js/lib/data-table/jszip.min.js')}}"></script>
    <script src="{{ asset('admin/js/lib/data-table/pdfmake.min.js')}}"></script>
    <script src="{{ asset('admin/js/lib/data-table/vfs_fonts.js')}}"></script>
    <script src="{{ asset('admin/js/lib/data-table/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('admin/js/lib/data-table/buttons.print.min.js')}}"></script>
    <script src="{{ asset('admin/js/lib/data-table/buttons.colVis.min.js')}}"></script>
    <script src="{{ asset('admin/js/lib/data-table/datatables-init.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#add_more").on('click',function(e){
                e.preventDefault();
                $(".submit").removeAttr("disabled");
                var number = $(".ques_num").val();

                k = 1;
                for(i=0; i< number; i++){
                    $(".newQues").append('<div class="ques_div" style="margin-bottom: 30px;">\
                            <button class="delete_ques" style="background:none; border:none; float:right;"><span class="fa fa-close"></span></button>\
                        '+k+'. <input required="" class="form-control" type="text" name="question'+k+'" placeholder="Question" style="width: 66%; padding-left: 5px; margin-left: 5px; display: inline;"/>\
                        <div class="ans_div'+k+'" style="margin-top: 10px; margin-left: 50px;">\
                                \
                        </div>\
                        <hr/></div>\
                    ');

                    
                    $(".ans_div"+k).append('<input class="form-control" type="text" name="firstAns'+k+'" placeholder="First Answer" style="width: 15%; padding-left: 5px; margin-left: 5px; display: inline;"/>\
                                <input required="" class="form-control" type="text" name="secondAns'+k+'" placeholder="Second Answer" style="width: 15%; padding-left: 5px; margin-left: 5px; display: inline;"/>\
                                <input required="" class="form-control" type="text" name="thirdAns'+k+'" placeholder="Third Answer" style="width: 15%; padding-left: 5px; margin-left: 5px; display: inline;"/>\
                                <input required="" class="form-control" type="text" name="fourthAns'+k+'" placeholder="Fourth Answer" style="width: 15%; padding-left: 5px; margin-left: 5px; display: inline;"/>\
                                <input required="" class="form-control" type="text" name="correctAns'+k+'" placeholder="Correct Answer" style="width: 15%; padding-left: 5px; margin-left: 5px; display: inline;"/>');
                    

                    k++;
                }
                $(".ques_header").css("display","none");
                $(".delete_ques").on('click',function(h){
                    h.preventDefault();
                    $(this).parent().remove();
                    $(".ques_num").val($(".ques_num").val()-1);
                });
                $(".ques_div:first-child button:first-child").remove();
            });

        });

    </script>



@endsection
