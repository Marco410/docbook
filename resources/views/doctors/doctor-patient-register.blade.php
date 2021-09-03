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
									<li class="breadcrumb-item"><a href="index">Inicio</a></li>
									<li class="breadcrumb-item active" aria-current="page">Registrar Nuevo Paciente</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Registrar Nuevo Paciente</h2>
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
							<form method="post" enctype="multipart/form-data"  action="{{ route('doctor-paciente-registro') }}" class="needs-validation" novalidate>
								{{ csrf_field() }}
								<!-- Basic Information -->
								<div class="card">
									<div class="card-body">
										<h4 class="card-title">Información Básica</h4>
										<div class="row form-row">
											<div class="col-md-3">
												<div class="form-group">
													<div class="profile-pic-col" style="margin-top: -120px;">
														<div class="profile-pic-upload">
															<div class="cam-col">
																<img src="/assets/img/icons/camera.svg" id="prof-avatar" alt="" class="img-fluid">
															</div>
															<span>Subir Foto de Perfil</span>
															<input type="file" id="profile_image" name="foto">
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Nombre(s) <span class="text-danger">*</span></label>
													<input type="text" name="nombre" class="form-control" required value="{{ old("nombre") }}" >
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Apellido Paterno <span class="text-danger">*</span></label>
													<input type="text" name="apellido_p" class="form-control" value="{{ old("apellido_p") }}" required >
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Apellido Materno</label>
													<input type="text" name="apellido_m" class="form-control" value="{{ old("apellido_m") }}" >
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Correo Electrónico <span class="text-danger">*</span></label>
													<input type="email" name="email" value="{{ old("email") }}" required class="form-control" >
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Fecha de Nacimiento <span class="text-danger">*</span></label>
													<input type="date" name="fecha_nacimiento" required class="form-control" value="{{ old("fecha_nacimiento") }}" >
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Género <span class="text-danger">*</span></label>
													<select  name="sexo" class="form-control select" required >
														<option value="" >Selecciona: </option>
														<option value="Masculino" >Masculino</option>
														<option value="Femenino" >Femenino</option>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Teléfono <span class="text-danger">*</span></label>
													<input type="text" name="telefono" min="10" max="10" class="form-control" value="{{ old("telefono") }}" required >
												</div>
											</div>
											
											<div class="col-md-6">
												<div class="form-group">
													<label>Grupo Sanguineo</label>
													<select   class="form-control select" id="blood_group" name="tipo_sangre" tabindex="-1" aria-hidden="true">
														<option value="">Selecciona</option>
														<option value="A-">A-</option>
														<option value="A+">A+</option>
														<option value="B-">B-</option>
														<option value="B+">B+</option>
														<option value="AB-">AB-</option>
														<option value="AB+">AB+</option>
														<option value="O-">O-</option>
														<option value="O+">O+</option>
													</select>
													<div class="invalid-feedback">
														Este campo es requerido
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>CURP </label>
													<input type="text" name="curp" class="form-control" value="{{ old("curp") }}">
												</div>
											</div>
										<div class="mb-4" data-toggle="collapse" href="#datos_demo" role="button" aria-expanded="false" aria-controls="datos_demo" ><h4 class="text-primary" > <i class="fas fa-home"></i> Datos Demográficos <i class="fas fa-chevron-down"></i> </h4>
										</div>
										<div class="collapse" id="datos_demo">
											<div class="row" >
											
											<div class="col-md-5">
												<div class="form-group mb-3">
													<label>Calle </label>
													<input type="text" name="calle" required class="form-control" value="{{ old("calle") }}">
												</div>
											</div>
											<div class="col-md-5">
												<div class="form-group mb-0">
													<label>Colonia </label>
													<input type="text" name="colonia" required class="form-control" value="{{ old("colonia") }}">
												</div>
											</div>
											<div class="col-md-2">
											<div class="form-group mb-0">
													<label>Código Postal </label>
													<input type="text" name="cp" required class="form-control" value="{{ old("cp") }}">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group mb-0">
													<label>Ciudad </label>
													<input type="text" name="ciudad" required class="form-control" value="{{ old("ciudad") }}">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group mb-3">
													<label>Estado </label>
													<select name="estado" id="estado" class="form-control select" aria-hidden="true" required >
														<option value="">Seleccione: </option>
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
												</div>
											</div>
										</div>
										</div>
											<div class="col-sm-12">
												<div class="form-group mb-2">
													<div class="remember-me-col justify-content-between">
														<label class="custom_check">
															<input required type="checkbox" name="recordatorio"  value="1"  >
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
															<input required type="checkbox" class="" name="correo_bienvenida"  value="1">
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
									<button type="submit" class="btn btn-primary submit-btn btn-block"><i class="fas fa-user" ></i> Guardar Paciente</button>
								</div>
							</form>
						</div>
					</div>

				</div>

			</div>		
            <!-- /Page Content -->
</div>
@endsection