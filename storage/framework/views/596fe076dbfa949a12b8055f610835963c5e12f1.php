
<?php $__env->startSection('content'); ?>
<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-7 col-auto">
					<h3 class="page-title">Editando Clinica -<?php echo e($clinica->nombre_consultorio); ?>-</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="lista-clinicas">Inicio</a></li>
						<li class="breadcrumb-item active">Editar Clinica</li>
					</ul>
				</div>
				<div class="col-sm-5 col">
					
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
                        <form method="post" enctype="multipart/form-data" action="<?php echo e(route('update-clinic')); ?>">
                            <?php echo e(csrf_field()); ?>

                            <div class="row form-row">
                                <input type="hidden" name="clinica_id" value="<?php echo e($clinica->id); ?>">
                                <input type="hidden" name="antigua_imagen" value="<?php echo e($clinica->logotipo); ?>">
                                <div class="col-12 col-sm-5">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" name="nombre_consultorio" value="<?php echo e($clinica->nombre_consultorio); ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-5">
                                    <div class="form-group">
                                        <label>Logotipo: </label>
                                        <?php if($clinica->tipo_logo == "Imagotipo"): ?>
                                        <img height="20px" width="80px" src="data:image/png;base64,<?php echo e($clinica->logotipo_base64); ?>" />
                                        <?php else: ?>
                                        <img height="30px" width="30px" src="data:image/png;base64,<?php echo e($clinica->logotipo_base64); ?>" />
                                        <?php endif; ?>
                                        <small>Si deaseas actualizarlo selecciona otro.</small>
                                        <input type="file" name="logotipo"  class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-2">
                                    <div class="form-group">
                                        <label for="">Tipo de Logo</label>
                                        <label for="">Imagotipo
                                            <input type="radio" name="tipo_logo" <?php echo e(($clinica->tipo_logo == "Imagotipo") ? "checked" : ""); ?>  value="Imagotipo"  >
                                        </label>
                                        <label for="">
                                            Isotipo
                                            <input type="radio" name="tipo_logo" <?php echo e(($clinica->tipo_logo == "Isotipo") ? "checked" : ""); ?>  value="Isotipo" >
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Teléfono</label>
                                        <input type="text" name="tel_consultorio" value="<?php echo e($clinica->tel_consultorio); ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>No. Médicos</label>
                                        <input type="number" name="no_medicos" value="<?php echo e($clinica->no_medicos); ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group">
                                        <label>Calle</label>
                                        <input type="text" name="calle_consultorio" value="<?php echo e($clinica->calle_consultorio); ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group">
                                        <label>Colonia</label>
                                        <input type="text" name="colonia_consultorio" value="<?php echo e($clinica->colonia_consultorio); ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group">
                                        <label>Ciudad</label>
                                        <input type="text" name="ciudad_consultorio" value="<?php echo e($clinica->ciudad_consultorio); ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Estado</label>
                                        <input type="text" name="estado_consultorio" value="<?php echo e($clinica->estado_consultorio); ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Pais</label>
                                        <input type="text" name="pais_consultorio" value="<?php echo e($clinica->pais_consultorio); ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Guardar Cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\pixelar_doc\laravel-files\template\resources\views/admin/clinics/edit.blade.php ENDPATH**/ ?>