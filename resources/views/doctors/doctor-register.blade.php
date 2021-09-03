<?php $page="register";?>
@extends('layout.mainlayout')
@section('content')
            <!-- Page Content -->
			<div class="content" style="min-height:200px;">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-8 offset-md-2">
						
							<!-- Account Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="assets/img/login-banner.png" class="img-fluid" alt="Login Banner">	
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>Registro Doctor <a href="{{ url("registro-paciente") }}">¿Eres un paciente?</a></h3>
										</div>
										
										<!-- Register Form -->
										<form method="post"  action="{{ route('registrodr.store') }}" class="needs-validation" novalidate>
                                            {{ csrf_field() }}
											<div class="form-group form-focus">
												<input type="text" class="form-control floating" required name="nombre" value="{{ old('nombre') }}">
												<div class="invalid-feedback">
													Este campo es requerido
												</div>
												<label class="focus-label">{{ 'Nombre' }}</label>
											</div>
                                            
                                            <div class="form-group form-focus">
												<input required type="text" class="form-control floating" name="apellido_p" value="{{ old('apellido_p') }}" >
												<div class="invalid-feedback">
													Este campo es requerido
												</div>
												<label class="focus-label">{{ 'Apellido Paterno' }}</label>
											</div>
                                            
                                            <div class="form-group form-focus">
												<input  type="text" class="form-control floating" name="apellido_m" value="{{ old('apellido_m') }}" />
												<div class="invalid-feedback">
													Este campo es requerido
												</div>
												<label class="focus-label">{{ 'Apellido Materno' }}</label>
											</div>
											<div class="form-group form-focus">
												<input required type="text" name="telefono" class="form-control" id="telefono" min="10"  value="{{ old('telefono') }}"  >
												<label class="focus-label">{{ 'Teléfono' }}</label>
											</div>
											<div class="form-group form-focus">
												<input required type="text" name="pais" class="form-control" id="pais"  value="{{ old('pais') ?? 'México' }}"   >
												
												<label class="focus-label">{{ 'País' }}</label>
											</div>
											<div class="form-group form-focus">
													<select name="estado" id="estado" class="form-control select" aria-hidden="true" required >
													<option value="{{ old('estado') ?? "" }}" ></option>
													  <option value="Aguascalientes">Aguascalientes</option>
													  <option value="Baja California">Baja California</option>
													  <option value="Baja California Sur">Baja California Sur</option>
													  <option value="Campeche">Campeche</option>
													  <option value="Chiapas">Chiapas</option>
													  <option value="Chihuahua">Chihuahua</option>
													  <option value="Coahuila">Coahuila</option>
													  <option value="Colima">Colima</option>
													  <option value="Distrito Federal">Distrito Federal</option>
													  <option value="Durango">Durango</option>
													  <option value="Guanajuato">Guanajuato</option>
													  <option value="Guerrero">Guerrero</option>
													  <option value="Hidalgo">Hidalgo</option>
													  <option value="Jalisco">Jalisco</option>
													  <option value="Mexico">México</option>
													  <option value="Michoacan">Michoacán</option>
													  <option value="Morelos">Morelos</option>
													  <option value="Nayarit">Nayarit</option>
													  <option value="Nuevo Leon">Nuevo León</option>
													  <option value="Oaxaca">Oaxaca</option>
													  <option value="Puebla">Puebla</option>
													  <option value="Queretaro">Querétaro</option>
													  <option value="Quintana Roo">Quintana Roo</option>
													  <option value="San Luis Potosi">San Luis Potosí</option>
													  <option value="Sinaloa">Sinaloa</option>
													  <option value="Sonora">Sonora</option>
													  <option value="Tabasco">Tabasco</option>
													  <option value="Tamaulipas">Tamaulipas</option>
													  <option value="Tlaxcala">Tlaxcala</option>
													  <option value="Veracruz">Veracruz</option>
													  <option value="Yucatan">Yucatán</option>
													  <option value="Zacatecas">Zacatecas</option>
												  </select>
												  <label class="focus-label">{{ 'Estado o Territorio' }}</label>
												
											</div>
											<div class="form-group form-focus">
												<input required type="email" class="form-control floating" name="email" value="{{ old('email') }}" >
												<div class="invalid-feedback">
													Este campo es requerido
												</div>
												<label class="focus-label">{{'Correo Electrónico'}}</label>
											</div>
											<div class="form-group form-focus">
												<input required type="password" class="form-control floating" name="password" value="{{ old('password') }}">
												<div class="invalid-feedback">
													Este campo es requerido
												</div>
												<label class="focus-label">{{'Crear Contraseña'}}</label>
											</div>
											<div class="remember-me-col d-flex justify-content-between">
												<span class=""><small>Doy mi consentimiento y acepto recibir información sobre los servicios y novedades de <strong>DocBook</strong></small></span>
												<label class="custom_check">
													<input required type="checkbox" class="" name="acepto" id="spouse" value="1">
													<span class="checkmark"></span>
												</label>
											</div>
											<div class="text-right">
												<a class="forgot-link" href="{{ route('iniciar-sesion') }}">¿Ya tienes una cuenta?</a>
											</div>
                                            
                                            @if($errors->any())
                                                    @foreach($errors->all() as $error)
                                                        <div role="alert" class="alert alert-danger alert-dismissible fade show"  ><strong>Error: </strong>{{ $error }}</div>
                                                    @endforeach
                                            @endif
                                            
											<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Registrarme</button>
											<!--<div class="login-or">
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
							<!-- /Account Content -->
								
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
</div>
			@endsection