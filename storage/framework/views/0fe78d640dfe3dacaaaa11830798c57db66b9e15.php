
<?php $__env->startSection('content'); ?>
	<!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Doctor Inicio</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Doctor Inicio. Bienvenido </h2>
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
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="mb-4">Bienvenido a  <strong class="text-info" >Docbook</strong></h3>
                        </div>
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