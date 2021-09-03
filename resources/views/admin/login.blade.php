@extends('layout.mainlayout_admin')
@section('content')	
<!-- Main Wrapper -->
<div class="main-wrapper login-body">
            <div class="login-wrapper">
            	<div class="container">
					@if (session()->has('msj'))
					<h4 class="text-center" >{{ session()->get('msj') }}</h4>
					@endif
					
                	<div class="loginbox">
                    	<div class="login-left">
							<img class="img-fluid" src="../assets_admin/img/logo-white.png" alt="Logo">
                        </div>
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>Ingresar</h1>
								<p class="account-subtitle">Accede al panel de administrador</p>
								
								<!-- Form -->
								<form method="POST" action="{{ route('login') }}">
									{{ csrf_field() }}
									<div class="form-group">
										<input name="email" class="form-control" type="text" placeholder="Email" value="{{ old('email') }}" required>
									</div>
									<div class="form-group">
										<input name="password" class="form-control" type="password" placeholder="Contraseña" value="{{ old('password') }}" required>
									</div>
									<div class="form-group">
										<button class="btn btn-primary btn-block" type="submit">Iniciar Sesión</button>
									</div>
								</form>
								<!-- /Form -->
								
								<div class="text-center forgotpass"><a href="forgot-password">¿Olvidaste tu contraseña?</a></div>
								<!--
								<div class="login-or">
									<span class="or-line"></span>
									<span class="span-or">or</span>
								</div>
								  
								 Social Login 
								<div class="social-login">
									<span>Login with</span>
									<a href="#" class="facebook"><i class="fa fa-facebook"></i></a><a href="#" class="google"><i class="fa fa-google"></i></a>
								</div>
								 /Social Login 
							-->@if($errors->any())
											@foreach($errors->all() as $error)
											<div role="alert" class="alert alert-danger alert-dismissible fade show"  ><strong>Error: </strong>{{ $error }}</div>
										@endforeach
								@endif
								<div class="text-center dont-have">¿No tienes una cuenta? <a href="registro">Registrate</a></div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->
@endsection