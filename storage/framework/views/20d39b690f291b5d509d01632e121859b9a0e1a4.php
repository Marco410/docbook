
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
							<table id="table_doctors" class="table table-hover table-center mb-0">
								<thead>
									<tr>
										<th>ID</th>
										<th>Nombre Doctor</th>
										<th>Especialidad</th>
										<th>Miembro Desde</th>
										<th>Pais</th>
										<th>Estatus</th>
										<th>Acciones</th>
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

</div>
<!-- /Main Wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\pixelar_doc\laravel-files\template\resources\views/admin/doctor-list.blade.php ENDPATH**/ ?>