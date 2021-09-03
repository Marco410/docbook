@extends('layout.mainlayout_admin')
@section('content')	
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Lista de Pacientes</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Panel de Inicio</a></li>
									<li class="breadcrumb-item"><a href="javascript:(0);">Usuarios</a></li>
									<li class="breadcrumb-item active">Pacientes</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Paciente ID</th>
													<th>Nombre</th>
													<th>Edad</th>
													<th>Direccion</th>
													<th>Teléfono</th>
												</tr>
											</thead>
											<tbody>
												@foreach ($pacientes as $paciente)
													<tr>
														<td>{{ $paciente->id }}</td>
														<td><h2 class="table-avatar">
															<a href="profile" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="../storage/{{ $paciente->foto }}" alt="User Image"></a>
															<a href="profile">{{ $paciente->nombre }} {{ $paciente->apellido_p }} {{ $paciente->apellido_m }} </a>
														</h2>
														</td>
														<td>{{ $paciente->edad }}</td>
														<td>{{ $paciente->direccion }}</td>
														<td>{{ $paciente->telefono }}</td>
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
			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
@endsection