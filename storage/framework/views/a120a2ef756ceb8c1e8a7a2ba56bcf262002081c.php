
<?php $__env->startSection('content'); ?>
<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-7 col-auto">
					<h3 class="page-title">Editando Doctor -<?php echo e($doctor->nombre); ?> <?php echo e($doctor->apellido_p); ?>-</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="lista-doctors">Inicio</a></li>
						<li class="breadcrumb-item active">Editar Doctor</li>
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
                        <form method="post" enctype="multipart/form-data" action="<?php echo e(route('update-doctor')); ?>">
                            <?php echo e(csrf_field()); ?>

                            <div class="row form-row">
                                <input type="hidden" name="doctor_id" value="<?php echo e($doctor->id); ?>">
                                <div class="col-12 col-sm-4">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" name="nombre" value="<?php echo e($doctor->nombre); ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group">
                                        <label>Apellido Paterno</label>
                                        <input type="text" name="apellido_p" value="<?php echo e($doctor->apellido_p); ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group">
                                        <label>Apellido Materno</label>
                                        <input type="text" name="apellido_m" value="<?php echo e($doctor->apellido_m); ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group">
                                        <label>Teléfono</label>
                                        <input type="text" name="telefono" value="<?php echo e($doctor->telefono); ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group">
                                        <label>Estado</label>
                                        <input type="text" name="estado" value="<?php echo e($doctor->estado); ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group">
                                        <label>Pais</label>
                                        <input type="text" name="pais" value="<?php echo e($doctor->pais); ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Costo Primera Consulta</label>
                                        <input type="number" name="primera" value="<?php echo e($doctor->primera); ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Costo Seguimiento</label>
                                        <input type="number" name="seguimiento" value="<?php echo e($doctor->seguimiento); ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Cédula Profesional</label>
                                        <input type="number" name="cedula" value="<?php echo e($doctor->cedula); ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Institución que la aprueba</label>
                                        <input type="text" name="institucion_cedula" value="<?php echo e($doctor->institucion_cedula); ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-5">
                                    <div class="form-group">
                                        <label>Logotipo: </label>
                                        <?php if($doctor->institucion_tipo_logo == "Imagotipo"): ?>
                                        <img height="20px" width="80px" src="<?php echo e($doctor->institucion_logo); ?>" />
                                        <?php else: ?>
                                        <img height="30px" width="30px" src="<?php echo e($doctor->institucion_logo); ?>" />
                                        <?php endif; ?>
                                        <small>Si deaseas actualizarlo selecciona otro.</small>
                                        <input type="file" name="institucion_logo"  class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-2">
                                    <div class="form-group">
                                        <label for="">Tipo de Logo</label>
                                        <label for="">Imagotipo
                                            <input type="radio" name="institucion_tipo_logo" <?php echo e(($doctor->institucion_tipo_logo == "Imagotipo") ? "checked" : ""); ?>  value="Imagotipo"  >
                                        </label>
                                        <label for="">
                                            Isotipo
                                            <input type="radio" name="institucion_tipo_logo" <?php echo e(($doctor->institucion_tipo_logo == "Isotipo") ? "checked" : ""); ?>  value="Isotipo" >
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group">
                                        <label>Firma</label>
                                      
                                        <img height="30px" width="30px" src="<?php echo e($doctor->firma); ?>" />
                                        
                                        <small>Si deaseas actualizarlo selecciona otro.</small>
                                        <input type="file" name="firma" accept="image/jpg,image/jpeg"  class="form-control">
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
<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\pixelar_doc\laravel-files\template\resources\views/admin/doctors/edit.blade.php ENDPATH**/ ?>