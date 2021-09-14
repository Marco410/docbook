<?php error_reporting(0);?>
<!-- Loader -->
@if(Route::is(['map-grid','map-list']))
<div id="loader">
	<div class="loader">
		<span></span>
		<span></span>
	</div>
</div>
@endif
	<!-- /Loader  -->
	<!-- /segun aqui el body  -->
<div class="main-wrapper">
<!-- Header -->
<header class="header">
	<nav class="navbar navbar-expand-lg header-nav">
		<div class="navbar-header">
			<a id="mobile_btn" href="javascript:void(0);">
				<span class="bar-icon">
					<span></span>
					<span></span>
					<span></span>
				</span>
			</a>
			<a href="index" class="navbar-brand logo">
				<img src="/assets/img/logo.png" class="img-fluid" alt="Logo">
			</a>
		</div>
		<div class="main-menu-wrapper">
			<div class="menu-header">
				<a href="index" class="menu-logo">
					<img src="/assets/img/logo.png" class="img-fluid" alt="Logo">
				</a>
				<a id="menu_close" class="menu-close" href="javascript:void(0);">
					<i class="fas fa-times"></i>
				</a>
			</div>
			<ul class="main-nav">
				{{-- 
				<li class="has-submenu <?php if($page=="blog-list" || $page=="blog-grid" || $page=="blog-details") { echo 'active'; } ?>">
				<a href="">Blog <i class="fas fa-chevron-down"></i></a>
				<ul class="submenu">
					<li class="<?php if($page=="blog-list") { echo 'active'; } ?>"><a href="blog-list">Blog List</a></li>
					<li class="<?php if($page=="blog-grid") { echo 'active'; } ?>"><a href="blog-grid">Blog Grid</a></li>
					<li class="<?php if($page=="blog-details") { echo 'active'; } ?>"><a href="blog-details">Blog Details</a></li>
				</ul>
				</li>
				--}}
			</ul>		 
		</div>		 
		<ul class="nav header-navbar-rht">
			<li class="nav-item contact-item">
				<div class="header-contact-img">
					<i class="far fa-hospital"></i>							
				</div>
				<div class="header-contact-detail">
					<p class="contact-header">Contacto</p>
					<p class="contact-info-header"> 4434012693</p>
				</div>
				@if(Route::is(['index-slide','page','cart','blank-page','term-condition','privacy-policy','blog-details','blog-grid','blog-list','forgot-password','register','login','invoice-view','doctor-register','components','calendar','map-grid','map-list','search','doctor-profile','booking','checkout','booking-success','payment-success','pharmacy-details','pharmacy-index','pharmacy-search','product-all','product-checkout','product-description','product-healthcare','pharmacy-register','index-5']))
				<li class="nav-item">
					<a class="nav-link header-login white-bg" href="{{ url('/iniciar-sesion') }}"><i class="fas fa-user-circle mr-2"></i>Iniciar</a>
				</li>
				<li class="nav-item">
					<a class="nav-link header-login" href="{{ url('/registro-paciente') }}"><i class="fas fa-lock mr-2"></i>Registro</a>
				</li>
				@endif
			</li>
			@auth
			@if(!Route::is(['index-slide','chat','page','cart','blank-page','term-condition','privacy-policy','blog-details','blog-grid','blog-list','forgot-password','register','login','calendar','invoice-view','components','change-password','video-call','doctor-register','voice-call','favourites','map-grid','profile-settings','map-list','search','patient-dashboard','doctor-profile','booking','checkout','booking-success','payment-success','pharmacy-details','pharmacy-index','pharmacy-search','product-all','product-checkout','product-description','product-healthcare','dependent','medical-details','medical-records','membership-details','orders-list','patient-accounts','pharmacy-register','index-5']))
			<!-- User Menu -->
			<li class="nav-item dropdown has-arrow logged-item">
				<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
					<span class="user-img">
						<img class="rounded-circle" src="/assets/img/doctors/doctor-thumb-02.jpg" width="31" alt="Darren Elder">
					</span>
				</a>
				<div class="dropdown-menu dropdown-menu-right">
					<div class="user-header">
						<div class="avatar avatar-sm">
							<img src="/assets/img/doctors/doctor-thumb-02.jpg" alt="User Image" class="avatar-img rounded-circle">
						</div>
						<div class="user-text">
							<h6>{{ Auth::user()->nombre }} {{ Auth::user()->apellido_p }}</h6>
							<p class="text-muted mb-0">{{ Auth::user()->getRoleNames()[0] }}</p>
						</div>
					</div>
					<a class="dropdown-item" href=" @if (Auth::user()->getRoleNames()[0]  === "Paciente") {{  route('paciente-inicio')}} @else {{route('doctor-inicio') }} @endif">Inicio</a>
					<a class="dropdown-item" href="doctor-profile-settings">Perfil</a>
					<a class="dropdown-item" href="{{ route('logout') }}"
								onclick="event.preventDefault();
											document.getElementById('logout-form').submit();">
								{{ __('Cerrar Sesión') }}
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
				</div>
			</li>
			<!-- /User Menu -->
			@endif
			@endauth
			@if(Route::is(['cart']))
			<li class="nav-item view-cart-header mr-3">
			<a href="#" class="" id="cart"><i class="fas fa-shopping-cart"></i> <small class="unread-msg1">7</small></a>		<!-- Shopping Cart -->
				<div class="shopping-cart">
					<ul class="shopping-cart-items list-unstyled">
						<li class="clearfix">
							<div class="close-icon"><i class="far fa-times-circle"></i></div>
							<img class="avatar-img rounded" src="/assets/img/products/product.jpg" alt="User Image">
							<span class="item-name">Benzaxapine Croplex</span>
							<span class="item-price">$849.99</span>
							<span class="item-quantity">Quantity: 01</span>
						</li>

						<li class="clearfix">
							<div class="close-icon"><i class="far fa-times-circle"></i></div>
							<img class="avatar-img rounded" src="/assets/img/products/product1.jpg" alt="User Image">
							<span class="item-name">Ombinazol Bonibamol</span>
							<span class="item-price">$1,249.99</span>
							<span class="item-quantity">Quantity: 01</span>
						</li>

						<li class="clearfix">
							<div class="close-icon"><i class="far fa-times-circle"></i></div>
							<img class="avatar-img rounded" src="/assets/img/products/product2.jpg" alt="User Image">
							<span class="item-name">Dantotate Dantodazole</span>
							<span class="item-price">$129.99</span>
							<span class="item-quantity">Quantity: 01</span>
						</li>
					</ul>
					<div class="booking-summary pt-3">
						<div class="booking-item-wrap">
							<ul class="booking-date">
								<li>Subtotal <span>$5,877.00</span></li>
								<li>Shipping <span>$25.00</span></li>
								<li>Tax <span>$0.00</span></li>
								<li>Total <span>$5.2555</span></li>
							</ul>
							<div class="booking-total">
								<ul class="booking-total-list text-align">
									<li>
										<div class="clinic-booking pt-4">
											<a class="apt-btn" href="cart">View Card</a>
										</div>
									</li>
									<li>
										<div class="clinic-booking pt-4">
											<a class="apt-btn" href="product-checkout">Checkout</a>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- /Shopping Cart -->	
			</li>
			@endif
		</ul>
	</nav>
</header>
<!-- /Header -->