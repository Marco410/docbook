<!-- Sidebar -->
<div class="sidebar" id="sidebar">
	<div class="sidebar-inner slimscroll">
		<div id="sidebar-menu" class="sidebar-menu">
			<ul>
				<li class="menu-title"> 
					<span>Principal</span>
				</li>
				<li class="<?php echo e(Request::is('admin/index-admin') ? 'active' : ''); ?>"> 
					<a href="<?php echo e(url('admin/index-admin')); ?>"><i class="fa fa-home"></i> <span>Inicio</span></a>
				</li>
				<!--
				<li class="<?php echo e(Request::is('admin/appointment-list') ? 'active' : ''); ?>"> 
					<a href="appointment-list"><i class="fe fe-layout"></i> <span>Citas</span></a>
				</li>-->

				<li  class="<?php echo e(Request::is('admin/usuarios') ? 'active' : ''); ?>"> 
					<a href="<?php echo e(url('admin/usuarios')); ?>"><i class="fa fa-users"></i> <span>Usuarios</span></a>
				</li>
				
				<li  class="<?php echo e(Request::is('admin/especialidades') ? 'active' : ''); ?>"> 
					<a href="<?php echo e(url('admin/especialidades')); ?>"><i class="fa fa-medkit"></i> <span>Especialidades</span></a>
				</li>
				
				<li  class="<?php echo e(Request::is('admin/lista-doctor') ? 'active' : ''); ?>"> 
					<a href="<?php echo e(url('admin/lista-doctor')); ?>"><i class="fa fa-user-md"></i> <span>Doctores</span></a>
				</li>
				<li  class="<?php echo e(Request::is('admin/lista-pacientes') ? 'active' : ''); ?>"> 
					<a href="lista-pacientes"><i class="fa fa-users"></i> <span>Pacientes</span></a>
				</li>
				<li  class="<?php echo e(Request::is('admin/roles') ? 'active' : ''); ?>"> 
					<a href="<?php echo e(url('/admin/roles')); ?>"><i class="fa fa-users"></i> <span>Roles</span></a>
				</li>
				<li  class="<?php echo e(Request::is('admin/lista-clinicas') ? 'active' : ''); ?>"> 
					<a href="<?php echo e(route('lista-clinicas')); ?>"><i class="fa fa-hospital-o"></i> <span>Clinicas</span></a>
				</li>
				<!---
				<li  class="<?php echo e(Request::is('admin/reviews') ? 'active' : ''); ?>"> 
					<a href="reviews"><i class="fe fe-star-o"></i> <span>Comentarios</span></a>
				</li>-->
				<li class="submenu">
					<a href="#"><i class="fa fa-database"></i> <span> Datos </span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a class="<?php echo e(Request::is('admin/diagnosticos') ? 'active' : ''); ?>" href="<?php echo e(route('diagnosticos')); ?>"> Diagnósticos </a></li>
					</ul>
				</li>
				<!--
				<li   class="<?php echo e(Request::is('admin/settings') ? 'active' : ''); ?>"> 
					<a href="settings"><i class="fe fe-vector"></i> <span>Configuraciones</span></a>
				</li>
				<li class="submenu">
					<a href="#"><i class="fe fe-document"></i> <span> Reportes</span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a class="<?php echo e(Request::is('admin/invoice-report') ? 'active' : ''); ?>" href="<?php echo e(url('admin/invoice-report')); ?>">Informe de Facturas</a></li>
					</ul>
				</li>
				<li class="menu-title"> 
					<span>Páginas</span>
				</li>
				
				<li class="<?php echo e(Request::is('admin/product-list') ? 'active' : ''); ?>"><a href="product-list"><i class="fe fe-layout"></i> <span>Product List</span></a></li>
				<li class="<?php echo e(Request::is('admin/pharmacy-list') ? 'active' : ''); ?>"><a href="pharmacy-list"><i class="fe fe-vector"></i> <span>Pharmacy List</span></a></li>-->
				<li  class="<?php echo e(Request::is('admin/profile') ? 'active' : ''); ?>"> 
					<a href="profile"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
				</li>

				<!--
				<li class="submenu">
					<a href="#"><i class="fe fe-document"></i> <span> Authentication </span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a  class="<?php echo e(Request::is('admin/login') ? 'active' : ''); ?>" href="<?php echo e(url('admin/login')); ?>"> Login </a></li>
						<li><a  class="<?php echo e(Request::is('admin/register') ? 'active' : ''); ?>" href="<?php echo e(url('admin/register')); ?>"> Register </a></li>
						<li><a  class="<?php echo e(Request::is('admin/forgot-password') ? 'active' : ''); ?>" href="<?php echo e(url('admin/forgot-password')); ?>"> Forgot Password </a></li>
						<li><a  class="<?php echo e(Request::is('admin/lock-screen') ? 'active' : ''); ?>" href="<?php echo e(url('admin/lock-screen')); ?>"> Lock Screen </a></li>
					</ul>
				</li>
				<li class="submenu">
					<a href="#"><i class="fe fe-warning"></i> <span> Error Pages </span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a class="<?php echo e(Request::is('admin/error-404') ? 'active' : ''); ?>" href="<?php echo e(url('admin/error-404')); ?>">404 Error </a></li>
						<li><a class="<?php echo e(Request::is('admin/error-500') ? 'active' : ''); ?>" href="<?php echo e(url('admin/error-500')); ?>">500 Error </a></li>
					</ul>
				</li>
				<li  class="<?php echo e(Request::is('admin/blank-page','admin/calendar') ? 'active' : ''); ?>"> 
					<a href="blank-page"><i class="fe fe-file"></i> <span>Blank Page</span></a>
				</li>
				<li class="menu-title"> 
					<span>UI Interface</span>
				</li>
				<li class="<?php echo e(Request::is('admin/components') ? 'active' : ''); ?>"> 
					<a href="components"><i class="fe fe-vector"></i> <span>Components</span></a>
				</li>
				<li class="submenu">
					<a href="#"><i class="fe fe-layout"></i> <span> Forms </span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a class="<?php echo e(Request::is('admin/form-basic-inputs') ? 'active' : ''); ?>" href="<?php echo e(url('admin/form-basic-inputs')); ?>">Basic Inputs </a></li>
						<li><a class="<?php echo e(Request::is('admin/form-input-groups') ? 'active' : ''); ?>" href="<?php echo e(url('admin/form-input-groups')); ?>">Input Groups </a></li>
						<li><a class="<?php echo e(Request::is('admin/form-horizontal') ? 'active' : ''); ?>" href="<?php echo e(url('admin/form-horizontal')); ?>">Horizontal Form</a></li>
						<li><a class="<?php echo e(Request::is('admin/form-vertical') ? 'active' : ''); ?>" href="<?php echo e(url('admin/form-vertical')); ?>"> Vertical Form </a></li>
						<li><a class="<?php echo e(Request::is('admin/form-mask') ? 'active' : ''); ?>" href="<?php echo e(url('admin/form-mask')); ?>"> Form Mask </a></li>
						<li><a class="<?php echo e(Request::is('admin/form-validation') ? 'active' : ''); ?>" href="<?php echo e(url('admin/form-validation')); ?>"> Form Validation </a></li>
					</ul>
				</li>
				<li class="submenu">
					<a href="#"><i class="fe fe-table"></i> <span> Tables </span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a class="<?php echo e(Request::is('admin/tables-basic') ? 'active' : ''); ?>" href="<?php echo e(url('admin/tables-basic')); ?>">Basic Tables </a></li>
						<li><a class="<?php echo e(Request::is('admin/data-tables') ? 'active' : ''); ?>" href="<?php echo e(url('admin/data-tables')); ?>">Data Table </a></li>
					</ul>
				</li>
				<li class="submenu">
					<a href="javascript:void(0);"><i class="fe fe-code"></i> <span>Multi Level</span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li class="submenu">
							<a href="javascript:void(0);"> <span>Level 1</span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="javascript:void(0);"><span>Level 2</span></a></li>
								<li class="submenu">
									<a href="javascript:void(0);"> <span> Level 2</span> <span class="menu-arrow"></span></a>
									<ul style="display: none;">
										<li><a href="javascript:void(0);">Level 3</a></li>
										<li><a href="javascript:void(0);">Level 3</a></li>
									</ul>
								</li>
								<li><a href="javascript:void(0);"> <span>Level 2</span></a></li>
							</ul>
						</li>
						<li>
							<a href="javascript:void(0);"> <span>Level 1</span></a>
						</li>-->
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>
<!-- /Sidebar --><?php /**PATH D:\xampp\htdocs\pixelar_doc\laravel-files\template\resources\views/layout/partials/nav_admin.blade.php ENDPATH**/ ?>