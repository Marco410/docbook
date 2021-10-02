<?php $page="register1";?>
@extends('layout.mainlayout')
@section('content')
<!-- Page Content -->
<div class="content" style="min-height:205px;"> 
				<div class="container-fluid">
					
					<div class="row">
						<div class="col-md-8 offset-md-2">
								
							<!-- Register Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img  src="assets/img/login-banner.png" class="img-fluid" alt="Doccure Register">	
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>Registro de Paciente <a href="{{ url("registro-doctor") }}">¿Eres un Doctor?</a></h3>
										</div>
										
										<!-- Register Form -->
										<form method="post"  action="{{ url('/guardar-paciente')}}" class="needs-validation" novalidate>
                                            {{ csrf_field() }}
											<div class="form-group form-focus">
												<input required name="nombre" type="text" class="form-control floating" value="{{ old('nombre') }}">
												<div class="invalid-feedback">
													Este campo es requerido
												</div>
												<label class="focus-label">Nombre</label>
											</div>

											<div class="form-group form-focus">
												<input required name="apellido_p" type="text" class="form-control floating" value="{{ old('apellido_p') }}">
												<div class="invalid-feedback">
													Este campo es requerido
												</div>
												<label class="focus-label">Apellido Paterno</label>
											</div>

											<div class="form-group form-focus">
												<input required name="apellido_m" type="text" class="form-control floating"  value="{{ old('apellido_m') }}" >
												<div class="invalid-feedback">
													Este campo es requerido
												</div>
												<label class="focus-label">Apellido Materno</label>
											</div>
											<div class="form-group form-focus">
												<input required type="text" name="telefono" class="form-control" id="telefono" min="10"  value="{{ old('telefono') }}"  >
												<label class="focus-label">{{ 'Teléfono' }}</label>
											</div>
											<div class="form-group form-focus">
												<input required name="email" type="email" class="form-control floating" value="{{ old('email') }}">
												<div class="invalid-feedback">
													Este campo es requerido
												</div>
												<label class="focus-label">Correo Electrónico</label>
											</div>
											<div class="form-group form-focus">
												<input required name="password" type="password" class="form-control floating" >
												<div class="invalid-feedback">
													Este campo es requerido
												</div>
												<label class="focus-label">Crear Contraseña</label>
											</div>
											<div class="remember-me-col d-flex justify-content-between">
												<span class=""><small>Doy mi consentimiento y acepto recibir información sobre los servicios y novedades de <strong>DocBook</strong></small></span>
												<label class="custom_check">
													<input required type="checkbox" class="" name="acepto" id="spouse" value="1">
													<span class="checkmark"></span>
												</label>
											</div>
											<div class="text-right">
												<a class="forgot-link" href="{{ route('iniciar-sesion-paciente') }}">¿Ya tienes una cuenta?</a>
											</div>
											@if($errors->any())
											@foreach($errors->all() as $error)
													<div role="alert" class="alert alert-danger alert-dismissible fade show"  ><strong>Error: </strong>{{ $error }}</div>
												@endforeach
										@endif
										
											<button class="btn btn-primary btn-block btn-lg login-btn" type="submit" >Registrarme</button>

											<!---
											<div class="login-or">
												<span class="or-line"></span>
												<span class="span-or">or</span>
											</div>
											<div class="row form-row social-login">
												<div class="col-6">
													<a href="#" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f mr-1"></i> Login</a>
												</div>
												<div class="col-6">
													<a href="#" class="btn btn-google btn-block"><i class="fab fa-google mr-1"></i> Login</a>
												</div>
											</div>-->
										</form>
										<!-- /Register Form -->
										
									</div>
								</div>
							</div>
							<!-- /Register Content -->
								
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
            </div>
@endsection