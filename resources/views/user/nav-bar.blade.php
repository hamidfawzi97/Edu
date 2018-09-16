<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="free-educational-responsive-web-template-webEdu">
        <meta name="author" content="webThemez.com">
        <link rel="favicon" href={{ asset('images/favicon.png') }}>
        <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
        <link rel="stylesheet" href={{ asset('css/bootstrap.min.css') }}>
        <link rel="stylesheet" href={{ asset('css/font-awesome.min.css') }}> 
        <link rel="stylesheet" href={{ asset('css/bootstrap-theme.css') }} media="screen"> 
        <link rel="stylesheet" href={{ asset('css/style.css') }}>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.js"></script>
        <script src="assets/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
            <div class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <!-- Button for smallest screens -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                <a class="navbar-brand" href={{ url('/') }}>
                    <img src={{ asset('images/logo.png') }} alt="Techro HTML5 template"></a>
            </div>

            
            <div class="navbar-collapse collapse" id="navbar">
                <ul class="nav navbar-nav pull-right mainNav">
                    <li id="Home"><a href="{{ url('/') }}">Home</a></li>
                    <!-- <li id="About"><a href={{ url('/about') }}>About</a></li> -->

                    <li id="Courses"><a href="{{ url('/courses') }}">Courses</a></li>
                    <li id="IT_Field"><a href="{{ url('/itfield') }}">IT Fields</a></li>
                    <li id="Consultations"><a href="{{ url('/consultation') }}">Consultations</a></li>
                    @if(Auth::check())
                    <li id="MyConsultations"><a href="{{ url('/myconsultation/1') }}">My Consultations</a></li>
                    @endif
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                            </form>

                        </li>
                        <!-- <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                
                            </div>
                        </li> -->
                    @endguest
                    <!-- <li id="Contact"><a href={{ url('/contact') }}>Contact</a></li> -->
<!--
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropsdown">Pages <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="sidebar-right.html">Right Sidebar</a></li>
                            <li><a href="#">Dummy Link1</a></li>
                            <li><a href="#">Dummy Link2</a></li>
                            <li><a href="#">Dummy Link3</a></li>
                        </ul>
                    </li>
-->
                    
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
    <!-- /.navbar -->

    </body>
</html>