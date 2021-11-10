
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
						<li class="breadcrumb-item active" aria-current="page">Mis Pacientes</li>
					</ol>
				</nav>
				<h2 class="breadcrumb-title">Mis Pacientes</h2>
			</div>
		</div>
	</div>
</div>
<!-- /Breadcrumb -->

			
<!-- Page Content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4 col-lg-3 col-xl-3 theiaStickySidebar">
				@include('doctors.doctor-profile-sidebar', ['page' => 'mis-pacientes'])
			</div>

			<div class="col-md-8 col-lg-9 col-xl-9">
				@if ($countCaja === 0)
                    <div class="alert alert-warning fade show" role="alert">
                        <strong>Recuerda</strong> ¡Tienes que abrir tu caja para empezar a trabajar! <a href="{{ route("caja") }}">Clic aquí para abrirla</a>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						  </button>
                      </div>
                @else
				<?php 
				$date1 = new DateTime("now"); 
				$date2 = new DateTime(date("Y-m-d", strtotime($openCaja[0]->created_at)));
				$diff = $date1->diff($date2);
				$fechaInt = strtotime($openCaja[0]->created_at);
				//se añadio en el archivo main_vs.js desde head_blade
				if($diff->days > 0 ){
				?>
				<input type="hidden" value="{{ $openCaja[0]->id }}" id="check_caja_id" >
				<input type="hidden" value="{{ date("Y-m-d", $fechaInt) }}" id="check_caja_fecha" >
				<input type="hidden" value="{{ auth()->user("doctors")->clinicas->where('activa',1)->first()->id }}" id="check_caja_clinic" >
				<input type="hidden" value="{{ auth()->user("doctors")->id }}" id="check_caja_doctor" >
				<input type="hidden" value="{{ $openCaja[0]->apertura }}" id="check_caja_apertura" >
					<script>
					verificar_caja();
					</script>
				<?php
				}  ?>
				<div class="row">
					<div class="col-sm-12 mb-4">
						<div class="">
							<a href="{{ route('paciente-nuevo') }}" class="btn btn-primary btn-md float-right"><i class="fas fa-user"></i> Añadir Nuevo Paciente</a>
						</div>
					</div>

				</div>

				<div class="row">
					<div class="col-sm-12">
						<div class="card">
							<div class="card-body">
							@if(!$pacientes->isEmpty())
								<div class="table-responsive">
									<table class="table table-hover table-center mb-0" id="table_pacients">
										<thead>
											<tr>
												<th>#</th>
												<th>Folio</th>
												<th>Nombre</th>
												<th>Edad</th>
												<th>Sexo</th>
												<th>Email</th>
												<th>Teléfono</th>
												<th class="text-right">Acciones</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($pacientes as $paciente)
											<tr  >
												<td>{{ $paciente->id }}</td>
												<td>P{{ $paciente->id }}</td>
												
												<td>
													<h2 class="table-avatar">
														<a href="profile" class="avatar avatar-sm mr-2">
															@if ($paciente->foto)
															<img class="avatar-img" src="../storage/{{$paciente->foto }}" alt="{{ $paciente->nombre }}">
															@else
																@if ($paciente->sexo == "Masculino")
																<img src="assets/img/icons/male.png" alt="">
																@else
																<img src="assets/img/icons/female.png" alt="">
																@endif
															@endif
															
														</a>
														<a href="{{ route('historial',$paciente) }}">{{ $paciente->nombre }} {{ $paciente->apellido_p }} {{ $paciente->apellido_m }}</a>
													</h2>
												</td>
												<td>{{ $paciente->get_edad() }}</td>
												<td>{{ $paciente->sexo }}</td>
												<td><a href="mailto:{{ $paciente->email }}">{{ $paciente->email }}</a></td>
												<td><a href="tel:{{ $paciente->telefono }}">{{ $paciente->telefono }}</a></td>
												
											
												<td class="text-right">
													<div class="actions btn-group">
														<a title="Consulta" class="btn btn-sm bg-primary-light btn-editar"  href="{{ route('historial',$paciente) }}">
															<i class="fas fa-notes-medical"></i></a>
														<a title="Ver Perfíl" class="btn btn-sm bg-info-light " href="{{ route('perfil-paciente',$paciente) }}">
														<i class="fas fa-id-card-alt"></i></a>
														<a title="Editar" class="btn btn-sm bg-warning-light btn-editar"  href="{{ route('editar-paciente',$paciente) }}"><i class="fas fa-edit"></i></a>
														<a  title="Eliminar" class="btn btn-sm bg-danger-light btn-delete" data-id="{{ $paciente->id }}"><i class="fas fa-trash-alt"></i></a>
														<a title="Ver"  data-toggle="modal"  class="btn btn-sm  bg-secondary-light btn-ver" data-id="{{ $paciente->id }}">
																<i class="fas fa-ellipsis-v"></i></a>
													</div>
												</td>
											</tr>
											@endforeach
										
										</tbody>
									</table>
								</div>
								@else
								<div role="alert" class="alert alert-warning  show"  ><strong>Alerta: </strong>Aún no tienes pacientes registrados</div>
								@endif
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<div class="alert alert-warning fade show" role="alert">
							<strong>Recuerda</strong> cerrar tu caja cuando finalices tu jornada de trabajo
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							  </button>
						  </div>
					</div>
				</div>
				@endif
			</div>
		</div>
	</div>

</div>		
<!-- /Page Content -->
</div>
<!-- /Main Wrapper -->

<!-- Ver Details Modal -->
<div class="modal fade" id="patient_details" aria-hidden="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document" >
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Detalles Paciente</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h3 id="p_nombre"></h3>
				<div class="patient-info">
					<ul>
						<li>Folio: <span id="p_folio" ></span></li>
						<li>Género: <span id="p_genero" ></span></li>
						<li>Registro: <span id="p_registro" ></span></li>
						<li>Tipo de Sangre: <span id="p_sangre" ></span></li>
						<li>Teléfono: <span id="p_telefono" ></span></li>
						<li>Email: <span id="p_email" ></span></li>
					</ul>
				</div>
				
			</div>
		</div>
	</div>
</div>
<!-- /Ver Details Modal -->


@endsection