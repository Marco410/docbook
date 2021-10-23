

<?php $__env->startSection('content'); ?>
	<!-- Breadcrumb -->
<div class="breadcrumb-bar">
	<div class="container-fluid">
		<div class="row align-items-center">
			<div class="col-md-10 col-10">
				<nav aria-label="breadcrumb" class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="doctor-inicio">Inicio</a></li>
						<li class="breadcrumb-item active" aria-current="page">Pago</li>
					</ol>
				</nav>
				<h2 class="breadcrumb-title">Pago</h2>
			</div>
			<div class="col-md-2 col-2">
				<p class="text-white" >
					Clinica: <strong><?php echo e(auth()->user("doctors")->clinicas->where('activa',1)->first()->nombre_organizacion); ?></strong>
				</p>
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
				<?php echo $__env->make('doctors.doctor-profile-sidebar', ['page' => 'pagos'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</div>

			<div class="col-md-8 col-lg-9 col-xl-9">
				<?php if(!empty($msj)): ?>
				<div class="row">
					<div class="col-sm-12">
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>Correcto</strong> Se creo el nuevo registro
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
						  </div>
					</div>
				</div>
				<?php endif; ?>

				<?php if($errors->any()): ?>
				<div class="row">
					<div class="col-sm-12">
					<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div role="alert" class="alert alert-danger alert-dismissible fade show"  ><strong>Error: </strong><?php echo e($error); ?></div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
				</div>
				<?php endif; ?>
					
				<div class="row">
					<div class="col-sm-4">
						<div class="card">
							<form method="post" enctype="multipart/form-data" action="<?php echo e(route('save-pago')); ?>" novalidate >
								<?php echo e(csrf_field()); ?>

                                <input name="clinica_id" type="hidden" value="<?php echo e(auth()->user("doctors")->clinicas->where('activa',1)->first()->id); ?>" />
								<div class="card-body">
								<div class="form-group">
								<label for=""> <i class="fas fa-random text-info" ></i> Tipo de Movimiento: <span class="text-danger">*</span></label>
								<select class="form-control select" name="tipo_movimiento" id="">
									<option value="Entrada">Entrada</option>
									<option value="Salida">Salida</option>
								</select>
								</div>
								<div class="form-group">
									<label> <i class="fas fa-align-left text-info" ></i> Descripción <span class="text-danger">*</span></label>
									<input required type="text" name="descripcion" class="form-control" id="descripcion" value="<?php echo e(old('descripcion')); ?>" >
								</div>

								<div class="form-group">
									<label><i class="fas fa-dollar-sign text-info" ></i> Importe <span class="text-danger">*</span></label>
									<input required type="text" name="importe" class="form-control" id="importe" value="<?php echo e(old('importe')); ?>" >
								</div>
								<div class="form-group" >
									<label><i class="fas fa-wallet text-info" ></i> Metodo de Pago:</label>
									<select class="form-control select" required name="metodo_pago" id="metodo_pago">
										<option value="">Seleccione:</option>
										<option value="Efectivo">Efectivo</option>
										<option value="Tarjeta">Tarjeta</option>
										<option value="Transferencia">Transferencia</option>
									</select>
								</div>

								<div class="form-group">
									<label><i class="fas fa-eye text-info" ></i> Observaciones</label>
									<textarea name="observaciones" class="form-control" id="" rows="3"></textarea>
								</div>

								<div class="col-sm-12" >
									<button class="btn btn-sm btn-block btn-primary" > <i class="fas fa-save" ></i> Guardar</button>
								</div>

							</div>
							</form>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="card">
							<div class="card-header" >Lista de Lineas de Producto (Hoy) <?php echo e(Date("d/m/Y")); ?> </div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="datatable table table-hover table-center mb-0">
										<thead>
											<tr>
												<th>Des.</th>
												<th>Obs.</th>
												<th>Importe</th>
												<th>Tipo</th>
												<th>Método</th>
												<th>Fecha</th>
											</tr>
										</thead>
										<tbody>
											<?php if(!empty($pagosH)): ?>
											<?php $__currentLoopData = $pagosH; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pagoh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr>
												<td><?php echo e($pagoh->descripcion); ?></td>		
												<td><?php echo e($pagoh->observaciones); ?></td>		
												<td>$ <?php echo e($pagoh->importe); ?></td>		
												<td><?php echo e($pagoh->tipo_movimiento); ?></td>			
												<td><?php echo e($pagoh->metodo_pago); ?></td>			
												<td><?php echo e($pagoh->created_at->diffForHumans()); ?></td>			
											</tr>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
											
										</tbody>
									</table>
								</div>
								
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-12">
					<div class="card">
						<div class="card-header" >Lista de Lineas de Producto (Linea del tiempo)</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="datatable table table-hover table-center mb-0">
									<thead>
										<tr>
											<th>Descripción</th>
											<th>Observaciones</th>
											<th>Importe</th>
											<th>Tipo</th>
											<th>Fecha</th>
										</tr>
									</thead>
									<tbody>
										<?php if(!empty($pagos)): ?>
										<?php $__currentLoopData = $pagos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pago): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr>
											<td><?php echo e($pago->descripcion); ?></td>		
											<td><?php echo e($pago->observaciones); ?></td>		
											<td>$ <?php echo e($pago->importe); ?></td>		
											<td><?php echo e($pago->tipo_movimiento); ?></td>
											<td><?php echo e($pago->created_at); ?></td>
										</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php endif; ?>
										
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
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\pixelar_doc\laravel-files\template\resources\views/doctors/pago.blade.php ENDPATH**/ ?>