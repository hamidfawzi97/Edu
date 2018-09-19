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
                            <li class="active">Courses</li>
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
                            <strong class="card-title">Courses Table</strong>
                            <label><input type="checkbox" class="check" id="checkAll"> Check All </label> |
                            <a href="{{ url('/admin-addcourse') }}" class="btn btn-primary" style="float: right; border-radius: 5px;">Add Course</a>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered coursesTable">
                    <thead>
                      <tr>
                        <th scope="col-md-1">#</th>
                        <th style="text-align: center;">Name</th>
                        <th style="text-align: center;">Descreption</th>
                        <th style="text-align: center;">Rate</th>
                        <th style="text-align: center;">Demo video</th>
                        <th style="text-align: center;">Certificate</th>
                        <th style="text-align: center;">Instructor Name</th>
                        <th style="text-align: center;">PDF</th>
                        <th style="text-align: center;">Add Content</th>
                        <th style="text-align: center;">Show Content</th>
                        <th style="text-align: center;">Delete | Edit</th>
                      </tr>
                    </thead>
                    <tbody id="courses">
                    @if(!$courses == '')
                    @foreach($courses as $cour)
                      <tr id="{{ $cour['ID'] }}"> 
                        <td style="text-align: center;" scope="row"><input type="checkbox" class="check" /></td>
                        <td style="text-align: center;">
                            <a href="{{ action('userCoursesController@show',$cour['ID']) }}">
                                {{ $cour['CourseName'] }}
                            </a>
                        </td>
                        <td style="text-align: center;">{{ $cour['Description'] }}</td>
                        <td style="text-align: center;">{{ $cour['Rate'] }}</td>
                        <td style="text-align: center;">{{ $cour['VideoInduction'] }}</td>
                        <td style="text-align: center;">{{ $cour['Certificate'] }}</td>
                        <td style="text-align: center;">{{ $cour['InstructorName'] }}</td>
                        <td style="text-align: center;">{{ $cour['Pdf'] }}</td>
                        <td style="text-align: center;">
                            <a class="btn btn-success" href="{{ action('videoController@add_content',$cour['ID']) }}" style=" border-radius: 5px;">Add</a>
                        </td>
                        <td style="text-align: center;">
                            <a class="btn btn-primary" href="{{ action('videoController@show',$cour['ID']) }}" style=" border-radius: 5px;">Show</a>
                        </td>
                        <td style="text-align: center;">
                            <a href = "#" id="{{ $cour['ID'] }}" class="ti-trash delete" title="Delete"></a>
                            <a class="ti-pencil" title="Edit" href="{{ action('coursesController@edit',$cour['ID']) }}"></a>
                        </td>
                      </tr>
                    @endforeach
                    @endif
                    </tbody>
                  </table>
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
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

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


        $(document).on('click', '.delete', function() { 

            var cor_id = $(this).attr('id');
            var confir = confirm('Ary you sure you want delete this course?');
            if(confir){
                      $.ajax({
                      url:"/deletecourse",
                      type:"GET",
                      data:{_token : '<?php echo csrf_token() ?>', course:cor_id},
                      success:function (data) {
                             $("#courses").html(data);
                        }
                     })
            }else{
                
            }
    });
    </script>
@endsection