

<?php $__env->startSection('content'); ?>
	<!-- Breadcrumb -->
<div class="breadcrumb-bar">
	<div class="container-fluid">
		<div class="row align-items-center">
			<div class="col-md-12 col-12">
				<nav aria-label="breadcrumb" class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index">Inicio</a></li>
						<li class="breadcrumb-item active" aria-current="page">Mis Pacientes</li>
					</ol>
				</nav>
				<h2 class="breadcrumb-title">Mis Pacientes</h2>
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
				<?php echo $__env->make('doctors.doctor-profile-sidebar', ['page' => 'mis-pacientes'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</div>

			<div class="col-md-8 col-lg-9 col-xl-9">

				<div class="row">
					<div class="col-sm-12 mb-4">
						<div class="">
							<a href="<?php echo e(route('paciente-nuevo')); ?>" class="btn btn-primary btn-md float-right"><i class="fas fa-user"></i> Añadir Nuevo Paciente</a>
						</div>
					</div>

				</div>

				<div class="row">
					<div class="col-sm-12">
						<div class="card">
							<div class="card-body">
							<?php if(!$pacientes->isEmpty()): ?>
								<div class="table-responsive">
									<table class="datatable table table-hover table-center mb-0">
										<thead>
											<tr>
												<th>Folio</th>
												<th>Nombre</th>
												<th>Edad</th>
												<th>Sexo</th>
												<th>Email</th>
												<th>Teléfono</th>
												<th class="text-right">Acciones</th>
											</tr>
										</thead>
										<tbody>
											<?php $__currentLoopData = $pacientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paciente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr  >
												<td>P-<?php echo e($paciente->id); ?></td>
												
												<td>
													<h2 class="table-avatar">
														<a href="profile" class="avatar avatar-sm mr-2">
															<?php if($paciente->foto): ?>
															<img class="avatar-img" src="../storage/<?php echo e($paciente->foto); ?>" alt="<?php echo e($paciente->nombre); ?>">
															<?php else: ?>
																<?php if($paciente->sexo == "Masculino"): ?>
																<img src="assets/img/icons/male.png" alt="">
																<?php else: ?>
																<img src="assets/img/icons/female.png" alt="">
																<?php endif; ?>
															<?php endif; ?>
															
														</a>
														<a href="profile"><?php echo e($paciente->nombre); ?> <?php echo e($paciente->apellido_p); ?> <?php echo e($paciente->apellido_m); ?></a>
													</h2>
												</td>
												<td><?php echo e($paciente->get_edad()); ?></td>
												<td><?php echo e($paciente->sexo); ?></td>
												<td><a href="mailto:<?php echo e($paciente->email); ?>"><?php echo e($paciente->email); ?></a></td>
												<td><a href="tel:<?php echo e($paciente->telefono); ?>"><?php echo e($paciente->telefono); ?></a></td>
												
											
												<td class="text-right">
													<div class="actions btn-group">
														<a title="Consulta" class="btn btn-sm bg-primary-light btn-editar"  href="<?php echo e(route('historial',$paciente)); ?>">
															<i class="fas fa-notes-medical"></i></a>
														<a title="Ver Perfíl" class="btn btn-sm bg-info-light btn-editar" data-toggle="modal"  href="">
																<i class="fas fa-id-card-alt"></i></a>
														<a title="Editar" class="btn btn-sm bg-warning-light btn-editar" data-toggle="modal" data-id="<?php echo e($paciente->id); ?>" data-value="<?php echo e($paciente->nombre); ?>" href="#edit_specialities_details">
																<i class="fas fa-edit"></i></a>
														<a  title="Eliminar" data-toggle="modal" href="#delete_modal" class="btn btn-sm bg-danger-light btn-delete" data-id="<?php echo e($paciente->id); ?>"><i class="fas fa-trash-alt"></i></a>
														<a title="Ver"  data-toggle="modal"  class="btn btn-sm  bg-secondary-light btn-ver" data-id="<?php echo e($paciente->id); ?>">
																<i class="fas fa-ellipsis-v"></i></a>
													</div>
												</td>
											</tr>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										
										</tbody>
									</table>
								</div>
								<?php else: ?>
								<div role="alert" class="alert alert-warning  show"  ><strong>Alerta: </strong>Aún no tienes pacientes registrados</div>
								<?php endif; ?>
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


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\pixelar_doc\laravel-files\template\resources\views/doctors/my-patients.blade.php ENDPATH**/ ?>