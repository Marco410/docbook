

<?php $__env->startSection('content'); ?>
	<!-- Breadcrumb -->
<div class="breadcrumb-bar">
	<div class="container-fluid">
		<div class="row align-items-center">
			<div class="col-md-10 col-10">
				<nav aria-label="breadcrumb" class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="doctor-inicio">Inicio</a></li>
						<li class="breadcrumb-item active" aria-current="page">Caja</li>
					</ol>
				</nav>
				<h2 class="breadcrumb-title">Modulo Caja</h2>
			</div>
			<div class="col-md-2 col-2">
				<p class="text-white" >
					Clinica: <strong><?php echo e(auth()->user("doctors")->clinicas->where('activa',1)->first()->nombre_organizacion); ?></strong><br>
					Fecha: <strong><?php echo e(date("d-M-Y")); ?></strong>
				</p>
			</div>
		</div>
	</div>
</div>
<!-- /Breadcrumb -->
<input type="hidden" id="clinic_id" value="<?php echo e(auth()->user("doctors")->clinicas->where('activa',1)->first()->id); ?>" >
<input type="hidden" id="doctor_id" value="<?php echo e(auth()->user("doctors")->id); ?>" >
			
<!-- Page Content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4 col-lg-3 col-xl-3 theiaStickySidebar">
				<?php echo $__env->make('doctors.doctor-profile-sidebar', ['page' => 'caja'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
			 <?php if($countCaja === 0): ?>
			 <div class="row">
				 <div class="col-sm-12">
					 <div class="card">
						 <form class="card-body"  method="post" action="<?php echo e(route('open-caja')); ?>" novalidate >
							 <div class="col-sm-12">
								 <?php echo e(csrf_field()); ?>

							 <h3 class="text-primary m-2" >Abrir Caja</h3>
							 <div class="form-group col-sm-4">
								 <label> <i class="fas fa-money-bill-alt text-info" ></i> Monto de Apertura <span class="text-danger">*</span></label>
								 <input required type="text" name="caja_apertura" class="form-control" id="caja_apertura" value="<?php echo e(old('caja_apertura')); ?>" >
							 </div>

						 </div>
						 <div class="col-sm-12">
							 <button class="btn btn-sm btn-block btn-primary" > <i class="fas fa-save" ></i> Abrir la Caja</button>
						 </div>
						 </form>
					 </div>
				 </div>
			 </div>
			 <?php else: ?>
				<?php if($openCaja->abierta == "1"): ?>
				<div class="row">
					<div class="col-sm-12">
						<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col-sm-12 text-center mb-4" >
											<h3 class="text-primary" >Todos los montos corresponden al día de hoy <?php echo e(Date("d-M-Y")); ?> </h3>
										</div>
										<input type="hidden" value="<?php echo e($openCaja->id); ?>" id="caja_id" >
								<div class="form-group col-sm-4">
									<label> <i class="fas fa-money-bill-alt text-info" ></i> Monto de Apertura <span class="text-danger">*</span></label>
									<input readonly type="text" name="apertura" id="apertura" class="form-control" value="<?php echo e($openCaja->apertura); ?>" >
								</div>
   
								<div class="form-group col-sm-4">
									<label> <i class="text-info fas fa-sign-in-alt"></i> Entradas <span class="text-danger">*</span></label>
									<input readonly type="text" name="entradas" class="form-control" id="entradas" value="<?php echo e($entradas); ?>" >
								</div>
   
								<div class="form-group col-sm-4">
									<label> <i class="text-info fas fa-sign-out-alt"></i> Salidas <span class="text-danger">*</span></label>
									<input  readonly type="text" name="salidas" class="form-control" id="salidas" value="<?php echo e($salidas); ?>" >
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12 ">
									<h3 class="text-info" > <i class="fas fa-chart-bar " ></i> Ventas de Contado</h3>
								</div>
								<div class="form-group col-sm-4">
									<label><i class="fas fa-money-bill-wave text-info" ></i> Efectivo Entradas <span class="text-danger">*</span></label>
									<input readonly type="text" name="ventas_efectivo" class="form-control" id="ventas_efectivo" value="<?php echo e($efectivo); ?>" >
								</div>
								<div class="form-group col-sm-4">
									<label><i class="fas fa-credit-card text-info" ></i> Tarjeta Entradas <span class="text-danger">*</span></label>
									<input  readonly type="text" name="ventas_tarjeta" class="form-control" id="ventas_tarjeta" value="<?php echo e($tarjeta); ?>" >
								</div>
								<div class="form-group col-sm-4">
									<label><i class="fas fa-exchange-alt text-info" ></i> Transferencia Entradas <span class="text-danger">*</span></label>
									<input readonly type="text" name="ventas_transferencia" class="form-control" id="ventas_transferencia" value="<?php echo e($transferencia); ?>">
								</div>
								<div class="form-group col-sm-4">
									<label><i class="fas fa-money-bill-wave text-info" ></i> Efectivo Salidas <span class="text-danger">*</span></label>
									<input readonly type="text" name="salidas_efectivo" class="form-control" id="salidas_efectivo" value="<?php echo e($efectivoS); ?>" >
								</div>
								<div class="form-group col-sm-4">
									<label><i class="fas fa-credit-card text-info" ></i> Tarjeta Salidas <span class="text-danger">*</span></label>
									<input  readonly type="text" name="salidas_tarjeta" class="form-control" id="salidas_tarjeta" value="<?php echo e($tarjetaS); ?>" >
								</div>
								<div class="form-group col-sm-4">
									<label><i class="fas fa-exchange-alt text-info" ></i> Transferencia Salidas <span class="text-danger">*</span></label>
									<input readonly type="text" name="salidas_transferencia" class="form-control" id="salidas_transferencia" value="<?php echo e($transferenciaS); ?>">
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-6 pull-right">
									
									<label><i class="fas fa-hand-holding-usd text-info" ></i> Total <span class="text-danger">*</span></label>
									<input  readonly type="text" name="ventas_total" class="form-control" id="ventas_total" value="<?php echo e($total); ?>" >
									
								</div>
								
							</div>
							<div class="row">
								<div class="form-group col-sm-6" >
									<button type="button" class="btn btn-sm btn-block btn-primary" id="close_caja" > <i class="fas fa-save" ></i> Guardar y cerrar caja</button>
								</div>
								<div class="form-group col-sm-6" >
									<button type="button" class="btn btn-sm btn-block btn-secondary" id="make_report" > <i class="fas fa-archive" ></i> Reporte</button>
								</div>
							</div>
   
   
							</div>
						</div>
					</div>
				</div>
				<?php endif; ?>
			 <?php endif; ?>

			 <div class="col-sm-12">
				<div class="card">
					<div class="card-header" >Cajas (Linea del tiempo)</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="table_cajas" class="table table-hover table-center mb-0">
								<thead>
									<tr>
										<th>ID</th>
										<th>Estatus</th>
										<th>Apertura</th>
										<th>Entradas</th>
										<th>Salidas</th>
										<th>Efectivo</th>
										<th>Tarjeta</th>
										<th>Transferencias</th>
										<th>Total</th>
										<th>Abierta</th>
										<th>Cerrada</th>
										<th>Reportes</th>
									</tr>
								</thead>
								<tbody>
									
									
								</tbody>
							</table>
						</div>
						
					</div>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header" >Reporte entre fechas</div>
					<div class="card-body row">
						<div class="col-sm-6">
							<label for="">Fecha Inicial</label>
							<div class="input-group mb-3">
							<input type="datetime" id="fecha_ini" class="form-control datetimepicker" name="fecha">
							<div class="input-group-append ">
								<span class="input-group-text btn-primary text-white" id="basic-addon2"><i class="fas fa-calendar"></i></span>
							  </div>
							
						  </div>
						</div>
						<div class="col-sm-6">
							<label for="">Fecha Final</label>
							<div class="input-group mb-3">
								<input type="datetime" id="fecha_fin" class="form-control datetimepicker" name="fecha">
								<div class="input-group-append ">
									<span class="input-group-text btn-primary text-white" id="basic-addon2"><i class="fas fa-calendar"></i></span>
								  </div>
								
							  </div>
						</div>
						<div class="col-sm-6 offset-3">
							<button id="make_report_date" class="btn btn-sm btn-block btn-info" >Hacer Reporte</button>
						</div>
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
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\pixelar_doc\laravel-files\template\resources\views/doctors/caja.blade.php ENDPATH**/ ?>