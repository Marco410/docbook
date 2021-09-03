@extends('layout.mainlayout_admin')
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-7 col-auto">
								<h3 class="page-title">Lista de Roles</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Panel Administrator</a></li>
									<li class="breadcrumb-item active">Lista de Roles</li>
								</ul>
							</div>
							<div class="col-sm-5 col">
								<a href="#Add_Specialities_details" data-toggle="modal" class="btn btn-primary float-right mt-2">Añadir nuevo Rol</a>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<h3>{{ $msj ?? "" }}</h3>
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>#</th>
													<th>Rol</th>
													<!--<th class="text-right">Actions</th>-->
												</tr>
											</thead>
											<tbody>
												@foreach ($roles as $rol)
												<tr>
													<td>{{ $rol->id }}</td>
													<td>{{ $rol->name }}</td>
													<!---<td class="text-right">
														<div class="actions">
															<a class="btn btn-sm bg-success-light btn-editar" data-id="{{ $rol->id }}" data-value="{{ $rol->name }}" data-toggle="modal" href="#edit_specialities_details">
																<i class="fe fe-pencil"></i> Editar
															</a>
															
															<a  data-toggle="modal" href="#delete_modal" class="btn btn-sm bg-danger-light">
																<i class="fe fe-trash"></i> Eliminar
															</a>
														</div>
													</td>-->
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
							<h5 class="modal-title">Añadir Rol</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form method="POST" action="{{ url("admin/roles/guardar") }}">
								{{ csrf_field() }}
								<div class="row form-row">
									<div class="col-12">
										<div class="form-group">
											<label>Nombre</label>
											<input required class="form-control" name="name" id="name" placeholder="Nombre del Rol" />
										</div>
										<div class="col-12" >
											<div class="form-group">
												<h3>Lista Permisos</h3>
												@foreach ($permisos as $permiso)
												<div>
													<label for=""> 
														<input type="checkbox" class="mr-1" name="permissions[]" value="{{ $permiso->id }}" > {{ $permiso->description }}
													</label>
												</div>
													
												@endforeach
											</div>
										
										</div>
										
									</div>
								</div>
								@if($errors->any())
										@foreach($errors->all() as $error)
											<div role="alert" class="alert alert-danger alert-dismissible fade show"  ><strong>Error: </strong>{{ $error }}</div>
										@endforeach
								@endif
								<button type="submit" class="btn btn-primary btn-block">Añadir Rol</button>
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
							<h5 class="modal-title">Editar Rol</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form>
								<div class="row form-row">
									<div class="col-12">
										<div class="form-group">
											<input type="hidden" value="" id="id_rol_edit"  />
											<label>Nombre</label>
											<input class="form-control" id="name_edit" />
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
					<!--	<div class="modal-header">
							<h5 class="modal-title">Delete</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>-->
						<div class="modal-body">
							<div class="form-content p-2">
								<h4 class="modal-title">Eliminar</h4>
								<p class="mb-4">¿Estas seguro que deseas eliminar?</p>
								<button type="button" class="btn btn-primary">Eliminar </button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Delete Modal -->
        </div>
		<!-- /Main Wrapper -->
@endsection