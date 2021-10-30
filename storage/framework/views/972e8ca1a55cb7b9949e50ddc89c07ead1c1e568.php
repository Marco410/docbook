

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
				<?php if(Session::has('errorSaldo')): ?>
					<div class="row">
						<div class="col-sm-12">
						<div role="alert" class="alert alert-danger alert-dismissible fade show"  ><strong>Error: </strong>No hay saldo suficiente en caja. Registra una nueva entrada.</div>
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
				<?php if($countCaja === 0): ?>
                    <div class="alert alert-warning fade show" role="alert">
                        <strong>Recuerda</strong> ¡Tienes que abrir tu caja para empezar a trabajar! <a href="<?php echo e(route("caja")); ?>">Clic aquí para abrirla</a>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						  </button>
                      </div>
                <?php else: ?>	
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
									<textarea name="observaciones" class="form-control" id="" rows="3"><?php echo e(old('descripcion')); ?></textarea>
								</div>
								<input type="hidden" name="total" value="<?php echo e($total); ?>" >
								<div class="form-group">
									<label for=""> <i class="fas fa-file-invoice text-info" ></i> ¿Solicita Factura?
										<input type="checkbox" value="si" name="is_factura" id="is_factura"  >
									</label>
								</div>

								<div id="factura" style="display: none" >
									<div class="col-sm-12 text-center" >
										<i class="fas fa-file-invoice fa-2x text-info" ></i>
									</div>
									<div class="form-group">
										<label> <i class="fas fa-user-circle text-info" ></i> Nombre o Razón Social </label>
										<input  type="text" name="razon_social" class="form-control" id="razon_social" >
									</div>
									<div class="form-group">
										<label> <i class="fas fa-user text-info" ></i> RFC </label>
										<input  type="text" name="rfc" class="form-control" id="rfc" >
									</div>
									<div class="form-group">
										<label> <i class="fas fa-map-marker-alt text-info" ></i> Domicilio </label>
										<input  type="text" name="domicilio" class="form-control" id="domicilio" >
									</div>
									<div class="form-group">
										<label> <i class="fas fa-envelope text-info" ></i> Correo Electrónico </label>
										<input  type="text" name="email" class="form-control" id="email" >
									</div>
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
							<div class="card-header" >Lista de Lineas de Producto (Hoy) <span class="text-info" > <?php echo e(Date("d/m/Y")); ?></span>
							Total en Caja: <span class="text-info" > $<?php echo e($total); ?></span>
							</div>
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
												<th>Factura</th>
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
												<td>
												<?php if($pagoh->is_factura == "si"): ?>
												<button class="btn btn-sm bg-success-light" data-toggle="modal" data-target="#factura<?php echo e($pagoh->id); ?>" > Si</button>
												<?php else: ?>
												<span class="text-warning" >No</span>
												<?php endif; ?>
												</td>			
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
											<th>Factura</th>
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
											<td>
												<?php if($pago->is_factura == "si"): ?>
												<button class="btn btn-sm bg-success-light" data-toggle="modal" data-target="#factura<?php echo e($pago->id); ?>" > Si</button>
												<?php else: ?>
												<span class="text-warning" >No</span>
												<?php endif; ?>
											</td>
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
				<?php endif; ?>
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
<?php if(!empty($pagosH)): ?>
	<?php $__currentLoopData = $pagosH; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pagoh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<!-- /Ver Details Modal -->
	<div class="modal fade" id="factura<?php echo e($pagoh->id); ?>" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="factura<?php echo e($pagoh->id); ?>Label">Datos de Facturación. Pago N° <?php echo e($pagoh->id); ?>. </h5>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col">
						<p>Razón Social: <span class="text-secondary" ><?php echo e($pagoh->razon_social); ?> </span></p>
						<p>RFC: <span class="text-secondary" ><?php echo e($pagoh->rfc); ?> </span></p>
						<p>Domicilio: <span class="text-secondary" ><?php echo e($pagoh->domicilio); ?> </span></p>
						<p>Email: <span class="text-secondary" ><?php echo e($pagoh->email); ?> </span></p>
						<p>Descripción del pago: <span class="text-secondary" ><?php echo e($pagoh->descripcion); ?> </span></p>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\pixelar_doc\laravel-files\template\resources\views/doctors/pago.blade.php ENDPATH**/ ?>