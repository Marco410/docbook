
@extends('layout.mainlayout')
@section('content')
	<!-- Breadcrumb -->
<div class="breadcrumb-bar">
	<div class="container-fluid">
		<div class="row align-items-center">
			<div class="col-md-10 col-10">
				<nav aria-label="breadcrumb" class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index">Inicio</a></li>
						<li class="breadcrumb-item active" aria-current="page">Caja</li>
					</ol>
				</nav>
				<h2 class="breadcrumb-title">Modulo Caja</h2>
			</div>
			<div class="col-md-2 col-2">
				<p class="text-white" >
					Clinica: <strong>{{ auth()->user("doctors")->clinicas->where('activa',1)->first()->nombre_organizacion }}</strong><br>
					Fecha: <strong>{{ date("d-M-Y") }}</strong>
				</p>
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
				@include('doctors.doctor-profile-sidebar', ['page' => 'caja'])
			</div>

			<div class="col-md-8 col-lg-9 col-xl-9">
				@if (!empty($msj))
				<div class="row">
					<div class="col-sm-12">
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>Correcto</strong> Se creo el nuevo registro
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
						  </div>
					</div>
				</div>
				@endif

				@if($errors->any())
				<div class="row">
					<div class="col-sm-12">
					@foreach($errors->all() as $error)
					<div role="alert" class="alert alert-danger alert-dismissible fade show"  ><strong>Error: </strong>{{ $error }}</div>
					@endforeach
					</div>
				</div>
				@endif

			 @if (empty($openCaja))
				 
			 <div class="row">
				 <div class="col-sm-12">
					 <div class="card">
						 <form class="card-body"  method="post" action="{{ route('open-caja') }}" novalidate >
							 <div class="col-sm-12">
								 {{ csrf_field() }}
							 <h3 class="text-primary m-2" >Abrir Caja</h3>
							 <div class="form-group col-sm-4">
								 <label> <i class="fas fa-money-bill-alt text-info" ></i> Monto de Apertura <span class="text-danger">*</span></label>
								 <input required type="text" name="caja_apertura" class="form-control" id="caja_apertura" value="{{ old('caja_apertura') }}" >
							 </div>

						 </div>
						 <div class="col-sm-12">
							 <button class="btn btn-sm btn-block btn-primary" > <i class="fas fa-save" ></i> Abrir la Caja</button>
						 </div>
						 </form>
					 </div>
				 </div>
			 </div>
			 @else
			 
			 <div class="row">
				 <div class="col-sm-12">
					 <div class="card">
						 <form method="post" enctype="multipart/form-data" action="{{ route('caja-save') }}" novalidate >
							 {{ csrf_field() }}
							 <input name="clinica_id" type="hidden" value="{{ auth()->user("doctors")->clinicas[0]->id }}" />
							 <div class="card-body">
								 <div class="row">
							 <div class="form-group col-sm-4">
								 <label> <i class="fas fa-money-bill-alt text-info" ></i> Monto de Apertura <span class="text-danger">*</span></label>
								 <input readonly type="text" name="apertura" class="form-control"{{--   value="{{ $openCaja->apertura }}" --}} >
							 </div>

							 <div class="form-group col-sm-4">
								 <label> <i class="text-info fas fa-sign-in-alt"></i> Entradas <span class="text-danger">*</span></label>
								 <input required type="text" name="entradas" class="form-control" id="entradas" value="{{ old('entradas') }}" >
							 </div>

							 <div class="form-group col-sm-4">
								 <label> <i class="text-info fas fa-sign-out-alt"></i> Salidas <span class="text-danger">*</span></label>
								 <input required type="text" name="salidas" class="form-control" id="salidas" value="{{ old('salidas') }}" >
							 </div>
						 </div>
						 <div class="row">
							 <div class="col-sm-12 ">
								 <h3 class="text-info" > <i class="fas fa-chart-bar " ></i> Ventas de Contado</h3>
							 </div>
							 <div class="form-group col-sm-4">
								 <label><i class="fas fa-money-bill-wave text-info" ></i> Efectivo <span class="text-danger">*</span></label>
								 <input required type="text" name="ventas_efectivo" class="form-control" id="ventas_efectivo" value="{{ old('ventas_efectivo') }}" >
							 </div>
							 <div class="form-group col-sm-4">
								 <label><i class="fas fa-credit-card text-info" ></i> Tarjeta <span class="text-danger">*</span></label>
								 <input required type="text" name="ventas_tarjeta" class="form-control" id="ventas_tarjeta" value="{{ old('ventas_tarjeta') }}" >
							 </div>
							 <div class="form-group col-sm-4">
								 <label><i class="fas fa-exchange-alt text-info" ></i> Transferencia <span class="text-danger">*</span></label>
								 <input required type="text" name="ventas_transferencia" class="form-control" id="ventas_transferencia" value="{{ old('ventas_transferencia') }}" >
							 </div>
						 </div>
						 <div class="row">
							 <div class="form-group col-sm-6 pull-right">
								 
								 <label><i class="fas fa-hand-holding-usd text-info" ></i> Total <span class="text-danger">*</span></label>
								 <input required type="text" name="ventas_transferencia" class="form-control" id="ventas_transferencia" value="{{ old('ventas_transferencia') }}" >
								 
							 </div>
							 <div class="form-group col-sm-12" >
								 <button class="btn btn-sm btn-block btn-primary" > <i class="fas fa-save" ></i> Guardar</button>
							 </div>
						 </div>


						 </div>
						 </form>
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