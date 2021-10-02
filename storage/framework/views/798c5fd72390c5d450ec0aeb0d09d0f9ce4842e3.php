<?php error_reporting(0);?>
<div class="main-wrapper multi-optn">
<!-- Header -->
<header class="header header-trans custom" style="background:var(--sec);">
	<nav class="navbar navbar-expand-lg header-nav no-border">
		<div class="navbar-header">
			<a id="mobile_btn" href="javascript:void(0);">
				<span class="bar-icon">
					<span></span>
					<span></span>
					<span></span>
				</span>
			</a>
			<a href="index" class="navbar-brand logo">
				<img src="assets/img/footer-logo.png" class="img-fluid" alt="Logo">
			</a>
		</div>
		<div class="main-menu-wrapper">
			<div class="menu-header">
				<a href="index" class="menu-logo">
					<img src="assets/img/logo.png" class="img-fluid" alt="Logo">
				</a>
				<a id="menu_close" class="menu-close" href="javascript:void(0);">
					<i class="fas fa-times"></i>
				</a>
			</div>
			<ul class="main-nav white-font">
			<li class="has-submenu <?php if($page=="index" || $page=="index-1" || $page=="index-2" || $page=="index-3" || $page=="index-5"|| $page=="index-4" || $page=="index-6" || $page=="index-7" || $page=="index-8") { echo 'active'; } ?>">
					<a href="">INICIO </a>
					<ul class="submenu">
					<li class="<?php if($page=="index") { echo 'active'; } ?>">
					<!--<a href="index">Home</a>
					</li>
					<li class="<?php if($page=="index-1") { echo 'active'; } ?>"><a href="index-1">Home 1</a></li>
					<li class="<?php if($page=="index-2") { echo 'active'; } ?>"><a href="index-2">Home 2</a></li>
					<li class="<?php if($page=="index-3") { echo 'active'; } ?>"><a href="index-3">Home 3</a></li>
					<li class="<?php if($page=="index-4") { echo 'active'; } ?>"><a href="index-4">Home 4</a></li>
					<li class="<?php if($page=="index-5") { echo 'active'; } ?>"><a href="index-5">Home 5</a></li>-->
					<li class="<?php if($page=="index-6") { echo 'active'; } ?>"><a href="index-6">Home 6</a></li>
					<!--<li class="<?php if($page=="index-7") { echo 'active'; } ?>"><a href="index-7">Home 7</a></li>
					<li class="<?php if($page=="index-8") { echo 'active'; } ?>"><a href="index-8">Home 8</a></li>-->
					</ul>
				</li>
				
				<li class="has-submenu">
					<a href="">QUIENES SOMOS</a>
				</li>
				<li class="has-submenu">
					<a href="">REGISTRAME</a>
				</li>
				
				<li class="login-link">
					<a href="login">Login / Signup</a>
				</li>
			</ul>
		</div>
		<ul class="nav header-navbar-rht right-menu">
			<li class="nav-item contact-item">
				<div class="header-contact-img">
					<i class="fas fa-phone-alt"></i>					
				</div>
				<div class="header-contact-detail">
					<p class="contact-info-header">993 345 2719</p>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link header-login white-bg" href="<?php echo e(url('/iniciar-sesion')); ?>"><i class="fas fa-user-circle mr-2"></i>Iniciar</a>
			</li>
			<li class="nav-item">
				<a class="nav-link header-login" href="<?php echo e(url('/registro-paciente')); ?>"><i class="fas fa-lock mr-2"></i>Registro</a>
			</li>
		</ul>
	</nav>
</header>
<!-- /Header --><?php /**PATH D:\xampp\htdocs\pixelar_doc\laravel-files\template\resources\views/layout/partials/header_index7.blade.php ENDPATH**/ ?>