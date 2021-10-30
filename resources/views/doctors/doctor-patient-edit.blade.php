<?php $page="paciente-nuevo";?>
@extends('layout.mainlayout')
@section('content')

			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="doctor-inicio">Inicio</a></li>
									<li class="breadcrumb-item active" aria-current="page">Editar Paciente</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Editando a Paciente {{ $paciente->nombre }} {{ $paciente->apellido_p }} {{ $paciente->apellido_m }}</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
						
							@include('doctors.doctor-profile-sidebar')
							
						</div>
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="col-sm-12">
								@if($errors->any())
									@foreach($errors->all() as $error)
										<div role="alert" class="alert alert-danger alert-dismissible fade show"  ><strong>Error: </strong>{{ $error }}</div>
									@endforeach
								@endif
							</div>
							<form method="post" enctype="multipart/form-data"  action="{{ route('doctor-paciente-editar') }}" class="needs-validation" novalidate>
								{{ csrf_field() }}
								<!-- Basic Information -->
								<input type="hidden" name="paciente_id" value="{{ $paciente->id }}" >
								<div class="card">
									
									<div class="card-body">
										<h4 class="card-title">Información Básica Actualizando</h4><br><br>
										<div class="row form-row">
											<div class="col-md-3">
												<div class="form-group">
													<div class="profile-pic-col" style="margin-top: -120px;">
														<div class="profile-pic-upload">
															<div class="cam-col">
																@if ($paciente->foto)
																<img id="prof-avatar" class="img-fluid" src="../storage/{{$paciente->foto }}" alt="{{ $paciente->nombre }}">
																@else
																	@if ($paciente->sexo == "Masculino")
																	<img src="assets/img/icons/male.png" id="prof-avatar" class="img-fluid" alt="">
																	@else
																	<img src="assets/img/icons/female.png" id="prof-avatar" class="img-fluid" alt="">
																	@endif
																@endif
															</div>
															<span>Actualizar Foto de Perfil</span>
															<input type="file" id="profile_image" name="foto">
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Nombre(s) <span class="text-danger">*</span></label>
													<input type="text" name="nombre" class="form-control" required value="{{ $paciente->nombre }}" >
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Apellido Paterno <span class="text-danger">*</span></label>
													<input type="text" name="apellido_p" class="form-control" value="{{ $paciente->apellido_p }}" required >
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Apellido Materno</label>
													<input type="text" name="apellido_m" class="form-control" value="{{ $paciente->apellido_m }}" >
												</div>
											</div>{{-- 
											<div class="col-md-6">
												<div class="form-group">
													<label>Correo Electrónico <span class="text-danger">*</span></label>
													<input type="email" name="email" value="{{ old("email") }}" required class="form-control" >
												</div>
											</div> --}}
											<div class="col-md-6">
												<div class="form-group">
													<label>Fecha de Nacimiento <span class="text-danger">*</span></label>
													<input type="date" name="fecha_nacimiento" required class="form-control" value="{{ $paciente->fecha_nacimiento }}" >
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Género <span class="text-danger">*</span></label>
													<select  name="sexo" class="form-control select" required >
														<option value="" >Selecciona: </option>
														<option value="Masculino" {{ ($paciente->sexo == "Masculino") ? "selected" : "" }} >Masculino</option>
														<option value="Femenino" {{ ($paciente->sexo == "Femenino") ? "selected" : "" }} >Femenino</option>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Teléfono <span class="text-danger">*</span></label>
													<input type="text" name="telefono" min="10" max="10" class="form-control" value="{{ $paciente->telefono }}" required >
												</div>
											</div>
											
											<div class="col-md-6">
												<div class="form-group">
													<label>Grupo Sanguineo</label>
													<select   class="form-control select" id="blood_group" name="tipo_sangre" tabindex="-1" aria-hidden="true">
														<option value="">Selecciona</option>
														<option value="A-" {{ ($paciente->tipo_sangre == "A-") ? "selected" : "" }} >A-</option>
														<option value="A+" {{ ($paciente->tipo_sangre == "A+") ? "selected" : "" }}>A+</option>
														<option value="B-" {{ ($paciente->tipo_sangre == "B-") ? "selected" : "" }}>B-</option>
														<option value="B+" {{ ($paciente->tipo_sangre == "B+") ? "selected" : "" }}>B+</option>
														<option value="AB-" {{ ($paciente->tipo_sangre == "AB-") ? "selected" : "" }}>AB-</option>
														<option value="AB+" {{ ($paciente->tipo_sangre == "AB+") ? "selected" : "" }}>AB+</option>
														<option value="O-" {{ ($paciente->tipo_sangre == "O-") ? "selected" : "" }}>O-</option>
														<option value="O+" {{ ($paciente->tipo_sangre == "O+") ? "selected" : "" }}>O+</option>
													</select>
													<div class="invalid-feedback">
														Este campo es requerido
													</div>
												</div>
											</div>
											<div class="col-md-6 ">
												<div class="form-group">
													<label>CURP </label>
													<input type="text" name="curp" class="form-control" value="{{ $paciente->curp }}">
												</div>
											</div>
										<div class="mb-4" data-toggle="collapse" href="#datos_demo" role="button" aria-expanded="false" aria-controls="datos_demo" ><h4 class="text-primary" > <i class="fas fa-home"></i> Datos Demográficos <i class="fas fa-chevron-down"></i> </h4>
										</div>
										<div class="collapse" id="datos_demo">
											<div class="row" >
											
											<div class="col-md-5">
												<div class="form-group mb-3">
													<label>Calle </label>
													<input type="text" name="calle" required class="form-control" value="{{ $paciente->calle }}">
												</div>
											</div>
											<div class="col-md-5">
												<div class="form-group mb-0">
													<label>Colonia </label>
													<input type="text" name="colonia" required class="form-control" value="{{ $paciente->colonia }}">
												</div>
											</div>
											<div class="col-md-2">
											<div class="form-group mb-0">
													<label>Código Postal </label>
													<input type="text" name="cp" required class="form-control" value="{{ $paciente->cp }}">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group mb-0">
													<label>Ciudad </label>
													<input type="text" name="ciudad" required class="form-control" value="{{ $paciente->ciudad }}">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group mb-3">
													<label>Estado </label>
													<select name="estado" id="estado" class="form-control select" aria-hidden="true" required >
														<option value="">Seleccione: </option>
														<option value="Aguascalientes" {{ ($paciente->estado == "Aguascalientes") ? "selected" : "" }}>Aguascalientes</option>
														<option value="Baja California" {{ ($paciente->estado == "Baja California") ? "selected" : "" }}>Baja California</option>
														<option value="Baja California Sur" {{ ($paciente->estado == "Baja California Sur") ? "selected" : "" }}>Baja California Sur</option>
														<option value="Campeche" {{ ($paciente->estado == "Campeche") ? "selected" : "" }}>Campeche</option>
														<option value="Chiapas" {{ ($paciente->estado == "Chiapas") ? "selected" : "" }}>Chiapas</option>
														<option value="Chihuahua" {{ ($paciente->estado == "Chihuahua") ? "selected" : "" }}>Chihuahua</option>
														<option value="Coahuila" {{ ($paciente->estado == "Coahuila") ? "selected" : "" }}>Coahuila</option>
														<option value="Colima" {{ ($paciente->estado == "Colima") ? "selected" : "" }}>Colima</option>
														<option value="Distrito Federal" {{ ($paciente->estado == "Distrito Federal") ? "selected" : "" }}>Distrito Federal</option>
														<option value="Durango" {{ ($paciente->estado == "Durango") ? "selected" : "" }}>Durango</option>
														<option value="Guanajuato" {{ ($paciente->estado == "Guanajuato") ? "selected" : "" }}>Guanajuato</option>
														<option value="Guerrero" {{ ($paciente->estado == "Guerrero") ? "selected" : "" }}>Guerrero</option>
														<option value="Hidalgo" {{ ($paciente->estado == "Hidalgo") ? "selected" : "" }}>Hidalgo</option>
														<option value="Jalisco" {{ ($paciente->estado == "Jalisco") ? "selected" : "" }}>Jalisco</option>
														<option value="Mexico" {{ ($paciente->estado == "Mexico") ? "selected" : "" }}>México</option>
														<option value="Michoacan" {{ ($paciente->estado == "Michoacan") ? "selected" : "" }}>Michoacán</option>
														<option value="Morelos" {{ ($paciente->estado == "Morelos") ? "selected" : "" }}>Morelos</option>
														<option value="Nayarit" {{ ($paciente->estado == "Nayarit") ? "selected" : "" }}>Nayarit</option>
														<option value="Nuevo Leon" {{ ($paciente->estado == "Nuevo Leon") ? "selected" : "" }}>Nuevo León</option>
														<option value="Oaxaca" {{ ($paciente->estado == "Oaxaca") ? "selected" : "" }}>Oaxaca</option>
														<option value="Puebla" {{ ($paciente->estado == "Puebla") ? "selected" : "" }}>Puebla</option>
														<option value="Queretaro" {{ ($paciente->estado == "Queretaro") ? "selected" : "" }}>Querétaro</option>
														<option value="Quintana Roo" {{ ($paciente->estado == "Quintana Roo") ? "selected" : "" }}>Quintana Roo</option>
														<option value="San Luis Potosi" {{ ($paciente->estado == "San Luis Potosi") ? "selected" : "" }}>San Luis Potosí</option>
														<option value="Sinaloa" {{ ($paciente->estado == "Sinaloa") ? "selected" : "" }}>Sinaloa</option>
														<option value="Sonora" {{ ($paciente->estado == "Sonora") ? "selected" : "" }}>Sonora</option>
														<option value="Tabasco" {{ ($paciente->estado == "Tabasco") ? "selected" : "" }}>Tabasco</option>
														<option value="Tamaulipas" {{ ($paciente->estado == "Tamaulipas") ? "selected" : "" }}>Tamaulipas</option>
														<option value="Tlaxcala" {{ ($paciente->estado == "Tlaxcala") ? "selected" : "" }}>Tlaxcala</option>
														<option value="Veracruz" {{ ($paciente->estado == "Veracruz") ? "selected" : "" }}>Veracruz</option>
														<option value="Yucatan" {{ ($paciente->estado == "Yucatan") ? "selected" : "" }}>Yucatán</option>
														<option value="Zacatecas" {{ ($paciente->estado == "Zacatecas") ? "selected" : "" }}>Zacatecas</option>
													</select>
												</div>
											</div>
										</div>
										</div>
											<div class="col-sm-12">
												<div class="form-group mb-2">
													<div class="remember-me-col justify-content-between">
														<label class="custom_check">
															<input required type="checkbox" name="recordatorio"  value="1" {{ ($paciente->recordatorio == "1") ? "checked" : "" }}  >
															<span class="checkmark"></span>
														</label>
														<span class="">El<strong> paciente</strong> acepta recibir recordatorios</span>
													</div>
												</div>
											</div>
											
											<div class="col-sm-12">
												<div class="form-group mb-2">
													<div class="remember-me-col justify-content-between">
														
														<label class="custom_check">
															<input required type="checkbox" class="" name="correo_bienvenida"  value="1" {{ ($paciente->correo_bienvenida == "1") ? "checked" : "" }}>
															<span class="checkmark"></span>
														</label>
														<span class="">Enviar <strong>correo</strong> de bienvenida.</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- /Basic Information -->
								
								<div class="submit-section submit-btn-bottom">
									<button type="submit" class="btn btn-warning submit-btn btn-block text-white"><i class="fas fa-edit" ></i> Actualizar Paciente</button>
								</div>
							</form>
						</div>
					</div>

				</div>

			</div>		
            <!-- /Page Content -->
</div>
@endsection