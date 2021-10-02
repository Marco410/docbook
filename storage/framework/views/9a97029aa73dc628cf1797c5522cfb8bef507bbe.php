<!-- Profile Sidebar -->
    <div class="profile-sidebar">
        <div class="widget-profile pro-widget-content">
            <div class="profile-info-widget">
                <a href="#" class="booking-doc-img">
                    <img src="/assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
                </a>
                <div class="profile-det-info">
                    <h3>Dr. <?php echo e(Auth::user()->nombre); ?> <?php echo e(Auth::user()->apellido_p); ?> <?php echo e(Auth::user()->apellido_m); ?> <?php echo e($msj ?? ''); ?> </h3>

                    <div class="patient-details">
                        <h5 class="mb-0"><?php echo e(Auth::user()->getRoleNames()[0]); ?></h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard-widget">
            <nav class="dashboard-menu">
                <ul>
                    <li  class="<?php if($page == "doctor-inicio"): ?> active <?php endif; ?>" >
                        <a href="/doctor-inicio?<?php echo e(session()->get('id')); ?>">
                            <i class="fas fa-columns"></i>
                            <span>Inicio</span>
                        </a>
                    </li>
                    
                    <li  class="<?php if($page == "mis-pacientes"): ?> active <?php endif; ?>" >
                        <a href="<?php echo e(route('mis-pacientes')); ?>">
                            <i class="fas fa-user-injured"></i>
                            <span>Mis Pacientes</span>
                        </a>
                    </li>
                    <li  class="<?php if($page == "pagos"): ?> active <?php endif; ?>" >
                        <a href="<?php echo e(route('pagos')); ?>">
                            <i class="fas fa-money-check"></i>
                            <span>Movimientos (Pagos)</span>
                        </a>
                    </li>
                    <li  class="<?php if($page == "caja"): ?> active <?php endif; ?>" >
                        <a href="<?php echo e(route('caja')); ?>">
                            <i class="fas fa-cash-register"></i>
                            <span>Caja</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Cerrar Sesión</span>
                        </a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- /Profile Sidebar --><?php /**PATH D:\xampp\htdocs\pixelar_doc\laravel-files\template\resources\views/doctors/doctor-profile-sidebar.blade.php ENDPATH**/ ?>