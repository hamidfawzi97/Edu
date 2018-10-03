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
                            <li><a href="">Video</a></li>
                            <li class="active">Video Quizes</li>
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
                            <strong class="card-title">Video Quizes</strong>
                            <!-- <label><input type="checkbox" class="check" id="checkAll"> Check All</label> |

                            <a href="#" class="col-md-2 col-md-offset-10">Delete </a> -->
                        </div>
                        <div class="card-body">
                          <div class="col-lg-12">
                            <table id="questions" class="table table-striped table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style="text-align:center">Video ID</th>
                                        <th style="text-align:center">Question</th>
                                        <th style="text-align:center">First Answer</th>
                                        <th style="text-align:center">Second Answer</th>
                                        <th style="text-align:center">Third Answer</th>
                                        <th style="text-align:center">Fourth Answer</th>
                                        <th style="text-align:center">Correct Answer</th>
                                        <th style="text-align:center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($quizes as $quiz) { ?>
                                        <tr id="question-{{ $quiz['ID'] }}">
                                            <td><?= $quiz['Video_id'] ?></td>

                                            <td contenteditable id="questiontext-<?= $quiz['ID'] ?>" onfocus="edit_img(<?= $quiz['ID'] ?>);" ><?= $quiz['question'] ?></td>

                                                <td style="text-align:center" contenteditable id="ch1text-<?= $quiz['ID'] ?>" onfocus="edit_img(<?= $quiz['ID'] ?>);" ><?= $quiz['ch1'] ?></td>

                                                <td style="text-align:center" contenteditable id="ch2text-<?= $quiz['ID'] ?>" onfocus="edit_img(<?= $quiz['ID'] ?>);" ><?= $quiz['ch2'] ?></td>

                                                <td style="text-align:center" contenteditable id="ch3text-<?= $quiz['ID'] ?>" onfocus="edit_img(<?= $quiz['ID'] ?>);" ><?= $quiz['ch3'] ?></td>

                                                <td style="text-align:center" contenteditable id="ch4text-<?= $quiz['ID'] ?>" onfocus="edit_img(<?= $quiz['ID'] ?>);" ><?= $quiz['ch4'] ?></td>

                                                <td style="text-align:center" contenteditable id="answertext-<?= $quiz['ID'] ?>" onfocus="edit_img(<?= $quiz['ID'] ?>);" ><?= $quiz['answer'] ?></td>
                                                
                                            <td style="text-align:center" id="actionsTD">
                                                <a id="edit_button<?= $quiz['ID'] ?>" href = "javascript:EditQuestion(<?= $quiz['ID'] ?>)" title = "Edit Question"><img id="edit_img<?= $quiz['ID'] ?>" src = "{{ asset('images/Edit.png') }}" width="23" height="23" alt = "Edit Question"></a>

                                                <a href = "javascript:DeleteQuestion(<?= $quiz['ID'] ?>)" title = "Delete"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                            </table>
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


    <script>

        function DeleteQuestion(id) {
            var check = confirm("Are You sure You want to permanently delete this question?");
            if (check === true) {
                $.ajax({
                    url: "/deleteQuizQuestion",
                    type: "GET",
                    data: {_token: "<?php echo csrf_token(); ?>" ,id: id},
                    success: function () {
                        $("#question-" + id).remove();
                    }
                });
            }
        }
        
        function EditQuestion(id){

            var question = $("#questiontext-"+id).html();
            var ch1 = $("#ch1text-"+id).html();
            var ch2 = $("#ch2text-"+id).html();
            var ch3 = $("#ch3text-"+id).html();
            var ch4 = $("#ch4text-"+id).html();
            var answer = $("#answertext-"+id).html();

            if(question != '' && ch1 != '' && ch2 != ''){

                $.ajax({
                    url: "/editQuizQuestion",
                    type: "GET",
                    data: {_token: "<?php echo csrf_token(); ?>", id: id, question: question, ch1: ch1, ch2: ch2, ch3: ch3, ch4: ch4, answer: answer},
                    success: function () {
                        $("#edit_img"+id).attr('src', '<?= asset("images/Edited.png")?>');
                    }
                });
            }
                            

        }
        
        function edit_img(id){
            $("#qimg-"+id).on('click',function(){
                $("#edit_img"+id).attr('src', '<?= asset("images/Edit.png")?>');
            });

            $("#questiontext-"+id+" ,  #ch1text-"+id+" , #ch2text-"+id+" , #ch3text-"+id+" , #ch4text-"+id+" , #answertext-"+id+"").on('keydown',function(){
                $("#edit_img"+id).attr('src', '<?= asset("images/Edit.png")?>');
            });
        }

        $(document).ready(function () {
            $('#questions').DataTable();
            
        });
        
        
    </script>

@endsection
