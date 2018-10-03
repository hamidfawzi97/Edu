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
                                <th style="text-align: center;">Edit</th>
                                <th style="text-align: center;">Delete</th>
                                <th style="text-align: center;">Show Quizes</th>
                                <th style="text-align: center;">Add Quiz</th>
                              </tr>
                            </thead>
                            <tbody>
                              @if(!$Videos == '')
                              @foreach($Videos as $vid)   
                              <tr>

                                <td width="5%" scope="row" style="text-align: center;">{{ $vid['Ord'] }}</td>
                                <td style="text-align: center;">{{ $vid['Name'] }}</td>
                                <td width="10%">
                                    <a href="{{ $vid['Link']}}" target="_blank" type="button" class="btn btn-primary" style="border-radius: 5px;">Play Video</a>
                                </td>
                                <td width="10%">
                                    <a href="{{ action('videoController@edit',$vid['ID']) }}" class="btn btn-success" style="border-radius: 5px;">Edit</a>
                                </td>
                                <td width="10%">
                                    <form method="post" action="{{action('videoController@destroy', $vid['ID'])}}" class="delete_form"  style="display: inline;">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <input type="submit" value="Delete" class="btn btn-danger" style="border-radius: 5px;">            
                                    </form>
                                </td>
                                <td width="10%">
                                    <a href="{{ action('quizController@show',$vid['ID']) }}" class="btn btn-primary" style="border-radius: 5px;">Show</a>
                                </td>
                                <td width="10%">
                                    <a href="{{ action('quizController@add_quiz',$vid['ID']) }}" class="btn btn-primary" style="border-radius: 5px;">Add</a>
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
            $(".delete_form").on('submit' , function() {
                var con = confirm("Do you want to delete this content ?!");
                if(con){
                    return true;
                }else{
                    return false;
                }
            });
          $('#bootstrap-data-table-export').DataTable();
        } );

        $("#checkAll").click(function () {
            $(".check").prop('checked', $(this).prop('checked'));
        });

    </script>

@endsection
