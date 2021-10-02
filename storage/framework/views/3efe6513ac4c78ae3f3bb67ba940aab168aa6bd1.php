
<?php $__env->startSection('content'); ?>
<div class="breadcrumb-bar">
	<div class="container-fluid">
		<div class="row align-items-center">
			<div class="col-md-12 col-12">
				<nav aria-label="breadcrumb" class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="·">Inicio</a></li>
						<li class="breadcrumb-item active" aria-current="page">Historial</li>
					</ol>
				</nav>
				<h2 class="breadcrumb-title">Receta</h2>
			</div>
		</div>
	</div>
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
	<div class="container-fluid">

		<div class="row">
			<div class="col-sm-12 text-center">
				<iframe id="fred" style="border:1px solid #666CCC" title="Receta" src="<?php echo e(asset($consulta->receta)); ?>" frameborder="1" scrolling="auto" height="700" width="850" ></iframe>

			</div>
		</div>

	</div>

</div>		
<!-- /Page Content -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\pixelar_doc\laravel-files\template\resources\views/doctors/receta.blade.php ENDPATH**/ ?>