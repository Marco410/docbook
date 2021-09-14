@extends('layout.mainlayout_admin')
@section('content')	

			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Lista de Doctores</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Panel Administración</a></li>
									<li class="breadcrumb-item"><a href="javascript:(0);">Usuarios</a></li>
									<li class="breadcrumb-item active">Doctor</li>
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
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Nombre Doctor</th>
													<th>Especialidad</th>
													<th>Miembro Desde</th>
													<th>Ganancias</th>
													<th>Estatus</th>
													
												</tr>
											</thead>
											<tbody>
												
												@foreach($doctors as $doctor)
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="profile" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="../storage/{{ $doctor->foto }}" alt="User Image"></a>
															<a href="">Dr. {{ $doctor->nombre }} {{ $doctor->apellido_p }}</a>
														</h2>
													</td>
													<td>{{ $doctor->espe ?? '' }}</td>
													<td><?php echo date("j M, Y", strtotime($doctor->created_at))  ?><br><small><?php echo date("h:i A", strtotime($doctor->created_at))  ?></small></td>
													<td>$1</td>
													<td>
														<div class="status-toggle">
														<input data-id="{{ $doctor->id }}" type="checkbox" id="status{{ $doctor->id }}" class="check status"  @if ($doctor->status === "1") checked @else '' @endif >
														<label for="status{{ $doctor->id }}" class="checktoggle">checkbox</label>
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
		
        </div>
		<!-- /Main Wrapper -->
@endsection