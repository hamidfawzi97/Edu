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
                            <li><a href="#">Users</a></li>
                            <li class="active">Edit User {{ $user->name }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="card">
                      <div class="card-header">ِAdd User</div>
                      <div class="card-body card-block">
                        <form action="{{ url('/adduser') }}" method="post">
                          {{ csrf_field() }}
                          {{ method_field('PATCH')}}
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-user"></i></div>
                              <input type="text" value="{{ $user->name }}" id="username" name="username" placeholder="Username" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-user"></i></div>
                              <input type="text" value="{{ $user->first_name }}" id="firstname" name="firstname" placeholder="Firstname" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-user"></i></div>
                              <input type="text" value="{{ $user->last_name }}" id="lastname" name="lastname" placeholder="Lastname" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                              <input type="email" value="{{ $user->email }}" id="email" name="email" placeholder="Email" class="form-control">
                            </div>
                          </div>
                              <select class="form-control" name="role">
                                <option value="1">User</option>
                                <option value="2">Consultant</option> 
                              </select>
                          <div class="form-actions form-group"><input type="submit" class="btn btn-success col-md-3" style="margin-top: 10px;border-radius:5px" value="Add"></div>
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
    <script src="{{ asset('admin/js/popper.min.js')}}"></script>
    <script src="{{ asset('admin/js/plugins.js')}}"></script>
    <script src="{{ asset('admin/js/main.js')}}"></script>
@endsection