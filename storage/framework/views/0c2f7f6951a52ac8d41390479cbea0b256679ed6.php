

<?php $__env->startSection('content'); ?>
	<!-- Breadcrumb -->
<div class="breadcrumb-bar">
	<div class="container-fluid">
		<div class="row align-items-center">
			<div class="col-md-12 col-12">
				<nav aria-label="breadcrumb" class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="doctor-inicio">Inicio</a></li>
						<li class="breadcrumb-item active" aria-current="page">Mis Clinicas</li>
					</ol>
				</nav>
				<h2 class="breadcrumb-title">Mis Clinicas</h2>
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
				<?php echo $__env->make('doctors.doctor-profile-sidebar', ['page' => 'clinicas'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</div>

			<div class="col-md-8 col-lg-9 col-xl-9">

				<div class="row">
					<div class="col-sm-12 mb-4">
						<div class="">
							<a href="<?php echo e(route('clinica-nueva')); ?>" class="btn btn-primary btn-md float-right"><i class="fas fa-clinic-medical"></i> Añadir Nueva Clinica</a>
						</div>
					</div>

				</div>

				<div class="row">
					<div class="col-sm-12">
						<?php if(Session::has('msj')): ?>
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								<strong>Correcto</strong> Clinica añadida.
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
						<?php endif; ?>
						<div  class="row row-grid">
							<?php $__currentLoopData = $clinicas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clinica): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div  class="col-md-6 col-lg-4 col-xl-3 ng-star-inserted">
								<div  class="card widget-profile pat-widget-profile">
									<div  class="card-body">
										<div class="pro-widget-content">
											<div  class="profile-info-widget">
												
												<a class="booking-doc-img " href="#"><h2 class="text-info" >
													<i class="fas fa-clinic-medical" ></i></h2></a>
													<div  class="profile-det-info "><h3><a href="#"><?php echo e($clinica->nombre_organizacion); ?>  </a>
													</h3>
													<div  class="patient-details"><h4><b><?php echo e($clinica->nombre_consultorio); ?> <small class="text-success" > <?php echo e(($clinica->activa == "1") ?  "Activa" : ""); ?></small> </b></h4>
														<h5><i  class="fas fa-map-marker-alt"></i> <?php echo e($clinica->calle_consultorio); ?>, <?php echo e($clinica->colonia_consultorio); ?></h5>
														<h5  class="mb-0"> <?php echo e($clinica->estado_consultorio); ?>, <?php echo e($clinica->pais_consultorio); ?></h5>
													</div>
												</div>
											</div>
										</div>
										<div  class="patient-info"><ul ><li >Teléfono <span ><?php echo e($clinica->tel_consultorio); ?></span></li><li >Médicos <span ><?php echo e($clinica->no_medicos); ?></span></li><li >Tipo <span ><?php echo e($clinica->tipo_organizacion); ?></span></li></ul></div>
									</div>
								</div>
							</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\pixelar_doc\laravel-files\template\resources\views/doctors/clinicas.blade.php ENDPATH**/ ?>