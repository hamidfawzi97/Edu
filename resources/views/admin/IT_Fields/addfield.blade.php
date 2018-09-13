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
                            <li href="">IT Fields</li>
                            <li class="active">Add IT Field</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                  <div class="col-lg-12" style="margin: auto;">
                    <div class="card">
                      <div class="card-header">Add IT Field</div>
                      <div class="card-body card-block">
                        <form action="{{ action('itFieldController@store')}}" method="post">
                            {{csrf_field()}}
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-user"></i></div>
                              <input type="text" id="fieldname" name="fieldname" required="" placeholder="Field Name" class="form-control">
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                              <textarea id="features" name="features" placeholder="Features" required="" class="form-control" rows="4" style="resize: none;"></textarea>
                            </div>
                          </div>
                          
                          <div class="form-actions form-group">
                            <input type="submit" name="submit" class="btn btn-success btn-sm" value="Add" style="font-size: 20px;float: right;padding-left: 25px;padding-right: 25px;border-radius: 5px;">
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div> <!-- row -->
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="{{ asset('admin/js/vendor/jquery-2.1.4.min.js')}}"></script>
    <script src="{{ asset('admin/js/popper.min.js')}}"></script>
    <script src="{{ asset('admin/js/plugins.js')}}"></script>
    <script src="{{ asset('admin/js/main.js')}}"></script>


@endsection
