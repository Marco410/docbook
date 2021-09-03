<?php $page="index-1";?>
@extends('layout.mainlayout_index')
@section('content')		
<!-- Home Banner -->
<section class="section section-search-1">
			<div class="container">
				<!-- Header -->
				<header class="header">
					<nav class="navbar navbar-expand-lg header-nav nav-transparent">
						<div class="navbar-header">
							<a id="mobile_btn" href="javascript:void(0);">	<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
								</span>
							</a>
							<a href="index" class="navbar-brand logo">
								<img src="assets/img/logo.png" class="img-fluid" alt="Logo">
							</a>
						</div>
						<div class="main-menu-wrapper">
							<div class="menu-header">
								<a href="index" class="menu-logo">
									<img src="assets/img/logo.png" class="img-fluid" alt="Logo">
								</a>
								<a id="menu_close" class="menu-close" href="javascript:void(0);">	<i class="fas fa-times"></i>
								</a>
							</div>
							<ul class="main-nav white-font">
								<li class="has-submenu <?php if($page=="index" || $page=="index-1" || $page=="index-2" || $page=="index-3" || $page=="index-5"|| $page=="index-4" || $page=="index-6" || $page=="index-7" || $page=="index-8") { echo 'active'; } ?>">
								<a href="">Home <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
								<li class="<?php if($page=="index") { echo 'active'; } ?>">
								<a href="index">Home</a>
							    </li>
								<li class="<?php if($page=="index-1") { echo 'active'; } ?>"><a href="index-1">Home 1</a></li>
								<li class="<?php if($page=="index-2") { echo 'active'; } ?>"><a href="index-2">Home 2</a></li>
								<li class="<?php if($page=="index-3") { echo 'active'; } ?>"><a href="index-3">Home 3</a></li>
								<li class="<?php if($page=="index-4") { echo 'active'; } ?>"><a href="index-4">Home 4</a></li>
								<li class="<?php if($page=="index-5") { echo 'active'; } ?>"><a href="index-5">Home 5</a></li>
								<li class="<?php if($page=="index-6") { echo 'active'; } ?>"><a href="index-6">Home 6</a></li>
								<li class="<?php if($page=="index-7") { echo 'active'; } ?>"><a href="index-7">Home 7</a></li>
								<li class="<?php if($page=="index-8") { echo 'active'; } ?>"><a href="index-8">Home 8</a></li>
								</ul>
							</li>
								<li class="has-submenu <?php if($page=="review" || $page=="register" || $page=="doctor-dashboard" || $page=="appointments" || $page=="schedule-timings" || $page=="my-patients" || $page=="patient-profile" || $page=="chat-doctor" || $page=="invoices" || $page=="doctor-profile-settings" || $page=="doctor-add-blog" || $page=="doctor-blog" || $page=="doctor-pending-blog" || $page=="edit-blog") { echo 'active'; } ?>">
								<a href="">Doctors <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li class="<?php if($page=="doctor-dashboard") { echo 'active'; } ?>"><a href="doctor-dashboard">Doctor Dashboard</a></li>
									<li class="<?php if($page=="appointments") { echo 'active'; } ?>"><a href="appointments">Appointments</a></li>
									<li class="<?php if($page=="schedule-timings") { echo 'active'; } ?>"><a href="schedule-timings">Schedule Timing</a></li>
									<li class="<?php if($page=="my-patients") { echo 'active'; } ?>"><a href="my-patients">Patients List</a></li>
									<li class="<?php if($page=="patient-profile") { echo 'active'; } ?>"><a href="patient-profile">Patients Profile</a></li>
									<li class="<?php if($page=="chat-doctor") { echo 'active'; } ?>"><a href="chat-doctor">Chat</a></li>
									<li class="<?php if($page=="invoices") { echo 'active'; } ?>"><a href="invoices">Invoices</a></li>
									<li class="<?php if($page=="doctor-profile-settings") { echo 'active'; } ?>"><a href="doctor-profile-settings">Profile Settings</a></li>
									<li class="<?php if($page=="review") { echo 'active'; } ?>"><a href="reviews">Reviews</a></li>
									<li class="<?php if($page=="register") { echo 'active'; } ?>"><a href="doctor-register">Doctor Register</a></li>
									<li class="has-submenu <?php if($page=="doctor-add-blog" || $page=="doctor-blog" || $page=="doctor-pending-blog" || $page=="edit-blog") { echo 'active'; } ?>">
										<a href="doctor-blog">Blog</a>
										<ul class="submenu">
											<li class="<?php if($page=="doctor-blog" || $page=="doctor-pending-blog" || $page=="edit-blog") { echo 'active'; } ?>"><a href="doctor-blog">Blog</a></li>
											<li><a href="blog-details">Blog view</a></li>
											<li class="<?php if($page=="doctor-add-blog") { echo 'active'; } ?>"><a href="doctor-add-blog">Add Blog</a></li>
										</ul>
									</li>
								</ul>
							</li>
								<li class="has-submenu <?php if($page=="map-grid" || $page=="map-list" || $page=="search1" || $page=="doctor-profile" || $page=="booking" || $page=="checkout" || $page=="booking-success" || $page=="patient-dashboard" || $page=="favourites" || $page=="chat" || $page=="profile-settings" || $page=="change-password") { echo 'active'; } ?>">
								<a href="">Patients <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li class="has-submenu <?php if($page=="map-grid" || $page=="map-list") { echo 'active'; } ?>">
										<a href="#">Doctors</a>
										<ul class="submenu">
											<li class="<?php if($page=="map-grid") { echo 'active'; } ?>"><a href="map-grid">Map Grid</a></li>
											<li class="<?php if($page=="map-list") { echo 'active'; } ?>"><a href="map-list">Map List</a></li>
										</ul>
									</li>
									<li class="<?php if($page=="search1") { echo 'active'; } ?>"><a href="search">Search Doctor</a></li>
									<li class="<?php if($page=="doctor-profile") { echo 'active'; } ?>"><a href="doctor-profile">Doctor Profile</a></li>
									<li class="<?php if($page=="booking") { echo 'active'; } ?>"><a href="booking">Booking</a></li>
									<li class="<?php if($page=="checkout") { echo 'active'; } ?>"><a href="checkout">Checkout</a></li>
									<li class="<?php if($page=="booking-success") { echo 'active'; } ?>"><a href="booking-success">Booking Success</a></li>
									<li class="<?php if($page=="patient-dashboard") { echo 'active'; } ?>"><a href="patient-dashboard">Patient Dashboard</a></li>
									<li class="<?php if($page=="favourites") { echo 'active'; } ?>"><a href="favourites">Favourites</a></li>
									<li class="<?php if($page=="chat") { echo 'active'; } ?>"><a href="chat">Chat</a></li>
									<li class="<?php if($page=="profile-settings") { echo 'active'; } ?>"><a href="profile-settings">Profile Settings</a></li>
									<li class="<?php if($page=="change-password") { echo 'active'; } ?>"><a href="change-password">Change Password</a></li>
								</ul>
							</li>
								<li class="has-submenu <?php if($page=="voice-call" || $page=="video-call" || $page=="search" || $page=="calendar" || $page=="components" || $page=="invoices1" || $page=="invoice-view" || $page=="blank-page" || $page=="login" || $page=="register1" || $page=="forgot-pswd") { echo 'active'; } ?>">
								<a href="">Pages <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li class="<?php if($page=="voice-call") { echo 'active'; } ?>"><a href="voice-call">Voice Call</a></li>
									<li class="<?php if($page=="video-call") { echo 'active'; } ?>"><a href="video-call">Video Call</a></li>
									<li class="<?php if($page=="search") { echo 'active'; } ?>"><a href="search">Search Doctors</a></li>
									<li class="<?php if($page=="calendar") { echo 'active'; } ?>"><a href="calendar">Calendar</a></li>
									<li class="<?php if($page=="components") { echo 'active'; } ?>"><a href="components">Components</a></li>
									<li class="has-submenu <?php if($page=="invoices1" || $page=="invoice-view") { echo 'active'; } ?>">
										<a href="invoices">Invoices</a>
										<ul class="submenu">
											<li class="<?php if($page=="invoices1") { echo 'active'; } ?>"><a href="invoices">Invoices</a></li>
											<li class="<?php if($page=="invoice-view") { echo 'active'; } ?>"><a href="invoice-view">Invoice View</a></li>
										</ul>
									</li>
									<li class="<?php if($page=="blank-page") { echo 'active'; } ?>"><a href="blank-page">Starter Page</a></li>
									<li class="<?php if($page=="login") { echo 'active'; } ?>"><a href="login">Login</a></li>
									<li class="<?php if($page=="register1") { echo 'active'; } ?>"><a href="register">Register</a></li>
									<li class="<?php if($page=="forgot-pswd") { echo 'active'; } ?>"><a href="forgot-password">Forgot Password</a></li>
								</ul>
							</li>
								<li class="has-submenu <?php if($page=="blog-list" || $page=="blog-grid" || $page=="blog-details") { echo 'active'; } ?>">
                            <a href="">Blog <i class="fas fa-chevron-down"></i></a>
                            <ul class="submenu">
                                <li class="<?php if($page=="blog-list") { echo 'active'; } ?>"><a href="blog-list">Blog List</a></li>
                                <li class="<?php if($page=="blog-grid") { echo 'active'; } ?>"><a href="blog-grid">Blog Grid</a></li>
                                <li class="<?php if($page=="blog-details") { echo 'active'; } ?>"><a href="blog-details">Blog Details</a></li>
                            </ul>
                        </li>





                        
								<li>	<a href="admin/index" target="_blank">Admin</a>
								</li>
								<li class="login-link">	<a href="login">Login / Signup</a>
								</li>
							</ul>
						</div>
						<ul class="nav header-navbar-rht">
							<li class="nav-item contact-item">
								<div class="header-contact-img">	<i class="far fa-hospital"></i>	
								</div>
								<div class="header-contact-detail text-white">
									<p class="contact-header">Contact</p>
									<p class="contact-info-header white-font">+1 315 369 5943</p>
								</div>
							</li>
							<li class="nav-item">	<a class="nav-link header-login" href="login">login / Signup </a>
							</li>
						</ul>
					</nav>
				</header>
				<!-- /Header -->
				<div class="row">
					<div class="col-md-6">
						<img src="assets/img/dr-slider.png" class="img-fluid dr-img" alt="" >
					</div>
					<div class="col-md-6 search-doctor">
						<div class="search-area">
							<h2 class="text-center">Search Doctor, Make an Appointment</h2>
							<form class="search-input">
								<div class="row">
									<div class="col-12 col-md-12">
										<div class="form-group">
											<label>Location</label>
											<input type="text" class="form-control" value="">
										</div>
									</div>
									<div class="col-12 col-md-12">
										<div class="form-group">
											<label>Gender</label>
											<select class="form-control">
												<option>Male</option>
												<option>Fe Male</option>
											</select>
										</div>
									</div>
									<div class="col-12 col-md-12">
										<div class="form-group">
											<label>Department</label>
											<select class="form-control">
												<option>Surgen</option>
												<option>Cardiologist</option>
												<option>Gynacologist</option>
											</select>
										</div>
									</div>
								</div>
								<div class="submit-section">
									<button type="submit" class="btn btn-primary search-btn submit-btn">Search</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- /Home Banner -->
		<!-- Clinic and Specialities -->
		<section class="section section-specialities">
			<div class="container-fluid">
				<div class="section-header text-center">
					<h2>Clinic and Specialities</h2>
					<p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
				<div class="row justify-content-center">
					<div class="col-md-9">
						<!-- Slider -->
						<div class="specialities-slider slider">
							<!-- Slider Item -->
							<div class="speicality-item text-center">
								<div class="speicality-img">
									<img src="assets/img/specialities/specialities-01.png" class="img-fluid" alt="Speciality">	<span><i class="fa fa-circle" aria-hidden="true"></i></span>
								</div>
								<p>Urology</p>
							</div>
							<!-- /Slider Item -->
							<!-- Slider Item -->
							<div class="speicality-item text-center">
								<div class="speicality-img">
									<img src="assets/img/specialities/specialities-02.png" class="img-fluid" alt="Speciality">	<span><i class="fa fa-circle" aria-hidden="true"></i></span>
								</div>
								<p>Neurology</p>
							</div>
							<!-- /Slider Item -->
							<!-- Slider Item -->
							<div class="speicality-item text-center">
								<div class="speicality-img">
									<img src="assets/img/specialities/specialities-03.png" class="img-fluid" alt="Speciality">	<span><i class="fa fa-circle" aria-hidden="true"></i></span>
								</div>
								<p>Orthopedic</p>
							</div>
							<!-- /Slider Item -->
							<!-- Slider Item -->
							<div class="speicality-item text-center">
								<div class="speicality-img">
									<img src="assets/img/specialities/specialities-04.png" class="img-fluid" alt="Speciality">	<span><i class="fa fa-circle" aria-hidden="true"></i></span>
								</div>
								<p>Cardiologist</p>
							</div>
							<!-- /Slider Item -->
							<!-- Slider Item -->
							<div class="speicality-item text-center">
								<div class="speicality-img">
									<img src="assets/img/specialities/specialities-05.png" class="img-fluid" alt="Speciality">	<span><i class="fa fa-circle" aria-hidden="true"></i></span>
								</div>
								<p>Dentist</p>
							</div>
							<!-- /Slider Item -->
						</div>
						<!-- /Slider -->
					</div>
				</div>
			</div>
		</section>
		<!-- Clinic and Specialities -->
		<!-- Category Section -->
		<section class="section section-category">
			<div class="container">
				<div class="section-header text-center">
					<h2>Browse by Specialities</h2>
					<p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
				<div class="row">
					<div class="col-lg-3">
						<div class="category-box">
							<div class="category-image">
								<img src="assets/img/category/1.png" alt="">
							</div>
							<div class="category-content">
								<h4>Urology</h4>
								<span>21 Doctors</span>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="category-box">
							<div class="category-image">
								<img src="assets/img/category/2.png" alt="">
							</div>
							<div class="category-content">
								<h4>Neurology</h4>
								<span>18 Doctors</span>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="category-box">
							<div class="category-image">
								<img src="assets/img/category/3.png" alt="">
							</div>
							<div class="category-content">
								<h4>Orthopedic</h4>
								<span>17 Doctors</span>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="category-box">
							<div class="category-image">
								<img src="assets/img/category/4.png" alt="">
							</div>
							<div class="category-content">
								<h4>Cardiologist</h4>
								<span>12 Doctors</span>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="category-box">
							<div class="category-image">
								<img src="assets/img/category/5.png" alt="">
							</div>
							<div class="category-content">
								<h4>Dentist</h4>
								<span>07 Doctors</span>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="category-box">
							<div class="category-image">
								<img src="assets/img/category/1.png" alt="">
							</div>
							<div class="category-content">
								<h4>Urology</h4>
								<span>16 Doctors</span>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="category-box">
							<div class="category-image">
								<img src="assets/img/category/4.png" alt="">
							</div>
							<div class="category-content">
								<h4>Cardiologist</h4>
								<span>18 Doctors</span>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="category-box">
							<div class="category-image">
								<img src="assets/img/category/3.png" alt="">
							</div>
							<div class="category-content">
								<h4>Neurology</h4>
								<span>22 Doctors</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Category Section -->
		<!-- Popular Section -->
		<section class="section section-doctor">
			<div class="container-fluid">
				<div class="section-header text-center">
					<h2>Book Our Best Doctor</h2>
					<p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="doctor-slider slider">
							<!-- Doctor Widget -->
							<div class="profile-widget">
								<div class="doc-img">
									<a href="doctor-profile">
										<img class="img-fluid" alt="User Image" src="assets/img/doctors/doctor-01.jpg">
									</a>
									<a href="javascript:void(0)" class="fav-btn">	<i class="far fa-bookmark"></i>
									</a>
								</div>
								<div class="pro-content">
									<h3 class="title">
											<a href="doctor-profile">Ruby Perrin</a> 
											<i class="fas fa-check-circle verified"></i>
										</h3>
									<p class="speciality">MDS - Periodontology and Oral Implantology, BDS</p>
									<div class="rating">	<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<span class="d-inline-block average-rating">(17)</span>
									</div>
									<ul class="available-info">
										<li>	<i class="fas fa-map-marker-alt"></i> Florida, USA</li>
										<li>	<i class="far fa-clock"></i> Available on Fri, 22 Mar</li>
										<li>	<i class="far fa-money-bill-alt"></i> $300 - $1000	<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
										</li>
									</ul>
									<div class="row row-sm">
										<div class="col-6">	<a href="doctor-profile" class="btn view-btn">View Profile</a>
										</div>
										<div class="col-6">	<a href="booking" class="btn book-btn">Book Now</a>
										</div>
									</div>
								</div>
							</div>
							<!-- /Doctor Widget -->
							<!-- Doctor Widget -->
							<div class="profile-widget">
								<div class="doc-img">
									<a href="doctor-profile">
										<img class="img-fluid" alt="User Image" src="assets/img/doctors/doctor-02.jpg">
									</a>
									<a href="javascript:void(0)" class="fav-btn">	<i class="far fa-bookmark"></i>
									</a>
								</div>
								<div class="pro-content">
									<h3 class="title">
											<a href="doctor-profile">Darren Elder</a> 
											<i class="fas fa-check-circle verified"></i>
										</h3>
									<p class="speciality">BDS, MDS - Oral & Maxillofacial Surgery</p>
									<div class="rating">	<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star"></i>
										<span class="d-inline-block average-rating">(35)</span>
									</div>
									<ul class="available-info">
										<li>	<i class="fas fa-map-marker-alt"></i> Newyork, USA</li>
										<li>	<i class="far fa-clock"></i> Available on Fri, 22 Mar</li>
										<li>	<i class="far fa-money-bill-alt"></i> $50 - $300	<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
										</li>
									</ul>
									<div class="row row-sm">
										<div class="col-6">	<a href="doctor-profile" class="btn view-btn">View Profile</a>
										</div>
										<div class="col-6">	<a href="booking" class="btn book-btn">Book Now</a>
										</div>
									</div>
								</div>
							</div>
							<!-- /Doctor Widget -->
							<!-- Doctor Widget -->
							<div class="profile-widget">
								<div class="doc-img">
									<a href="doctor-profile">
										<img class="img-fluid" alt="User Image" src="assets/img/doctors/doctor-03.jpg">
									</a>
									<a href="javascript:void(0)" class="fav-btn">	<i class="far fa-bookmark"></i>
									</a>
								</div>
								<div class="pro-content">
									<h3 class="title">
											<a href="doctor-profile">Deborah Angel</a> 
											<i class="fas fa-check-circle verified"></i>
										</h3>
									<p class="speciality">MBBS, MD - General Medicine, DNB - Cardiology</p>
									<div class="rating">	<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star"></i>
										<span class="d-inline-block average-rating">(27)</span>
									</div>
									<ul class="available-info">
										<li>	<i class="fas fa-map-marker-alt"></i> Georgia, USA</li>
										<li>	<i class="far fa-clock"></i> Available on Fri, 22 Mar</li>
										<li>	<i class="far fa-money-bill-alt"></i> $100 - $400	<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
										</li>
									</ul>
									<div class="row row-sm">
										<div class="col-6">	<a href="doctor-profile" class="btn view-btn">View Profile</a>
										</div>
										<div class="col-6">	<a href="booking" class="btn book-btn">Book Now</a>
										</div>
									</div>
								</div>
							</div>
							<!-- /Doctor Widget -->
							<!-- Doctor Widget -->
							<div class="profile-widget">
								<div class="doc-img">
									<a href="doctor-profile">
										<img class="img-fluid" alt="User Image" src="assets/img/doctors/doctor-04.jpg">
									</a>
									<a href="javascript:void(0)" class="fav-btn">	<i class="far fa-bookmark"></i>
									</a>
								</div>
								<div class="pro-content">
									<h3 class="title">
											<a href="doctor-profile">Sofia Brient</a> 
											<i class="fas fa-check-circle verified"></i>
										</h3>
									<p class="speciality">MBBS, MS - General Surgery, MCh - Urology</p>
									<div class="rating">	<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star"></i>
										<span class="d-inline-block average-rating">(4)</span>
									</div>
									<ul class="available-info">
										<li>	<i class="fas fa-map-marker-alt"></i> Louisiana, USA</li>
										<li>	<i class="far fa-clock"></i> Available on Fri, 22 Mar</li>
										<li>	<i class="far fa-money-bill-alt"></i> $150 - $250	<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
										</li>
									</ul>
									<div class="row row-sm">
										<div class="col-6">	<a href="doctor-profile" class="btn view-btn">View Profile</a>
										</div>
										<div class="col-6">	<a href="booking" class="btn book-btn">Book Now</a>
										</div>
									</div>
								</div>
							</div>
							<!-- /Doctor Widget -->
							<!-- Doctor Widget -->
							<div class="profile-widget">
								<div class="doc-img">
									<a href="doctor-profile">
										<img class="img-fluid" alt="User Image" src="assets/img/doctors/doctor-05.jpg">
									</a>
									<a href="javascript:void(0)" class="fav-btn">	<i class="far fa-bookmark"></i>
									</a>
								</div>
								<div class="pro-content">
									<h3 class="title">
											<a href="doctor-profile">Marvin Campbell</a> 
											<i class="fas fa-check-circle verified"></i>
										</h3>
									<p class="speciality">MBBS, MD - Ophthalmology, DNB - Ophthalmology</p>
									<div class="rating">	<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star"></i>
										<span class="d-inline-block average-rating">(66)</span>
									</div>
									<ul class="available-info">
										<li>	<i class="fas fa-map-marker-alt"></i> Michigan, USA</li>
										<li>	<i class="far fa-clock"></i> Available on Fri, 22 Mar</li>
										<li>	<i class="far fa-money-bill-alt"></i> $50 - $700	<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
										</li>
									</ul>
									<div class="row row-sm">
										<div class="col-6">	<a href="doctor-profile" class="btn view-btn">View Profile</a>
										</div>
										<div class="col-6">	<a href="booking" class="btn book-btn">Book Now</a>
										</div>
									</div>
								</div>
							</div>
							<!-- /Doctor Widget -->
							<!-- Doctor Widget -->
							<div class="profile-widget">
								<div class="doc-img">
									<a href="doctor-profile">
										<img class="img-fluid" alt="User Image" src="assets/img/doctors/doctor-06.jpg">
									</a>
									<a href="javascript:void(0)" class="fav-btn">	<i class="far fa-bookmark"></i>
									</a>
								</div>
								<div class="pro-content">
									<h3 class="title">
											<a href="doctor-profile">Katharine Berthold</a> 
											<i class="fas fa-check-circle verified"></i>
										</h3>
									<p class="speciality">MS - Orthopaedics, MBBS, M.Ch - Orthopaedics</p>
									<div class="rating">	<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star"></i>
										<span class="d-inline-block average-rating">(52)</span>
									</div>
									<ul class="available-info">
										<li>	<i class="fas fa-map-marker-alt"></i> Texas, USA</li>
										<li>	<i class="far fa-clock"></i> Available on Fri, 22 Mar</li>
										<li>	<i class="far fa-money-bill-alt"></i> $100 - $500	<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
										</li>
									</ul>
									<div class="row row-sm">
										<div class="col-6">	<a href="doctor-profile" class="btn view-btn">View Profile</a>
										</div>
										<div class="col-6">	<a href="booking" class="btn book-btn">Book Now</a>
										</div>
									</div>
								</div>
							</div>
							<!-- /Doctor Widget -->
							<!-- Doctor Widget -->
							<div class="profile-widget">
								<div class="doc-img">
									<a href="doctor-profile">
										<img class="img-fluid" alt="User Image" src="assets/img/doctors/doctor-07.jpg">
									</a>
									<a href="javascript:void(0)" class="fav-btn">	<i class="far fa-bookmark"></i>
									</a>
								</div>
								<div class="pro-content">
									<h3 class="title">
											<a href="doctor-profile">Linda Tobin</a> 
											<i class="fas fa-check-circle verified"></i>
										</h3>
									<p class="speciality">MBBS, MD - General Medicine, DM - Neurology</p>
									<div class="rating">	<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star"></i>
										<span class="d-inline-block average-rating">(43)</span>
									</div>
									<ul class="available-info">
										<li>	<i class="fas fa-map-marker-alt"></i> Kansas, USA</li>
										<li>	<i class="far fa-clock"></i> Available on Fri, 22 Mar</li>
										<li>	<i class="far fa-money-bill-alt"></i> $100 - $1000	<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
										</li>
									</ul>
									<div class="row row-sm">
										<div class="col-6">	<a href="doctor-profile" class="btn view-btn">View Profile</a>
										</div>
										<div class="col-6">	<a href="booking" class="btn book-btn">Book Now</a>
										</div>
									</div>
								</div>
							</div>
							<!-- /Doctor Widget -->
							<!-- Doctor Widget -->
							<div class="profile-widget">
								<div class="doc-img">
									<a href="doctor-profile">
										<img class="img-fluid" alt="User Image" src="assets/img/doctors/doctor-08.jpg">
									</a>
									<a href="javascript:void(0)" class="fav-btn">	<i class="far fa-bookmark"></i>
									</a>
								</div>
								<div class="pro-content">
									<h3 class="title">
											<a href="doctor-profile">Paul Richard</a> 
											<i class="fas fa-check-circle verified"></i>
										</h3>
									<p class="speciality">MBBS, MD - Dermatology , Venereology & Lepros</p>
									<div class="rating">	<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star"></i>
										<span class="d-inline-block average-rating">(49)</span>
									</div>
									<ul class="available-info">
										<li>	<i class="fas fa-map-marker-alt"></i> California, USA</li>
										<li>	<i class="far fa-clock"></i> Available on Fri, 22 Mar</li>
										<li>	<i class="far fa-money-bill-alt"></i> $100 - $400	<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
										</li>
									</ul>
									<div class="row row-sm">
										<div class="col-6">	<a href="doctor-profile" class="btn view-btn">View Profile</a>
										</div>
										<div class="col-6">	<a href="booking" class="btn book-btn">Book Now</a>
										</div>
									</div>
								</div>
							</div>
							<!-- Doctor Widget -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- /Popular Section -->
		<!-- Availabe Features -->
		<section class="section section-features">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-5 features-img">
						<img src="assets/img/features/feature.png" class="img-fluid" alt="Feature">
					</div>
					<div class="col-md-7">
						<div class="section-header">
							<h2 class="mt-2">Availabe Features in Our Clinic</h2>
							<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
						</div>
						<div class="features-slider slider">
							<!-- Slider Item -->
							<div class="feature-item text-center">
								<img src="assets/img/features/feature-01.jpg" class="img-fluid" alt="Feature">
								<p>Patient Ward</p>
							</div>
							<!-- /Slider Item -->
							<!-- Slider Item -->
							<div class="feature-item text-center">
								<img src="assets/img/features/feature-02.jpg" class="img-fluid" alt="Feature">
								<p>Test Room</p>
							</div>
							<!-- /Slider Item -->
							<!-- Slider Item -->
							<div class="feature-item text-center">
								<img src="assets/img/features/feature-03.jpg" class="img-fluid" alt="Feature">
								<p>ICU</p>
							</div>
							<!-- /Slider Item -->
							<!-- Slider Item -->
							<div class="feature-item text-center">
								<img src="assets/img/features/feature-04.jpg" class="img-fluid" alt="Feature">
								<p>Laboratory</p>
							</div>
							<!-- /Slider Item -->
							<!-- Slider Item -->
							<div class="feature-item text-center">
								<img src="assets/img/features/feature-05.jpg" class="img-fluid" alt="Feature">
								<p>Operation</p>
							</div>
							<!-- /Slider Item -->
							<!-- Slider Item -->
							<div class="feature-item text-center">
								<img src="assets/img/features/feature-06.jpg" class="img-fluid" alt="Feature">
								<p>Medical</p>
							</div>
							<!-- /Slider Item -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- /Availabe Features -->
		<!-- Blog Section -->
		<section class="section section-blogs">
			<div class="container-fluid">
				<!-- Section Header -->
				<div class="section-header text-center">
					<h2>Blogs and News</h2>
					<p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
				<!-- /Section Header -->
				<div class="row blog-grid-row">
					<div class="col-md-6 col-lg-3 col-sm-12">
						<!-- Blog Post -->
						<div class="blog grid-blog">
							<div class="blog-image">
								<a href="blog-details">
									<img class="img-fluid" src="assets/img/blog/blog-01.jpg" alt="Post Image">
								</a>
							</div>
							<div class="blog-content">
								<ul class="entry-meta meta-item">
									<li>
										<div class="post-author">
											<a href="doctor-profile">
												<img src="assets/img/doctors/doctor-thumb-01.jpg" alt="Post Author"> <span>Dr. Ruby Perrin</span>
											</a>
										</div>
									</li>
									<li><i class="far fa-clock"></i> 4 Dec 2019</li>
								</ul>
								<h3 class="blog-title"><a href="blog-details">Doccure – Making your clinic painless visit?</a></h3>
								<p class="mb-0">Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod tempor.</p>
							</div>
						</div>
						<!-- /Blog Post -->
					</div>
					<div class="col-md-6 col-lg-3 col-sm-12">
						<!-- Blog Post -->
						<div class="blog grid-blog">
							<div class="blog-image">
								<a href="blog-details">
									<img class="img-fluid" src="assets/img/blog/blog-02.jpg" alt="Post Image">
								</a>
							</div>
							<div class="blog-content">
								<ul class="entry-meta meta-item">
									<li>
										<div class="post-author">
											<a href="doctor-profile">
												<img src="assets/img/doctors/doctor-thumb-02.jpg" alt="Post Author"> <span>Dr. Darren Elder</span>
											</a>
										</div>
									</li>
									<li><i class="far fa-clock"></i> 3 Dec 2019</li>
								</ul>
								<h3 class="blog-title"><a href="blog-details">What are the benefits of Online Doctor Booking?</a></h3>
								<p class="mb-0">Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod tempor.</p>
							</div>
						</div>
						<!-- /Blog Post -->
					</div>
					<div class="col-md-6 col-lg-3 col-sm-12">
						<!-- Blog Post -->
						<div class="blog grid-blog">
							<div class="blog-image">
								<a href="blog-details">
									<img class="img-fluid" src="assets/img/blog/blog-03.jpg" alt="Post Image">
								</a>
							</div>
							<div class="blog-content">
								<ul class="entry-meta meta-item">
									<li>
										<div class="post-author">
											<a href="doctor-profile">
												<img src="assets/img/doctors/doctor-thumb-03.jpg" alt="Post Author"> <span>Dr. Deborah Angel</span>
											</a>
										</div>
									</li>
									<li><i class="far fa-clock"></i> 3 Dec 2019</li>
								</ul>
								<h3 class="blog-title"><a href="blog-details">Benefits of consulting with an Online Doctor</a></h3>
								<p class="mb-0">Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod tempor.</p>
							</div>
						</div>
						<!-- /Blog Post -->
					</div>
					<div class="col-md-6 col-lg-3 col-sm-12">
						<!-- Blog Post -->
						<div class="blog grid-blog">
							<div class="blog-image">
								<a href="blog-details">
									<img class="img-fluid" src="assets/img/blog/blog-04.jpg" alt="Post Image">
								</a>
							</div>
							<div class="blog-content">
								<ul class="entry-meta meta-item">
									<li>
										<div class="post-author">
											<a href="doctor-profile">
												<img src="assets/img/doctors/doctor-thumb-04.jpg" alt="Post Author"> <span>Dr. Sofia Brient</span>
											</a>
										</div>
									</li>
									<li><i class="far fa-clock"></i> 2 Dec 2019</li>
								</ul>
								<h3 class="blog-title"><a href="blog-details">5 Great reasons to use an Online Doctor</a></h3>
								<p class="mb-0">Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod tempor.</p>
							</div>
						</div>
						<!-- /Blog Post -->
					</div>
				</div>
				<div class="view-all text-center">	<a href="blog-list" class="btn btn-primary">View All</a>
				</div>
			</div>
		</section>
		<!-- /Blog Section -->	
			</div>
	   @endsection
	  