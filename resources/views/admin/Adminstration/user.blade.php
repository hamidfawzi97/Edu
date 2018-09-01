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
                            <strong class="card-title">Data Table</strong>
                        </div>
                        <div class="card-body">
                        
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                      <label>Check All</label><input type="checkbox" id="checkAll">
                      <button class="btn btn-primary col-md-2 col-md-offset-10"> Add User</button>
                      <button class="btn btn-primary col-md-2 col-md-offset-10"> Delete</button>
                    <thead>
                      <tr>
                        <th scope="col-md-1">#</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>LastName</th>
                        <th>Role</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><input type="checkbox" class="check" ></td>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>$320,800</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Garrett Winters</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>$170,750</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Ashton Cox</td>
                        <td>Junior Technical Author</td>
                        <td>San Francisco</td>
                        <td>$86,000</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Cedric Kelly</td>
                        <td>Senior Javascript Developer</td>
                        <td>Edinburgh</td>
                        <td>$433,060</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Airi Satou</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>$162,700</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Brielle Williamson</td>
                        <td>Integration Specialist</td>
                        <td>New York</td>
                        <td>$372,000</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Herrod Chandler</td>
                        <td>Sales Assistant</td>
                        <td>San Francisco</td>
                        <td>$137,500</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Rhona Davidson</td>
                        <td>Integration Specialist</td>
                        <td>Tokyo</td>
                        <td>$327,900</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Colleen Hurst</td>
                        <td>Javascript Developer</td>
                        <td>San Francisco</td>
                        <td>$205,500</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Sonya Frost</td>
                        <td>Software Engineer</td>
                        <td>Edinburgh</td>
                        <td>$103,600</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Jena Gaines</td>
                        <td>Office Manager</td>
                        <td>London</td>
                        <td>$90,560</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Quinn Flynn</td>
                        <td>Support Lead</td>
                        <td>Edinburgh</td>
                        <td>$342,000</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Charde Marshall</td>
                        <td>Regional Director</td>
                        <td>San Francisco</td>
                        <td>$470,600</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Haley Kennedy</td>
                        <td>Senior Marketing Designer</td>
                        <td>London</td>
                        <td>$313,500</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Tatyana Fitzpatrick</td>
                        <td>Regional Director</td>
                        <td>London</td>
                        <td>$385,750</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Michael Silva</td>
                        <td>Marketing Designer</td>
                        <td>London</td>
                        <td>$198,500</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Paul Byrd</td>
                        <td>Chief Financial Officer (CFO)</td>
                        <td>New York</td>
                        <td>$725,000</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Gloria Little</td>
                        <td>Systems Administrator</td>
                        <td>New York</td>
                        <td>$237,500</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Bradley Greer</td>
                        <td>Software Engineer</td>
                        <td>London</td>
                        <td>$132,000</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Dai Rios</td>
                        <td>Personnel Lead</td>
                        <td>Edinburgh</td>
                        <td>$217,500</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Jenette Caldwell</td>
                        <td>Development Lead</td>
                        <td>New York</td>
                        <td>$345,000</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Yuri Berry</td>
                        <td>Chief Marketing Officer (CMO)</td>
                        <td>New York</td>
                        <td>$675,000</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Caesar Vance</td>
                        <td>Pre-Sales Support</td>
                        <td>New York</td>
                        <td>$106,450</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Doris Wilder</td>
                        <td>Sales Assistant</td>
                        <td>Sidney</td>
                        <td>$85,600</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Angelica Ramos</td>
                        <td>Chief Executive Officer (CEO)</td>
                        <td>London</td>
                        <td>$1,200,000</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Gavin Joyce</td>
                        <td>Developer</td>
                        <td>Edinburgh</td>
                        <td>$92,575</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Jennifer Chang</td>
                        <td>Regional Director</td>
                        <td>Singapore</td>
                        <td>$357,650</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Brenden Wagner</td>
                        <td>Software Engineer</td>
                        <td>San Francisco</td>
                        <td>$206,850</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Fiona Green</td>
                        <td>Chief Operating Officer (COO)</td>
                        <td>San Francisco</td>
                        <td>$850,000</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Shou Itou</td>
                        <td>Regional Marketing</td>
                        <td>Tokyo</td>
                        <td>$163,000</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Michelle House</td>
                        <td>Integration Specialist</td>
                        <td>Sidney</td>
                        <td>$95,400</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Suki Burks</td>
                        <td>Developer</td>
                        <td>London</td>
                        <td>$114,500</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Prescott Bartlett</td>
                        <td>Technical Author</td>
                        <td>London</td>
                        <td>$145,000</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Gavin Cortez</td>
                        <td>Team Leader</td>
                        <td>San Francisco</td>
                        <td>$235,500</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Martena Mccray</td>
                        <td>Post-Sales support</td>
                        <td>Edinburgh</td>
                        <td>$324,050</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Unity Butler</td>
                        <td>Marketing Designer</td>
                        <td>San Francisco</td>
                        <td>$85,675</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Howard Hatfield</td>
                        <td>Office Manager</td>
                        <td>San Francisco</td>
                        <td>$164,500</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Hope Fuentes</td>
                        <td>Secretary</td>
                        <td>San Francisco</td>
                        <td>$109,850</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Vivian Harrell</td>
                        <td>Financial Controller</td>
                        <td>San Francisco</td>
                        <td>$452,500</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Timothy Mooney</td>
                        <td>Office Manager</td>
                        <td>London</td>
                        <td>$136,200</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Jackson Bradshaw</td>
                        <td>Director</td>
                        <td>New York</td>
                        <td>$645,750</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Olivia Liang</td>
                        <td>Support Engineer</td>
                        <td>Singapore</td>
                        <td>$234,500</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Bruno Nash</td>
                        <td>Software Engineer</td>
                        <td>London</td>
                        <td>$163,500</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Sakura Yamamoto</td>
                        <td>Support Engineer</td>
                        <td>Tokyo</td>
                        <td>$139,575</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Thor Walton</td>
                        <td>Developer</td>
                        <td>New York</td>
                        <td>$98,540</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Finn Camacho</td>
                        <td>Support Engineer</td>
                        <td>San Francisco</td>
                        <td>$87,500</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Serge Baldwin</td>
                        <td>Data Coordinator</td>
                        <td>Singapore</td>
                        <td>$138,575</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Zenaida Frank</td>
                        <td>Software Engineer</td>
                        <td>New York</td>
                        <td>$125,250</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Zorita Serrano</td>
                        <td>Software Engineer</td>
                        <td>San Francisco</td>
                        <td>$115,000</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Jennifer Acosta</td>
                        <td>Junior Javascript Developer</td>
                        <td>Edinburgh</td>
                        <td>$75,650</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Cara Stevens</td>
                        <td>Sales Assistant</td>
                        <td>New York</td>
                        <td>$145,600</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"class="check"></td>
                        <td>Hermione Butler</td>
                        <td>Regional Director</td>
                        <td>London</td>
                        <td>$356,250</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Lael Greer</td>
                        <td>Systems Administrator</td>
                        <td>London</td>
                        <td>$103,500</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Jonas Alexander</td>
                        <td>Developer</td>
                        <td>San Francisco</td>
                        <td>$86,500</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Shad Decker</td>
                        <td>Regional Director</td>
                        <td>Edinburgh</td>
                        <td>$183,000</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Michael Bruce</td>
                        <td>Javascript Developer</td>
                        <td>Singapore</td>
                        <td>$183,000</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="check"></td>
                        <td>Donna Snider</td>
                        <td>Customer Support</td>
                        <td>New York</td>
                        <td>$112,000</td>
                      </tr>
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

        
        
    </script>
@endsection