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
                            <li class="active">IT Fields</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        @if($message = Session::get('success'))
        <div class="col-sm-12 alert alert-success" style="margin: auto;">
            <p>{{$message}}</p>
        </div>
        @endif
        <div id="itfieldsSpan"></div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">IT Field Table</strong>
                                <div style="float: right;">
                                <a class="btn btn-primary" href="{{ route('it_fields.create')}}" style="border-radius: 5px;"> Add Field</a>
                                </div>
                            </div>
                            <div class="card-body">
                              <table id="it_fields" class="table table-striped table-bordered">
                                <thead>
                                    <th style="text-align: center;">Field Name</th>
                                    <th style="text-align: center;">Features</th>
                                    <th style="text-align: center;">Delete | Edit</th>
                                </thead>
                                <tbody id="fields">
                                    @if(!$itField == '')
                                    @foreach($itField as $it)
                                    <tr>
                                        <td style="text-align: center;">{{$it['Category']}}</td>
                                        <td style="text-align: center; white-space: pre;">{{$it['Feutures']}}</td>
                                        <td style="text-align: center;">
                                            <a href="" id="{{ $it['ID'] }}" class="ti-trash delete" title="Delete"></a>
                                            <a href="{{action('itFieldController@edit', $it['ID'])}}" class="ti-pencil"></a>

                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                              </table>
                            </div>
                        </div>
                    </div>
                </div> <!-- row -->
            </div><!-- .animated -->
        </div><!-- .content -->


    </div> <!-- Right Panel -->


    <script src="{{ asset('admin/js/vendor/jquery-2.1.4.min.js')}}"></script> 
    <script src="{{ asset('admin/js/popper.min.js')}}"></script>
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
            // $(".delete_form").on('submit' , function() {
            //     var con = confirm("Do You Want To Delete This Field ?");
            //     if(con){
            //         return true;
            //     }else{
            //         return false;
            //     }
            // });
            table = $('#it_fields').DataTable();
        

        $('.delete').on('click', function() { 

            var it_id = $(this).attr('id');
            var confir = confirm('Ary you sure you want delete this IT Field?');
            if(confir){
                      $.ajax({
                      url:"/deleteitfield",
                      type:"GET",
                      data:{_token : '{{ csrf_token() }}', it_id: it_id},
                      success:function (data) {
                            $('#fields').html(data);
                            //$("#itfieldsSpan").append(data);
                            // table.destroy();
                            // table = $('#it_fields').DataTable();
                            //table.ajax.reload();
                        }
                     })
            }else{
                
            }
        });
    });
    </script>

@endsection