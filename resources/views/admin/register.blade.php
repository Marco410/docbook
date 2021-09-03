@extends('layout.mainlayout_admin')
@section('content')	
	<!-- Main Wrapper -->
    <div class="main-wrapper login-body">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                    	<div class="login-left">
							<img class="img-fluid" src="../assets_admin/img/logo-white.png" alt="Logo">
                        </div>
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>Registrate</h1>
								<p class="account-subtitle">Accede a nuestro menú de inicio</p>
								
								<!-- Form -->
								<form method="POST" action="{{ route('register') }}">
									@csrf
									<div class="form-group">
										<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Nombre" autofocus>
										<div class="invalid-feedback">
											Este campo es requerido
										</div>
									</div>
									<div class="form-group">
										<input required class="form-control" type="email" name="email" placeholder="Correo Electrónico">
										<div class="invalid-feedback">
											Este campo es requerido
										</div>
									</div>
									<div class="form-group">
										<input class="form-control" id="password" type="password" name="password" placeholder="Contraseña" required>
										<div class="invalid-feedback">
											Este campo es requerido
										</div>
									</div>
									<div class="form-group">
										<input class="form-control" id="password_confirm" type="password" name="password_confirm" placeholder="Confirmar Contraseña" required>
										<div class="invalid-feedback" id="msj-pass">
											Este campo es requerido
										</div>
									</div>
									@if($errors->any())
                                                    @foreach($errors->all() as $error)
                                                        <div role="alert" class="alert alert-danger alert-dismissible fade show"  ><strong>Error: </strong>{{ $error }}</div>
                                                    @endforeach
                                            @endif
									<div class="form-group mb-0">
										<button class="btn btn-primary btn-block" type="submit">Registrarme</button>
									</div>
								</form>
								<!-- /Form -->
								
								<!---
								<div class="login-or">
									<span class="or-line"></span>
									<span class="span-or">or</span>
								</div>
								
								 Social Login 
								<div class="social-login">
									<span>Register with</span>
									<a href="#" class="facebook"><i class="fa fa-facebook"></i></a><a href="#" class="google"><i class="fa fa-google"></i></a>
								</div>
								 /Social Login 
							-->
								<div class="text-center dont-have">¿Ya tienes una cuenta? <a href="login">Iniciar Sesión</a></div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->
@endsection