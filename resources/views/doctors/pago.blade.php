
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
						<li class="breadcrumb-item active" aria-current="page">Pago</li>
					</ol>
				</nav>
				<h2 class="breadcrumb-title">Pago</h2>
			</div>
			<div class="col-md-2 col-2">
				<p class="text-white" >
					Clinica: <strong>{{ auth()->user("doctors")->clinicas->where('activa',1)->first()->nombre_organizacion }}</strong>
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
				@include('doctors.doctor-profile-sidebar', ['page' => 'pagos'])
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
					
				<div class="row">
					<div class="col-sm-4">
						<div class="card">
							<form method="post" enctype="multipart/form-data" action="{{ route('save-pago') }}" novalidate >
								{{ csrf_field() }}
                                <input name="clinica_id" type="hidden" value="{{ auth()->user("doctors")->clinicas->where('activa',1)->first()->id }}" />
								<div class="card-body">
								<div class="form-group">
								<label for=""> <i class="fas fa-random text-info" ></i> Tipo de Movimiento: <span class="text-danger">*</span></label>
								<select class="form-control select" name="tipo_movimiento" id="">
									<option value="Entrada">Entrada</option>
									<option value="Salida">Salida</option>
								</select>
								</div>
								<div class="form-group">
									<label> <i class="fas fa-align-left text-info" ></i> Descripción <span class="text-danger">*</span></label>
									<input required type="text" name="descripcion" class="form-control" id="descripcion" value="{{ old('descripcion') }}" >
								</div>

								<div class="form-group">
									<label><i class="fas fa-dollar-sign text-info" ></i> Importe <span class="text-danger">*</span></label>
									<input required type="text" name="importe" class="form-control" id="importe" value="{{ old('importe') }}" >
								</div>

								<div class="form-group">
									<label><i class="fas fa-eye text-info" ></i> Observaciones</label>
									<textarea name="observaciones" class="form-control" id="" rows="3"></textarea>
								</div>

								<div class="col-sm-12" >
									<button class="btn btn-sm btn-block btn-primary" > <i class="fas fa-save" ></i> Guardar</button>
								</div>

							</div>
							</form>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="card">
							<div class="card-header" >Lista de Lineas de Producto</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="datatable table table-hover table-center mb-0">
										<thead>
											<tr>
												<th>Descripción</th>
												<th>Observaciones</th>
												<th>Importe</th>
												<th>Tipo</th>
											</tr>
										</thead>
										<tbody>
											@if (!empty($pagos))
											@foreach ($pagos as $pago)
											<tr>
												<td>{{ $pago->descripcion }}</td>		
												<td>{{ $pago->observaciones }}</td>		
												<td>$ {{ $pago->importe }}</td>		
												<td>{{ $pago->tipo_movimiento }}</td>			
											</tr>
											@endforeach
											@endif
											
										</tbody>
									</table>
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