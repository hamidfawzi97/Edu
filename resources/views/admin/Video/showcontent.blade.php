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
                          <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th style="text-align: center;">#</th>
                                <th style="text-align: center;">Name</th>
                                <th style="text-align: center;">video</th>
                                <th style="text-align: center;">Delete</th>
                              </tr>
                            </thead>
                            <tbody>
                              @if(!$Videos == '')
                              @foreach($Videos as $vid)   
                              <tr>
                                <td width="10%" scope="row"><input type="checkbox" class="check" /></td>
                                <td style="text-align: center;">{{ $vid['Name'] }}</td>
                                <td width="10%">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg" style="border-radius: 5px;">Play Video</button>

                                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                          <video class="embed-responsive-item" width="250" height="150" controls style="margin: auto;">
                                            <source src="{{ asset($vid['VideoPath'] .'/'. $vid['Name']) }}" type="video/mp4">
                                          </video>
                                        </div>
                                      </div>
                                    </div>
                                </td>
                                <td width="10%">
                                    <a href = "{{ action('videoController@destroy',$vid['ID'],$vid['Courses_id']) }}" class="btn btn-danger" style="border-radius: 5px;">Delete</a>
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
