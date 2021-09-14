
<?php $__env->startSection('content'); ?>	

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
												
												<?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="profile" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="../storage/<?php echo e($doctor->foto); ?>" alt="User Image"></a>
															<a href="">Dr. <?php echo e($doctor->nombre); ?> <?php echo e($doctor->apellido_p); ?></a>
														</h2>
													</td>
													<td><?php echo e($doctor->espe ?? ''); ?></td>
													<td><?php echo date("j M, Y", strtotime($doctor->created_at))  ?><br><small><?php echo date("h:i A", strtotime($doctor->created_at))  ?></small></td>
													<td>$1</td>
													<td>
														<div class="status-toggle">
														<input data-id="<?php echo e($doctor->id); ?>" type="checkbox" id="status<?php echo e($doctor->id); ?>" class="check status"  <?php if($doctor->status === "1"): ?> checked <?php else: ?> '' <?php endif; ?> >
														<label for="status<?php echo e($doctor->id); ?>" class="checktoggle">checkbox</label>
													</div>
												</td>

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
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\pixelar_doc\laravel-files\template\resources\views/admin/doctor-list.blade.php ENDPATH**/ ?>