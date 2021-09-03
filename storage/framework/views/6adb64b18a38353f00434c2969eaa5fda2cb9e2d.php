<?php $page="patient-dashboard";?>

<?php $__env->startSection('content'); ?>
<!-- Breadcrumb -->
		<div class="breadcrumb-bar">
			<div class="container-fluid">
				<div class="row align-items-center">
					<div class="col-md-12 col-12">
						<nav aria-label="breadcrumb" class="page-breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index">Home</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
							</ol>
						</nav>
						<h2 class="breadcrumb-title">Dashboard</h2>
					</div>
				</div>
			</div>
		</div>
		<!-- /Breadcrumb -->

		<!-- Page Content -->
		<div class="content">
			<div class="container-fluid">
				<div class="row">

					<!-- Profile Sidebar -->
					<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
						<div class="profile-sidebar">
							<div class="widget-profile pro-widget-content">
								<div class="profile-info-widget">
									<a href="#" class="booking-doc-img">
										<img src="assets/img/patients/patient.jpg" alt="User Image">
									</a>
									<div class="profile-det-info">
										<h3>Richard Wilson</h3>
										<div class="patient-details">
											<h5><i class="fas fa-birthday-cake"></i> 24 Jul 1983, 38 years</h5>
											<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> Newyork, USA</h5>
										</div>
									</div>
								</div>
							</div>
							<div class="dashboard-widget">
								<nav class="dashboard-menu">
									<ul>
										<li>
											<a href="patient-dashboard">	
												<i class="fas fa-columns"></i>
												<span>Dashboard</span>
											</a>
										</li>
										<li>
											<a href="favourites">	
												<i class="fas fa-bookmark"></i>
												<span>Favourites</span>
											</a>
										</li>
										<li class="active">
											<a href="dependent">	
												<i class="fas fa-users"></i>
												<span>Dependent</span>
											</a>
										</li>
										<li>
											<a href="chat">	
												<i class="fas fa-comments"></i>
												<span>Message</span>
												<small class="unread-msg">23</small>
											</a>
										</li>
										<li>
											<a href="patient-accounts">
												<i class="fas fa-file-invoice-dollar"></i>
												<span>Accounts</span>
											</a>
										</li>
										<li>
											<a href="orders-list">
												<i class="fas fa-list-alt"></i>
												<span>Orders</span>
												<small class="unread-msg">7</small>
											</a>
										</li>
										<li>
											<a href="medical-records">
												<i class="fas fa-clipboard"></i>
												<span>Add Medical Records</span>
											</a>
										</li>
										<li>
											<a href="medical-details">
												<i class="fas fa-file-medical-alt"></i>
												<span>Medical Details</span>
											</a>
										</li>
										<li>
											<a href="profile-settings">	
												<i class="fas fa-user-cog"></i>
												<span>Profile Settings</span>
											</a>
										</li>
										<li>
											<a href="change-password">	
												<i class="fas fa-lock"></i>
												<span>Change Password</span>
											</a>
										</li>
										<li>
											<a href="index">	
												<i class="fas fa-sign-out-alt"></i>
												<span>Logout</span>
											</a>
										</li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
					<!-- / Profile Sidebar -->

					<div class="col-md-7 col-lg-8 col-xl-9">
						<div class="card">
							<div class="card-header">
								<div class="row">
									<div class="col-sm-6">
										<h3 class="card-title">Dependent</h3>
									</div>
									<div class="col-sm-6">
										<div class="text-right">
											<a href="#modal_form" data-toggle="modal" class="btn btn-primary btn-sm" tabindex="0">Add Dependent</a>
										</div>
									</div>
								</div>
							</div>
							<div class="card-body ">

								<!-- Dependent Tab -->
								<div class="card card-table mb-0">
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-hover table-center mb-0">
												<thead>
													<tr>
														<th>Dependent</th>
														<th>Relationship</th>
														<th>gender</th>
														<th>Number</th>
														<th>Blood Group</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>
															<h2 class="table-avatar">
																<span class="avatar avatar-sm mr-2">
																	<img class="avatar-img rounded-circle" src="assets/img/son.jpg" alt="User Image">
																</span>
																Christopher
															</h2>
														</td>
														<td>Son</td>
														<td>Male</td>
														<td>303-297-6170</td>
														<td>AB+</td>
														<td>
															<div class="table-action">
																<a href="#edit_form" class="btn btn-sm bg-info-light" data-toggle="modal">	<i class="fas fa-edit"></i> Edit</a>
																<a href="javascript:void(0);" class="btn btn-sm bg-danger-light"><i class="fas fa-times"></i> Deactive</a>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<h2 class="table-avatar">
																<span class="avatar avatar-sm mr-2">
																	<img class="avatar-img rounded-circle" src="assets/img/daughter.jpg" alt="User Image">
																</span>
																Tressie
															</h2>
														</td>
														<td>Daughter</td>
														<td>Female</td>
														<td>360-822-9097</td>
														<td>B+</td>
														<td>
															<div class="table-action">
																<a href="#edit_form" class="btn btn-sm bg-info-light" data-toggle="modal">	<i class="fas fa-edit"></i> Edit</a>
																<a href="javascript:void(0);" class="btn btn-sm bg-danger-light"><i class="fas fa-times"></i> Deactive</a>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<h2 class="table-avatar">
																<span class="avatar avatar-sm mr-2">
																	<img class="avatar-img rounded-circle" src="assets/img/father.jpg" alt="User Image">
																</span>
																Champagne
															</h2>
														</td>
														<td>Father</td>
														<td>Male</td>
														<td>720-841-8299</td>
														<td>B+</td>
														<td>
															<div class="table-action">
																<a href="#edit_form" class="btn btn-sm bg-info-light" data-toggle="modal">	<i class="fas fa-edit"></i> Edit</a>
																<a href="javascript:void(0);" class="btn btn-sm bg-danger-light"><i class="fas fa-times"></i> Deactive</a>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<h2 class="table-avatar">
																<span class="avatar avatar-sm mr-2">
																	<img class="avatar-img rounded-circle" src="assets/img/mother.jpg" alt="User Image">
																</span>
																Vena
															</h2>
														</td>
														<td>Mother</td>
														<td>Male</td>
														<td>949-583-4370</td>
														<td>A+</td>
														<td>
															<div class="table-action">
																<a href="#edit_form" class="btn btn-sm bg-info-light" data-toggle="modal">	<i class="fas fa-edit"></i> Edit</a>
																<a href="javascript:void(0);" class="btn btn-sm bg-danger-light"><i class="fas fa-times"></i> Deactive</a>
															</div>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<!-- /Dependent Tab -->

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Page Content -->
		<!-- Add Dependent Modal-->
	<div id="modal_form" class="modal fade custom-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-modal="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<form action="#" enctype="multipart/form-data" autocomplete="off" id="family_form" method="post"> 
					<div class="modal-header">
						<h5 class="modal-title">Add new member</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="category_name" class="control-label mb-10"> Name <span class="text-danger">*</span></label>
							<input type="text" parsley-trigger="change" id="name" name="name" class="form-control">
						</div>
						<div class="form-group">
							<label for="slug" class="control-label mb-10">Relationship </label>
							<input type="text" parsley-trigger="change" id="relationship" name="relationship" class="form-control">
						</div>
						<div class="form-group">
							<label for="description" class="control-label mb-10">Gender </label>
							<select class="form-control" name="gender" id="gender">
								<option value="">Select</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div>
						<div class="form-group">
							<label for="keywords" class="control-label mb-10">DOB </label>
							<input type="text" name="dob" id="dob" value="" readonly="" class="form-control">
						</div>
						<div class="form-group">
							<label for="slug" class="control-label mb-10">Photo </label>
							<input type="file" parsley-trigger="change" id="profile_image" name="profile_image" class="form-control">
						</div>
					</div>
					<div class="modal-footer text-center">
						<button type="submit" id="btnfamilyssave" class="btn btn-primary submit-btn">Save Changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- /Add Dependent Modal-->

	<!-- Edit Dependent Modal-->
	<div id="edit_form" class="modal fade custom-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-modal="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<form action="#" enctype="multipart/form-data" autocomplete="off" id="family_form" method="post"> 
					<div class="modal-header">
						<h5 class="modal-title">Edit member</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="category_name" class="control-label mb-10"> Name <span class="text-danger">*</span></label>
							<input type="text" parsley-trigger="change" id="name" name="name" class="form-control" value="Christopher">
						</div>
						<div class="form-group">
							<label for="slug" class="control-label mb-10">Relationship </label>
							<input type="text" parsley-trigger="change" id="relationship" name="relationship" class="form-control" value="son">
						</div>
						<div class="form-group">
							<label for="description" class="control-label mb-10">Gender </label>
							<select class="form-control" name="gender" id="gender">
								<option value="">Select</option>
								<option value="Male" selected>Male</option>
								<option value="Female">Female</option>
							</select>
						</div>
						<div class="form-group">
							<label for="keywords" class="control-label mb-10">DOB </label>
							<input type="text" name="dob" id="editdob" value="01/12/2021" readonly="" class="form-control">
						</div>
						<div class="form-group">
							<label for="slug" class="control-label mb-10">Photo </label>
							<input type="file" parsley-trigger="change" id="profile_image" name="profile_image" class="form-control">
						</div>
					</div>
					<div class="modal-footer text-center">
						<button type="submit" id="btnfamilyssave" class="btn btn-primary submit-btn">Save Changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- /Edit Dependent Modal-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\pixelar_doc\laravel-files\template\resources\views/dependent.blade.php ENDPATH**/ ?>