
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
						<li class="breadcrumb-item active" aria-current="page">Reportes</li>
					</ol>
				</nav>
				<h2 class="breadcrumb-title">Reportes</h2>
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
				@include('doctors.doctor-profile-sidebar', ['page' => 'reportes'])
			</div>

			<div class="col-md-8 col-lg-9 col-xl-9">

				<div class="row">
					<div class="col-sm-12">
						<div  class="row row-grid">
							<div  class="col-md-6 col-lg-6 col-xl-6 ng-star-inserted">
								<div  class="card widget-profile pat-widget-profile">
									<div  class="card-body">
										<div class="pro-widget-content">
											<div  class="profile-info-widget">
												<h2 class="text-info" >
													<i class="fas fa-file-alt" ></i></h2>
													<div  class="profile-det-info "><h3><a href="#">Hoja Diaria</a>
													</h3>
													<div  class="patient-details">
														<div class="form-group">
															<label class="text-warning" for="">Fecha a consultar</label>
															<input id="date_diaria" type="date" class="form-control" value="{{ Date('d/m/Y') }}" />
														</div>
														<button class="btn btn-sm bg-primary-light" id="btn_report_hoja" >Hacer Reporte</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div  class="col-md-6 col-lg-6 col-xl-6 ng-star-inserted">
								<div  class="card widget-profile pat-widget-profile">
									<div  class="card-body">
										<div class="pro-widget-content">
											<div  class="profile-info-widget">
												<h2 class="text-info" >
													<i class="fas fa-file-csv" ></i></h2>
													<div  class="profile-det-info "><h3><a href="#">Suive</a>
													</h3>
													<div  class="patient-details row">
														<div class="form-group col-sm-6">
															<label class="text-warning" for="">Fecha de Inicio</label>
															<input type="date" id="date_ini" class="form-control" />
														</div>
														<div class="form-group col-sm-6">
															<label class="text-warning" for="">Fecha Final</label>
															<input type="date" id="date_fin" class="form-control" />
														</div>
														<div class="col-sm-12">
															<button class="btn btn-sm bg-primary-light" id="btn_report_suive" >Hacer Reporte</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div  class="col-md-12 col-lg-12 col-xl-12 ng-star-inserted">
								<div  class="card widget-profile pat-widget-profile">
									<div  class="card-body">
										<h3>Seleccione un paciente:</h3>
										<select class="form-control" required name="" id="paciente_id">
											<option value="">Seleccione: </option>
											@foreach ($pacientes as $paciente)
											<option value="{{ $paciente->id }}">{{ $paciente->nombre }} {{ $paciente->apellido_p }} {{ $paciente->m }}</option>
												
											@endforeach

										</select>
									</div>
								</div>
							</div>							
							<div  class="col-md-12 col-lg-12 col-xl-12 ng-star-inserted">
								<div  class="card widget-profile pat-widget-profile">
									<div  class="card-body">
										<div class="pro-widget-content">
											<div  class="profile-info-widget">
												<h2 class="text-info" >
													<i class="fas fa-file-medical-alt" ></i></h2>
													<div  class="profile-det-info "><h3><a href="#">Resumen Clínico</a>
													</h3>
													<div  class="patient-details">
														<button class="btn btn-sm bg-primary-light" id="btn_report_resumen" >Hacer Reporte</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>		
<!-- /Page Content -->
</div>
<!-- /Main Wrapper -->
{{-- 
<!-- Ver Details Modal -->
<div class="modal fade" id="clinic_details" aria-hidden="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document" >
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Detalles Clinica</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12 text-center">
						<img src="{{ asset("storage/".$clinica->logotipo) }}" alt="">
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>
<!-- /Ver Details Modal --> --}}


@endsection