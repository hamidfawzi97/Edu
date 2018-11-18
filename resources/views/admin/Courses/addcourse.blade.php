@extends('admin.admin_master')
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
               <li class="active">Add Course</li>
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
                  <strong class="card-title">Add Course</strong>
               </div>
               <div class="card-body">
                  <form method="POST" action="{{ action('coursesController@store') }}" enctype="multipart/form-data">
                     {{ csrf_field() }}
                     <input type="text" name="c_name" placeholder="Course Name" class="form-control col-md-4" required="" /><br>
                     <textarea rows="4" name="c_description" placeholder="Description" class="form-control col-md-4" style="resize:none;" required=""></textarea>
                     <br>
                     <label>Objectives</label>
                     <div style="margin-bottom: 10px;" class="object_header">
                        <label>No. of Objectives:</label>
                        <input class="form-control obj_num" value="1" min="1" type="number" name="obj_num" style="width: 5%; padding-left: 5px; margin-left: 5px; display: inline;"/>
                        <button id="add_obj" class="btn btn-primary">Add Objectives</button>
                     </div>
                     <div class="newObj" style="margin-bottom: 30px;"></div>
                     <label>Who Should Attend</label>
                     <div style="margin-bottom: 10px;" class="should_header">
                        <label>No. of Points of Who Should Attend :</label>
                        <input class="form-control point_num" value="1" min="1" type="number" name="point_num" style="width: 5%; padding-left: 5px; margin-left: 5px; display: inline;"/>
                        <button id="add_points" class="btn btn-primary">Add The Points</button>
                     </div>
                     <div class="newPoi" style="margin-bottom: 30px;"></div>
                     <label>Category</label>
                     <select name="category" class="form-control col-md-4">
                        <option value="computer science">Computer Science</option>
                        <option value="project management">Project Management</option>
                        <option value="management">Management</option>
                        <option value="human resources">Human Resources</option>
                     </select>
                     <br>
                     <input type="text" name="inst_name" placeholder="Instructor Name" class="form-control col-md-4" required="" /><br>
                     <input type="number" name="price" placeholder="Price" class="form-control col-md-4"/><br>  
                     <label for="c_demoVideo">Demo Video</label>
                     <input type="file" name="c_demoVideo" placeholder="Demo Video" class="form-control col-md-4" required="" /><br>
                     <label for="certificate">Certificate</label>
                     <input type="file" name="certificate" placeholder="Certificate" class="form-control col-md-4" required="" /><br>
                     <label for="c_pdf">PDF</label>
                     <input type="file" name="c_pdf" placeholder="Pdf" class="form-control col-md-4" required="" /><br>
                     <label for="c_img">Course Image</label>
                     <input type="file" name="c_img" placeholder="Course Image" class="form-control col-md-4" required="" /><br>
                     <label for="ins_img">Instructor Image</label>
                     <input type="file" name="ins_img" placeholder="Instructor Image" class="form-control col-md-4" required="" /><br>
                     <input type="submit" name="submit" value="Add" class="col-md-1 btn btn-success submit"/>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- .animated -->
</div>
<!-- .content -->
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
   $(document).ready(function() {
     $('#bootstrap-data-table-export').DataTable();
   } );
   
   $("#checkAll").click(function () {
       $(".check").prop('checked', $(this).prop('checked'));
   });

        $("#add_obj").on('click',function(e){
                e.preventDefault();
                $(".submit").removeAttr("disabled");
                var number = $(".obj_num").val();
   
                k = 1;
                for(i=0; i< number; i++){
                    $(".newObj").append('<input type="text" name="objective[]" placeholder="Objective '+(i+1)+'" class="form-control col-md-4" required="" /><br>');
                }
                $(".object_header").css("display","none");
                // $(".delete_ques").on('click',function(h){
                //     h.preventDefault();
                //     $(this).parent().remove();
                //     $(".ques_num").val($(".ques_num").val()-1);
                // });
                // $(".ques_div:first-child button:first-child").remove();
            });


        $("#add_points").on('click',function(e){
                e.preventDefault();
                $(".submit").removeAttr("disabled");
                var number = $(".point_num").val();
   
                k = 1;
                for(i=0; i< number; i++){
                    $(".newPoi").append('<input type="text" name="points[]" placeholder="Point '+(i+1)+'" class="form-control col-md-4" required="" /><br>');
                }
                $(".should_header").css("display","none");
                // $(".delete_ques").on('click',function(h){
                //     h.preventDefault();
                //     $(this).parent().remove();
                //     $(".ques_num").val($(".ques_num").val()-1);
                // });
                // $(".ques_div:first-child button:first-child").remove();
            });
</script>
@endsection