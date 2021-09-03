
<?php $__env->startSection('content'); ?>	
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
												<?php $__currentLoopData = $pacientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paciente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<tr>
														<td><?php echo e($paciente->id); ?></td>
														<td><h2 class="table-avatar">
															<a href="profile" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="../storage/<?php echo e($paciente->foto); ?>" alt="User Image"></a>
															<a href="profile"><?php echo e($paciente->nombre); ?> <?php echo e($paciente->apellido_p); ?> <?php echo e($paciente->apellido_m); ?> </a>
														</h2>
														</td>
														<td><?php echo e($paciente->edad); ?></td>
														<td><?php echo e($paciente->direccion); ?></td>
														<td><?php echo e($paciente->telefono); ?></td>
													</tr>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\pixelar_doc\laravel-files\template\resources\views/admin/patient-list.blade.php ENDPATH**/ ?>