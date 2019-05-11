<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="free-educational-responsive-web-template-webEdu">
	<meta name="author" content="webThemez.com">
	<title id="title">Edu</title>
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
	<style type="text/css">
		.col-md-offset-1-and-half {
        margin-left: 12.499999995%;
         }
.container{
  width: 100%;  
  min-height: 100vh;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  padding: 15px;
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  
  position: relative;
  z-index: 1;
}

.container::before {
  content: "";
  display: block;
  position: absolute;
  z-index: -1;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  background: #005bea;
  background: -webkit-linear-gradient(bottom, #005bea, #00c6fb);
  background: -o-linear-gradient(bottom, #005bea, #00c6fb);
  background: -moz-linear-gradient(bottom, #005bea, #00c6fb);
  background: linear-gradient(bottom, #005bea, #00c6fb);
  opacity: 0.9;
}

	</style>
</head>
<body style="/*background-color: #3d84e6;background-image: url('{{ asset('images/slides/img2.jpg') }}');background-repeat: no-repeat;background-size: cover;*/">
	<div class="container" style="background-image: url('{{ asset('images/slides/img2.jpg') }}')/*padding: 0;background: -webkit-linear-gradient(bottom, #385074, #333333); background-repeat: no-repeat;opacity: 0.9*/">
		<div class="col-md-4" style="height: 685px;/*background-color: #F4F9F5;border:1px solid #e6e9ec;*/ padding: 0;margin-top: 8%;text-align: center;">
			<h1 style="color:#F4F9F5;margin-bottom: 50px">Login</h1>
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="email" type="email" style="border-radius: 20px" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Enter email" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password" style="border-radius: 20px" placeholder="Enter password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <div class="form-check" style="display: inline;">
                                	<label class="checkboxcontainer2" for="remember" style="color: white">
	                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
	                                    <span class="checkmark2"></span>
	                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                
                            </div>
                            <div class="col-md-5 col-md-offset-2">
                                <a class="btn btn-link" href="{{ route('password.request') }}" style="padding-top: 0; margin-left: 18px;color: white;font-size: 18px;">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                        <div class="form-group">  
                        		<div class="col-md-7">                          
                                <button type="submit" class="buton col-md-10" style="border-radius: 20px;">
                                    {{ __('Login') }}
                                </button>
								</div>
								<div class="col-md-5" style="margin-top: 16px">
		                        	<a  href="{{ route('password.request') }}" style="color: white;font-size: 18px;font-weight: bold">
		                                    {{ __('Create New Account') }}
		                            </a>
                            	</div>

                        </div>
                    </form>
		</div>
	</div>
</body>
</html>