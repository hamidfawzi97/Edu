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
                            <li class="active">Users</li>
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
                            <strong class="card-title">Data Table</strong>
                            <label>Check All</label><input type="checkbox" id="checkAll">
                      <a href="{{ url('/admin-adduser') }}" class="btn btn-primary col-md-1" style="float: right; border-radius: 5px;color: white;"> Add User</a>
                      |
                      <a href="" class="col-md-2 col-md-offset-10"> Delete</a>
                        </div>
                        <div class="card-body">
                        
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                      
                    <thead>
                      <tr>
                        <th scope="col-md-1" style="text-align: center;">#</th>
                        <th style="text-align: center;">Username</th>
                        <th style="text-align: center;">Name</th>
                        <th style="text-align: center;">LastName</th>
                        <th style="text-align: center;">Role</th>
                        <th style="text-align: center;">Email</th>
                        <th style="text-align: center;">Delete | Edit</th>
                      </tr>
                    </thead>
                    <tbody id="users">
                     @foreach($users as $user)
                      <tr>
                       
                        <td style="text-align: center;"><input type="checkbox" class="check" ></td>
                        <td style="text-align: center;">{{$user->name}}</td>
                        <td style="text-align: center;">{{$user->first_name}}</td>
                        <td style="text-align: center;">{{$user->last_name}}</td>
                        @if($user->role == 3)
                        <td style="text-align: center;">Admin</td>
                        @endif
                        @if($user->role == 2)
                        <td style="text-align: center;">Consultant</td>
                        @endif
                        @if($user->role == 1)
                        <td style="text-align: center;">User</td>
                        @endif
                        <td style="text-align: center;">{{$user->email}}</td>
                        <td style="text-align: center;"><a href = "#" id="{{ $user->id }}" class="ti-trash delete" title="Delete"></a>
                            <a class="ti-pencil" title="Edit" href="{{ action('usersController@edit',$user->id) }}"></td>
                      </tr>
                     @endforeach
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
          $('#bootstrap-data-table-export').DataTable();
        } );
        $("#checkAll").click(function () {
            $(".check").prop('checked', $(this).prop('checked'));
        });

        $(document).on('click', '.delete', function() { 

            var user_id = $(this).attr('id');
            var confir = confirm('Ary you sure you want delete this User/Consultant?');
            if(confir){
                      $.ajax({
                      url:"/deleteuser",
                      type:"GET",
                      data:{_token : '<?php echo csrf_token() ?>', user:user_id},
                      success:function (data) {
                             $("#users").html(data);
                        }
                     })
            }else{
                
            }
    });
        
    </script>
@endsection