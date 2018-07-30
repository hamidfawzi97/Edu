<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>IT Fields</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{asset('admin/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/lib/datatable/dataTables.bootstrap.min.css')}}">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{asset('admin/scss/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="{{ asset('images/logo.png')}}" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="{{ asset('images/logo2.png')}}" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">UI elements</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Components</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="ui-buttons.html">Buttons</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">Badges</a></li>
                            <li><i class="fa fa-bars"></i><a href="ui-tabs.html">Tabs</a></li>
                            <li><i class="fa fa-share-square-o"></i><a href="ui-social-buttons.html">Social Buttons</a></li>
                            <li><i class="fa fa-id-card-o"></i><a href="ui-cards.html">Cards</a></li>
                            <li><i class="fa fa-exclamation-triangle"></i><a href="ui-alerts.html">Alerts</a></li>
                            <li><i class="fa fa-spinner"></i><a href="ui-progressbar.html">Progress Bars</a></li>
                            <li><i class="fa fa-fire"></i><a href="ui-modals.html">Modals</a></li>
                            <li><i class="fa fa-book"></i><a href="ui-switches.html">Switches</a></li>
                            <li><i class="fa fa-th"></i><a href="ui-grids.html">Grids</a></li>
                            <li><i class="fa fa-file-word-o"></i><a href="ui-typgraphy.html">Typography</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children active dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Tables</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="tables-basic.html">Basic Table</a></li>
                            <li><i class="fa fa-table"></i><a href="tables-data.html">Data Table</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Forms</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="forms-basic.html">Basic Form</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="forms-advanced.html">Advanced Form</a></li>
                        </ul>
                    </li>

                    <h3 class="menu-title">Icons</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Icons</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="font-fontawesome.html">Font Awesome</a></li>
                            <li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">Themefy Icons</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="widgets.html"> <i class="menu-icon ti-email"></i>Widgets </a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart"></i>Charts</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-line-chart"></i><a href="charts-chartjs.html">Chart JS</a></li>
                            <li><i class="menu-icon fa fa-area-chart"></i><a href="charts-flot.html">Flot Chart</a></li>
                            <li><i class="menu-icon fa fa-pie-chart"></i><a href="charts-peity.html">Peity Chart</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-area-chart"></i>Maps</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-map-o"></i><a href="maps-gmap.html">Google Maps</a></li>
                            <li><i class="menu-icon fa fa-street-view"></i><a href="maps-vector.html">Vector Maps</a></li>
                        </ul>
                    </li>
                    <h3 class="menu-title">Extras</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Pages</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="page-login.html">Login</a></li>
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="page-register.html">Register</a></li>
                            <li><i class="menu-icon fa fa-paper-plane"></i><a href="pages-forget.html">Forget Pass</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                            <span class="count bg-danger">5</span>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="notification">
                            <p class="red">You have 3 Notification</p>
                            <a class="dropdown-item media bg-flat-color-1" href="#">
                                <i class="fa fa-check"></i>
                                <p>Server #1 overloaded.</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-4" href="#">
                                <i class="fa fa-info"></i>
                                <p>Server #2 overloaded.</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-5" href="#">
                                <i class="fa fa-warning"></i>
                                <p>Server #3 overloaded.</p>
                            </a>
                          </div>
                        </div>

                        <div class="dropdown for-message">
                          <button class="btn btn-secondary dropdown-toggle" type="button"
                                id="message"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti-email"></i>
                            <span class="count bg-primary">9</span>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="message">
                            <p class="red">You have 4 Mails</p>
                            <a class="dropdown-item media bg-flat-color-1" href="#">
                                <span class="photo media-left"><img alt="avatar" src="{{ asset('images/avatar/1.jpg')}}"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jonathan Smith</span>
                                    <span class="time float-right">Just now</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-4" href="#">
                                <span class="photo media-left"><img alt="avatar" src="{{ asset('images/avatar/2.jpg')}}"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jack Sanders</span>
                                    <span class="time float-right">5 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-5" href="#">
                                <span class="photo media-left"><img alt="avatar" src="{{ asset('images/avatar/3.jpg')}}"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Cheryl Wheeler</span>
                                    <span class="time float-right">10 minutes ago</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-3" href="#">
                                <span class="photo media-left"><img alt="avatar" src="{{ asset('images/avatar/4.jpg')}}"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Rachel Santos</span>
                                    <span class="time float-right">15 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                          </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{ asset('images/admin.jpg')}}" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                                <a class="nav-link" href="#"><i class="fa fa- user"></i>My Profile</a>

                                <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>

                                <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>

                                <a class="nav-link" href="#"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                    <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                            <i class="flag-icon flag-icon-us"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="language" >
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-fr"></span>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-es"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-it"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

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
                      <label>Check All</label><input type="checkbox">
                      <button class="btn btn-primary col-md-2 col-md-offset-10"> Add Field</button>
                      <button class="btn btn-primary col-md-2 col-md-offset-10"> Delete</button>
                    <thead>
                      <tr>
                        <th scope="col-md-1">#</th>
                        <th>Field Name</th>
                        <th>Features</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><input type="checkbox" ></td>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Garrett Winters</td>
                        <td>Accountant</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Ashton Cox</td>
                        <td>Junior Technical Author</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Cedric Kelly</td>
                        <td>Senior Javascript Developer</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Airi Satou</td>
                        <td>Accountant</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Brielle Williamson</td>
                        <td>Integration Specialist</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Herrod Chandler</td>
                        <td>Sales Assistant</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Rhona Davidson</td>
                        <td>Integration Specialist</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Colleen Hurst</td>
                        <td>Javascript Developer</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Sonya Frost</td>
                        <td>Software Engineer</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Jena Gaines</td>
                        <td>Office Manager</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Quinn Flynn</td>
                        <td>Support Lead</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Charde Marshall</td>
                        <td>Regional Director</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Haley Kennedy</td>
                        <td>Senior Marketing Designer</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Tatyana Fitzpatrick</td>
                        <td>Regional Director</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Michael Silva</td>
                        <td>Marketing Designer</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Paul Byrd</td>
                        <td>Chief Financial Officer (CFO)</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Gloria Little</td>
                        <td>Systems Administrator</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Bradley Greer</td>
                        <td>Software Engineer</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Dai Rios</td>
                        <td>Personnel Lead</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Jenette Caldwell</td>
                        <td>Development Lead</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Yuri Berry</td>
                        <td>Chief Marketing Officer (CMO)</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Caesar Vance</td>
                        <td>Pre-Sales Support</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Doris Wilder</td>
                        <td>Sales Assistant</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Angelica Ramos</td>
                        <td>Chief Executive Officer (CEO)</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Gavin Joyce</td>
                        <td>Developer</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Jennifer Chang</td>
                        <td>Regional Director</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Brenden Wagner</td>
                        <td>Software Engineer</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Fiona Green</td>
                        <td>Chief Operating Officer (COO)</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Shou Itou</td>
                        <td>Regional Marketing</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Michelle House</td>
                        <td>Integration Specialist</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Suki Burks</td>
                        <td>Developer</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Prescott Bartlett</td>
                        <td>Technical Author</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Gavin Cortez</td>
                        <td>Team Leader</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Martena Mccray</td>
                        <td>Post-Sales support</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Unity Butler</td>
                        <td>Marketing Designer</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Howard Hatfield</td>
                        <td>Office Manager</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Hope Fuentes</td>
                        <td>Secretary</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Vivian Harrell</td>
                        <td>Financial Controller</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Timothy Mooney</td>
                        <td>Office Manager</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Jackson Bradshaw</td>
                        <td>Director</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Olivia Liang</td>
                        <td>Support Engineer</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Bruno Nash</td>
                        <td>Software Engineer</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Sakura Yamamoto</td>
                        <td>Support Engineer</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Thor Walton</td>
                        <td>Developer</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Finn Camacho</td>
                        <td>Support Engineer</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Serge Baldwin</td>
                        <td>Data Coordinator</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Zenaida Frank</td>
                        <td>Software Engineer</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Zorita Serrano</td>
                        <td>Software Engineer</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Jennifer Acosta</td>
                        <td>Junior Javascript Developer</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Cara Stevens</td>
                        <td>Sales Assistant</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Hermione Butler</td>
                        <td>Regional Director</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Lael Greer</td>
                        <td>Systems Administrator</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Jonas Alexander</td>
                        <td>Developer</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Shad Decker</td>
                        <td>Regional Director</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Michael Bruce</td>
                        <td>Javascript Developer</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" ></td>
                        <td>Donna Snider</td>
                        <td>Customer Support</td>
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
    </script>


</body>
</html>