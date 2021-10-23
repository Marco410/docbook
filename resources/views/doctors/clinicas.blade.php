
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
						<li class="breadcrumb-item active" aria-current="page">Mis Clinicas</li>
					</ol>
				</nav>
				<h2 class="breadcrumb-title">Mis Clinicas</h2>
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
				@include('doctors.doctor-profile-sidebar', ['page' => 'clinicas'])
			</div>

			<div class="col-md-8 col-lg-9 col-xl-9">

				<div class="row">
					<div class="col-sm-12 mb-4">
						<div class="">
							<a href="{{ route('clinica-nueva') }}" class="btn btn-primary btn-md float-right"><i class="fas fa-clinic-medical"></i> Añadir Nueva Clinica</a>
						</div>
					</div>

				</div>

				<div class="row">
					<div class="col-sm-12">
						@if (Session::has('msj'))
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								<strong>Correcto</strong> Clinica añadida.
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
						@endif
						<div  class="row row-grid">
							@foreach ($clinicas as $clinica)
							<div  class="col-md-6 col-lg-4 col-xl-3 ng-star-inserted">
								<div  class="card widget-profile pat-widget-profile">
									<div  class="card-body">
										<div class="pro-widget-content">
											<div  class="profile-info-widget">
												
												<a class="booking-doc-img " href="#"><h2 class="text-info" >
													<i class="fas fa-clinic-medical" ></i></h2></a>
													<div  class="profile-det-info "><h3><a href="#">{{ $clinica->nombre_organizacion }}  </a>
													</h3>
													<div  class="patient-details"><h4><b>{{ $clinica->nombre_consultorio }} <small class="text-success" > {{ ($clinica->activa == "1") ?  "Activa" : "" }}</small> </b></h4>
														<h5><i  class="fas fa-map-marker-alt"></i> {{ $clinica->calle_consultorio }}, {{ $clinica->colonia_consultorio }}</h5>
														<h5  class="mb-0"> {{ $clinica->estado_consultorio }}, {{ $clinica->pais_consultorio }}</h5>
													</div>
												</div>
											</div>
										</div>
										<div  class="patient-info"><ul ><li >Teléfono <span >{{ $clinica->tel_consultorio }}</span></li><li >Médicos <span >{{ $clinica->no_medicos }}</span></li><li >Tipo <span >{{ $clinica->tipo_organizacion }}</span></li></ul></div>
									</div>
								</div>
							</div>
							@endforeach
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