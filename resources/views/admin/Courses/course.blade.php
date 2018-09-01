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
                            <li><a href="#">Table</a></li>
                            <li class="active">Data table</li>
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
                            <a href="{{ url('/admin-addcourse') }}" class="col-md-2 col-md-offset-10">Add Course</a>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered coursesTable">
                    <thead>
                      <tr>
                        <th scope="col-md-1">#</th>
                        <th>Name</th>
                        <th>Descreption</th>
                        <th>Rate</th>
                        <th>Demo video</th>
                        <th>Certificate</th>
                        <th>Instructor Name</th>
                        <th>PDF</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @if(!$courses == '')
                    @foreach($courses as $cour)
                      <tr id="course-{{ $cour['ID'] }}"> 
                        <td scope="row"><input type="checkbox" class="check" /></td>
                        <td><a href="{{ action('userCoursesController@show',$cour['ID']) }}">{{ $cour['CourseName'] }}</a></td>
                        <td>{{ $cour['Description'] }}</td>
                        <td>{{ $cour['Rate'] }}</td>
                        <td>{{ $cour['VideoInduction'] }}</td>
                        <td>{{ $cour['Certificate'] }}</td>
                        <td>{{ $cour['InstructorName'] }}</td>
                        <td>{{ $cour['Pdf'] }}</td>
                        <td>
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

       
         $(".delete").click(function(ev) {
                var id = $(this).attr('id');
                var check = confirm("Are You sure You want to permanently delete this course?");
                if(check){
                    $.ajax({
                        url:"{{ route('courses.deleteCourse') }}",
                        type:"post",
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        data:{id:id,"_token": "{{ csrf_token() }}"},
                        success:function (data) {
                            alert(data);
                            $('#bootstrap-data-table').DataTable().ajax.reload();
                        }

                    });
                }else{
                    return false;
                }

         });
    </script>
@endsection