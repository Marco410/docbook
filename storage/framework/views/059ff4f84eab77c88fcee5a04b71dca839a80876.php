
<?php $__env->startSection('content'); ?>	
<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content container-fluid">

	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-7 col-auto">
					<h3 class="page-title">Usuarios</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index">Panel Administrador</a></li>
						<li class="breadcrumb-item active">Usuarios</li>
					</ul>
				</div>
				<div class="col-sm-5 col">
					<a href="#Add_Specialities_details" data-toggle="modal" class="btn btn-primary float-right mt-2">Añadir Nuevo</a>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		<div class="row">
			<div class="col-sm-12">
				<div class="text-center">
					<h3><?php echo e($msj ?? ''); ?></h3>
					</div>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="datatable table table-hover table-center mb-0">
								<thead>
									<tr>
										<th>#</th>
										<th>Usuario</th>
										<th>Rol</th>
										<th class="text-right">Acciones</th>
									</tr>
								</thead>
								<tbody>
									<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td>#US<?php echo e($user->id); ?></td>
										
										<td>
											<h2 class="table-avatar">
												<a href="profile" class="avatar avatar-sm mr-2">
													<img class="avatar-img" src="<?php echo e(asset('assets_admin/img/icons/male.png')); ?>" alt="<?php echo e($user->nombre); ?>">
												</a>
												<a href="profile"><?php echo e($user->nombre); ?></a>
											</h2>
										</td>
										<td>
											<?php if(!$user->roles->isEmpty()): ?>
												<?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<button for="" class="btn btn-sm btn-info"><?php echo e($role->name); ?></button>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
											<?php else: ?>
												<button for="" class="btn btn-sm btn-danger">Sin rol asignado</button>
											<?php endif; ?>
										</td>
									
										<td class="text-right">
											<div class="actions">
												<a class="btn btn-sm bg-warning-light btn-editar" data-toggle="modal" data-id="<?php echo e($user->id); ?>" data-value="<?php echo e($user->nombre); ?>" href="#edit_specialities_details">
													<i class="fe fe-pencil"></i> Editar
												</a>
												<a  data-toggle="modal" href="#delete_modal" class="btn btn-sm bg-danger-light btn-delete" data-id="<?php echo e($user->id); ?>">
													<i class="fe fe-trash"></i> Eliminar
												</a>
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
							<form method="post" enctype="multipart/form-data" action="<?php echo e(url('/admin/guardar-especialidad')); ?>" class="needs-validation" novalidate >
								<?php echo e(csrf_field()); ?>

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
							<h5 class="modal-title">Editar Usuario</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form method="post" enctype="multipart/form-data" action="<?php echo e(url('/admin/editar-usuario')); ?>" class="needs-validation" novalidate >
								<?php echo e(csrf_field()); ?>

								<input type="hidden" id="id_espe" name="id_espe" value="" />
								<div class="row form-row">
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Usuario</label>
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
							<h5 class="modal-title">Eliminar Usuario</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="form-content p-2">
								<h4 class="modal-title">Eliminar</h4>
								<p class="mb-4">¿Estas seguro que deseas eliminar?</p>
								<form method="post"  action="<?php echo e(url('/admin/eliminar-usuario')); ?>" >
									<?php echo e(csrf_field()); ?>

									<input type="hidden" id="id_user" name="id_user" value="" />
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\pixelar_doc\laravel-files\template\resources\views/admin/users.blade.php ENDPATH**/ ?>