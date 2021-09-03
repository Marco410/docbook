<?php $page="doctor-register-step3";?>
@extends('layout.mainlayout')
@section('content')
<!-- Page Content -->
			<div class="content login-page pt-0">
				<div class="container-fluid">
					
					<!-- Register Content -->
					<div class="account-content">
						<div class="row align-items-center">
							<div class="login-right">
								<div class="inner-right-login">
									<div class="login-header">
										<div class="logo-icon">
											<img src="assets/img/logo.png" alt="">
										</div>
										<div class="step-list">
											<ul>
												<li><a href="#" class="active-done">1</a></li>
												<li><a href="#" class="active-done">2</a></li>
												<li><a href="#" class="active">3</a></li>
											</ul>
										</div>
                                            <h3 class="text-center" >{{ $doctor->nombre }} {{ $doctor->apellido_p }} </h3>
										<form method="post" enctype="multipart/form-data" action="{{ url('/registro-paso3')}}">
                                            {{ csrf_field() }}
                                            <input name="id" type="hidden" value="{{ $doctor->id }}" />
											<h3 class="my-4">Información Profesional</h3>
											<p class="text-secondary mb-3" >Ingresa tu información profesional para poder generar recetas y documentos clínicos.</p>
											
                                            <div class="form-group">
												<label>Cédula Profesional <span class="text-danger">*</span></label>
                                                <input required type="text" name="cedula" id="cedula" class="form-control" value="{{ old('cedula') }}" />
											</div>
											<div class="form-group">
												<div class="form-group">
							                    	<label>Especialidad <span class="text-danger">*</span></label>
							                    	<select required name="especialidad" class="form-control select" value="{{ old('especialidad') }}" >
														<option value="" >Seleccione:</option>
														@foreach ($especialidad as $espe)
														<option value="{{ $espe->id }}">{{ $espe->nombre }}</option>
														@endforeach
													</select>
							                    </div> 
											</div>
											<div class="form-group">
												<label>Institución que otorgo la cédula. <span class="text-danger">*</span></label>
                                                <input required type="text" name="institucion_cedula" id="institucion_cedula" class="form-control" value="{{ old('institucion_cedula') }}" />
											</div>

											<div class="form-group row" >
												<div class="col-sm-12">
													<h4 class="text-secondary" >Sube tus Documentos</h4>
												</div>
												<div class="col-sm-6">
													<div class="profile-pic-upload text-center">
														<div class="cam-col">
															<img src="assets/img/icons/camera.svg" id="ine_front_img" alt="" class="img-fluid">
														</div>
														<span>INE parte deltantera <span class="text-danger">*</span></span>
														<input required type="file" id="ine_front" accept="image/png,image/jpeg" name="ine_front" value="{{ old('ine_front') }}">
													</div>
												</div>
												<div class="col-sm-6">
													<div class="profile-pic-upload text-center">
														<div class="cam-col">
															<img src="assets/img/icons/camera.svg" id="ine_back_img" alt="" class="img-fluid">
														</div>
														<span>INE parte trasera <span class="text-danger">*</span></span>
														<input required accept="image/png,image/jpeg" type="file" id="ine_back" name="ine_back" value="{{ old('ine_back') }}">
													</div>
												</div>
												<div class="col-sm-12">
													<div class="profile-pic-upload text-center">
														<div class="cam-col">
															<img src="assets/img/icons/camera.svg" id="certificado_consultorio_img" alt="" class="img-fluid">
														</div>
														<span>Certificado del consultorio <span class="text-danger">*</span></span>
														<input required accept="image/png,image/jpeg" type="file" id="certificado_consultorio" name="certificado_consultorio" value="{{ old('certificado_consultorio') }}">
													</div>
												</div>
												<div class="col-sm-12 mt-3">
													<div class="remember-me-col d-flex justify-content-between">
														<span class="">Certifico que la información es correcta y puede ser usada para generar <strong>recetas médicas</strong><span class="text-danger">*</span></span>
														<label class="custom_check">
															<input required type="checkbox" class="" name="acepto" id="spouse" value="1">
															<span class="checkmark"></span>
														</label>
													</div>
												</div>
												<div class="col-sm-12">
													@if($errors->any())
														@foreach($errors->all() as $error)
															<div role="alert" class="alert alert-danger alert-dismissible fade show"  ><strong>Error: </strong>{{ $error }}</div>
														@endforeach
													@endif
												</div>


											</div>
											

						                    <div class="mt-5">
					                        	<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Terminar</button>
					                        </div>
				                        </form>
									</div>
								</div>
								<div class="login-bottom-copyright">
									<span>© 2020 DocBook. Todos los derechos reservados.</span>
								</div>
							</div>
						</div>
					</div>
					<!-- /Register Content -->

				</div>

			</div>		
			<!-- /Page Content -->
            </div>
@endsection