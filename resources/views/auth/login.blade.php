<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="es">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Different Multiple Form Widget template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free web designs for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
<!-- //web font -->
</head>
<body>
	<!-- main -->
	<div class="main-agile">
		 <div class="limiter"{{ __('Login') }}>
		<div class="content">
			<div class="top-grids">
				<div class="top-grids-left">
					<div class="signin-form-grid">
						<div class="signin-form">
							<h2>Inicio de Sesion</h2>
							<form id="signin"  method="POST"  action="{{ route('login') }}">
								 @csrf

								<div data-validate="Type user name">
								<input id="email" class="input100{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" placeholder="Correo" required="" value="{{ old('email') }}" required autofocus>
									<span class="focus-input100"></span>
										 @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                       					 @endif
								</div>
								<div data-validate="Type password"{{ __('Password') }}>
								<input  id="password" class="input100{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" placeholder="Contraseña"  required="Este campo es obligatorio">	
								<span class="focus-input100"></span>
						
								@if ($errors->has('password'))
									<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('password') }}</strong>
									</span>
								@endif
								</div>



								<input type="checkbox" id="brand" value="">
								<label for="brand"><span></span> Recuerdame</label> 

								<input type="submit" value="Ingresar" {{ __('Ingresar') }}>
							

								<div class="signin-agileits-bottom"> 
									<p>
										<a class="txt2" href="{{ route('password.request') }}">
                                    		{{ __('Olvidó su contraseña?') }}
                          				</a>
									</p>    
								</div> 
							</form>
						</div>
					</div>
				
				
						</form>
					</div>
				</div>
				<div class="clear"> </div>
			</div>
		</div>
		<div class="copyright">
			<p> © 2017 Different Multiple Form Widget . All rights reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a></p>
		</div>
	</div>	
	<!-- //main --> 
</body>
</html>