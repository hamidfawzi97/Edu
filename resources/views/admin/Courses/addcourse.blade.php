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
                            <strong class="card-title">Add Course</strong>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ action('coursesController@store') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="text" name="c_name" placeholder="Course Name" class="form-control col-md-4" required="" /><br>
                                <textarea rows="4" name="c_description" placeholder="Description" class="form-control col-md-4" style="resize:none;" required=""></textarea><br>
                                <input type="text" name="inst_name" placeholder="Instructor Name" class="form-control col-md-4" required="" /><br>
                                <input type="number" name="price" placeholder="Price" class="form-control col-md-4" required="" /><br>  
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
                                <input type="submit" name="submit" value="Add" class="col-md-1 btn btn-success"/>
                            </form>
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
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );

        $("#checkAll").click(function () {
            $(".check").prop('checked', $(this).prop('checked'));
        });

    </script>

@endsection