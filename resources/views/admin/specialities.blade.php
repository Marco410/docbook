@extends('layout.mainlayout_admin')
@section('content')	

<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-7 col-auto">
					<h3 class="page-title">Especialiades</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index">Panel Administrador</a></li>
						<li class="breadcrumb-item active">Especialidades</li>
					</ul>
				</div>
				<div class="col-sm-5 col">
					<a href="#Add_Specialities_details" data-toggle="modal" class="btn btn-primary float-right mt-2">Añadir Nueva</a>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		<div class="row">
			<div class="col-sm-12">
				<div class="text-center">
					<h3>{{ $msj ?? '' }}</h3>
					</div>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="datatable table table-hover table-center mb-0">
								<thead>
									<tr>
										<th>#</th>
										<th>Especialidades</th>
										<th class="text-right">Acciones</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($especialidades as $espe)
									<tr>
										<td>#SP{{ $espe->id }}</td>
										
										<td>
											<h2 class="table-avatar">
												<a href="profile" class="avatar avatar-sm mr-2">
													<img class="avatar-img" src="../storage/{{$espe->imagen }}" alt="{{ $espe->nombre }}">
												</a>
												<a href="profile">{{ $espe->nombre }}</a>
											</h2>
										</td>
									
										<td class="text-right">
											<div class="actions">
												<a class="btn btn-sm bg-warning-light btn-editar" data-toggle="modal" data-id="{{ $espe->id }}" data-value="{{ $espe->nombre }}" href="#edit_specialities_details">
													<i class="fe fe-pencil"></i> Editar
												</a>
												<a  data-toggle="modal" href="#delete_modal" class="btn btn-sm bg-danger-light btn-delete" data-id="{{ $espe->id }}">
													<i class="fe fe-trash"></i> Eliminar
												</a>
											</div>
										</td>
									</tr>
									@endforeach
								
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>			
		</div>
	</div>			
</div>
<!-- /Page Wrapper -->

<!-- Add Modal -->
<div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document" >
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Añadir Especialidad</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" enctype="multipart/form-data" action="{{ url('/admin/guardar-especialidad')}}" class="needs-validation" novalidate >
					{{ csrf_field() }}
					<div class="row form-row">
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<label>Especialidad</label>
								<input name="nombre" required type="text" class="form-control">
								<div class="invalid-feedback">
									Este campo es requerido
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<label>Imagen</label>
								<input name="imagen" required type="file"  class="form-control">
								<div class="invalid-feedback">
									Este campo es requerido
								</div>
							</div>
						</div>
						
					</div>
					<button type="submit" class="btn btn-primary btn-block">Agregar Cambios</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /ADD Modal -->
			
<!-- Edit Details Modal -->
<div class="modal fade" id="edit_specialities_details" aria-hidden="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document" >
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Editar Especialidad</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" enctype="multipart/form-data" action="{{ url('/admin/editar-especialidad')}}" class="needs-validation" novalidate >
					{{ csrf_field() }}
					<input type="hidden" id="id_espe" name="id_espe" value="" />
					<div class="row form-row">
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<label>Especialidad</label>
								<input type="text" class="form-control" value=""   name="nombre_edit" id="nombre_edit">
								<div class="invalid-feedback">
									Este campo es requerido
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<label>Imagen (Opcional)</label>
								<input type="file" name="imagen"  class="form-control">
							</div>
						</div>
						
					</div>
					<button type="submit" class="btn btn-primary btn-block">Guardar Cambios</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Edit Details Modal -->
			
<!-- Delete Modal -->
<div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document" >
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Eliminar Especialidad</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-content p-2">
					<h4 class="modal-title">Eliminar</h4>
					<p class="mb-4">¿Estas seguro que deseas eliminar?</p>
					<form method="post"  action="{{ url('/admin/eliminar-especialidad')}}" >
						{{ csrf_field() }}
						<input type="hidden" id="id_espe_d" name="id_espe_d" value="" />
					<button type="submit" class="btn btn-primary">Eliminar </button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Delete Modal -->
</div>
<!-- /Main Wrapper -->
@endsection