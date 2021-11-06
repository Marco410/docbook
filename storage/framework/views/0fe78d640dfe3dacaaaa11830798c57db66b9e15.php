
<?php $__env->startSection('content'); ?>
	<!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-10 col-10">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Doctor Inicio</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Doctor Inicio. Bienvenido </h2>
                </div>
                <div class="col-md-2 col-2">
                    <p class="text-white" >
                        Clinica: <?php if((isset(auth()->user("doctors")->clinicas->where('activa',1)->first()->nombre_organizacion))): ?>
                        <strong><?php echo e(auth()->user("doctors")->clinicas->where('activa',1)->first()->nombre_organizacion); ?></strong>
                            <i style="display: none" > <?php echo e($sActiva = 0); ?></i>
                            <?php else: ?>
                            <i style="display: none" > <?php echo e($sActiva = 1); ?></i>
                         <strong class="text-danger"> No seleccionada</strong>
                        <?php endif; ?><br>
                        Fecha: <strong><?php echo e(date("d-M-Y")); ?></strong>
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
                <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
                  <?php echo $__env->make('doctors.doctor-profile-sidebar', ['page' => 'doctor-inicio'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                
                <div class="col-md-7 col-lg-8 col-xl-9">
                    <?php if($sActiva == 1): ?>
                    <div class="alert alert-danger fade show" role="alert">
                        <strong>Cuidado</strong> Debes de seleccionar la sucursal en la que te encuentres.
                      </div>
                    <?php endif; ?>
                    <?php if(Session::has('storeN')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Correcto</strong> Se cambio la clinica activa
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                        
                    <?php endif; ?>

                    <?php if($countCaja === 0): ?>
                    <div class="alert alert-warning fade show" role="alert">
                        <strong>Recuerda</strong> ¡Tienes que abrir tu caja para empezar a trabajar! <a href="<?php echo e(route("caja")); ?>">Clic aquí para abrirla</a>
                      </div>
                    <?php else: ?>
                        <?php 
                        //verifica si la caja se paso de 24hrs
                        $date1 = new DateTime("now"); 
                        $date2 = new DateTime($cajaOpen[0]->created_at);
                        $diff = $date1->diff($date2);
                        $fechaInt = strtotime($cajaOpen[0]->created_at);
                        //se añadio en el archivo check_caja_vs.js desde head_blade
                        if($diff->days > 0 ){
                        ?>
                        <input type="hidden" value="<?php echo e($cajaOpen[0]->id); ?>" id="check_caja_id" >
                        <input type="hidden" value="<?php echo e(date("Y-m-d", $fechaInt)); ?>" id="check_caja_fecha" >
                        <input type="hidden" value="<?php echo e(auth()->user("doctors")->clinicas->where('activa',1)->first()->id); ?>" id="check_caja_clinic" >
                        <input type="hidden" value="<?php echo e(auth()->user("doctors")->id); ?>" id="check_caja_doctor" >
                        <input type="hidden" value="<?php echo e($cajaOpen[0]->apertura); ?>" id="check_caja_apertura" >
                        <script>verificar_caja();</script>
                        <?php
                        } ?>
                    <?php endif; ?>

                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="mb-4">Bienvenido a  <strong class="text-info" >Docbook</strong></h3>
                        </div>
                    </div>
                    <div class="row">
                        <form method="post" action="<?php echo e(route('cambiar-clinica')); ?>" novalidate >
                            <?php echo e(csrf_field()); ?>

                        <div class="col-sm-9">
                            <div class="form-group">
								<label for="" class="text-secondary"> <i class="fas fa-clinic-medical" ></i> Selecciona la clinica en la que te encuentres: </label>
								<select class="form-control select" name="change_clinica" id="change_clinica">
                                    <?php $__currentLoopData = $clinicas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clinica): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($clinica->id); ?>"><?php echo e($clinica->nombre_consultorio); ?> <small class="text-secondary" > (<?php echo e($clinica->nombre_organizacion); ?>)</small> <?php echo e(($clinica->activa == "1") ? "-Activa-" : ""); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
								</div>
                                <button class="btn btn-sm btn-block btn-primary" > <i class="fas fa-exchange-alt" ></i> Cambiar Sucursal</button>
                        </div>
                    </form>
                    </div>
                </div>

                 

                </div>
            </div>

        </div>

    </div>		
    <!-- /Page Content -->
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\pixelar_doc\laravel-files\template\resources\views/doctors/doctor-dashboard.blade.php ENDPATH**/ ?>