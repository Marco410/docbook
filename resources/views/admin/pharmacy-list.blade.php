@extends('layout.mainlayout_admin')
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-7 col-auto">
					<h3 class="page-title">Lista de Clinicas</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index">Inicio</a></li>
						<li class="breadcrumb-item active">Lista de Clinicas</li>
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
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">

							<table id="table_clinics" class="table table-hover table-center mb-0">
								<thead>
									<tr>
										<th>#</th>
										<th>Logo</th>
										<th>Nombre</th>
										<th>Estado</th>
										<th>No. Médicos</th>
										<th>Teléfono</th>
										<th>Nombre Organización</th>
										<th >Acciones</th>
									</tr>
								</thead>
								<tbody>
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
				<h5 class="modal-title">Add Pharmacy</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="row form-row">
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<label>Pharmacy Name</label>
								<input type="text" class="form-control">
							</div>
						</div>
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<label>Image</label>
								<input type="file"  class="form-control">
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label>Pharmacy Details</label>
								<textarea class="form-control" rows="4"></textarea>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary btn-block">Save Changes</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /ADD Modal -->
			
<!-- Edit Details Modal -->
<div class="modal fade" id="edit_clinic" aria-hidden="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document" >
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Editar Clinica</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				
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
								<p class="mb-4">¿Estás seguro de eliminar esta clinica?</p>
								<button type="button" data-id="" id="btn-delete-clinica" class="btn btn-primary">Eliminar</button>
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