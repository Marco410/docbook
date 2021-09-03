
<?php $__env->startSection('content'); ?>	
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Perfil Doctor</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Panel de Administración</a></li>
									<li class="breadcrumb-item active">Perfil</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="profile-header">
								<div class="row align-items-center">
									<div class="col-auto profile-image">
										<a href="#">
											<img class="rounded-circle" alt="Imagen de usuario" src="/storage/<?php echo e($doctor->foto); ?>">
										</a>
									</div>
									<div class="col ml-md-n2 profile-user-info">
										<h4 class="user-name mb-0"><?php echo e($doctor->nombre); ?> <?php echo e($doctor->apellido_p); ?> <?php echo e($doctor->apellido_m); ?></h4>
										<h6 class="text-muted"><?php echo e($doctor->email); ?></h6>
										<div class="user-Location"><i class="fa fa-map-marker"></i> <?php echo e($doctor->ciudad); ?>, <?php echo e($doctor->estado); ?> México</div>
										<div class="about-text">Acerca de: </div>
									</div>
									<div class="col-auto profile-btn">
										
										<a href="" class="btn btn-primary">
											Editar
										</a>
									</div>
								</div>
							</div>
							<div class="profile-menu">
								<ul class="nav nav-tabs nav-tabs-solid">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#per_details_tab">Acerca de </a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#password_tab">Contraseña</a>
									</li>
								</ul>
							</div>	
							<div class="tab-content profile-tab-cont">
								
								<!-- Personal Details Tab -->
								<div class="tab-pane fade show active" id="per_details_tab">
								
									<!-- Personal Details -->
									<div class="row">
										<div class="col-lg-12">
											<div class="card">
												<div class="card-body">
													<h5 class="card-title d-flex justify-content-between">
														<span>Detalles Personales</span> 
														<a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Editar</a>
													</h5>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Nombre</p>
														<p class="col-sm-10"><?php echo e($doctor->nombre); ?> <?php echo e($doctor->apellido_p); ?> <?php echo e($doctor->apellido_m); ?></p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Fecha de Nacimiento</p>
														<p class="col-sm-10">24 Jul 1983</p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
														<p class="col-sm-10"><?php echo e($doctor->email); ?></p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Teléfono</p>
														<p class="col-sm-10"><?php echo e($doctor->telefono); ?></p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0">Dirección</p>
														<p class="col-sm-10 mb-0"><?php echo e($doctor->direccion); ?><br>
															<?php echo e($doctor->direccion2); ?><br>
															<?php echo e($doctor->cp); ?>,<br>
															<?php echo e($doctor->ciudad); ?>, <?php echo e($doctor->estado); ?>.</p>
													</div>
												</div>
											</div>
											
											<!-- Edit Details Modal -->
											<div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
												<div class="modal-dialog modal-dialog-centered" role="document" >
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title">Detalles Personales</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<form>
																<div class="row form-row">
																	<div class="col-12 col-sm-4">
																		<div class="form-group">
																			<label>Nombre</label>
																			<input type="text" class="form-control" value="<?php echo e($doctor->nombre); ?>">
																		</div>
																	</div>
																	<div class="col-12 col-sm-4">
																		<div class="form-group">
																			<label>Apellido Paterno</label>
																			<input type="text"  class="form-control" value="<?php echo e($doctor->apellido_p); ?>">
																		</div>
																	</div>
																	<div class="col-12 col-sm-4">
																		<div class="form-group">
																			<label>Apellido Materno</label>
																			<input type="text"  class="form-control" value="<?php echo e($doctor->apellido_m); ?>">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Fecha de Nacimiento</label>
																			<div class="cal-icon">
																				<input type="text" class="form-control" value="24-07-1983">
																			</div>
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Teléfono</label>
																			<input type="text" value="<?php echo e($doctor->telefono); ?>" class="form-control">
																		</div>
																	</div>
																	<div class="col-12">
																		<h5 class="form-title"><span>Address</span></h5>
																	</div>
																	<div class="col-12">
																		<div class="form-group">
																		<label>Direccion</label>
																			<input type="text" class="form-control" value="<?php echo e($doctor->direccion); ?>, <?php echo e($doctor->direccion2); ?>">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Ciudad</label>
																			<input type="text" class="form-control" value="<?php echo e($doctor->ciudad); ?>">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Estado</label>
																			<input type="text" class="form-control" value="<?php echo e($doctor->estado); ?>">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Código Postal</label>
																			<input type="text" class="form-control" value="<?php echo e($doctor->cp); ?>">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Pais</label>
																			<input type="text" class="form-control" value="México">
																		</div>
																	</div>
																</div>
																<button type="submit" class="btn btn-primary btn-block">guardar Cambios</button>
															</form>
														</div>
													</div>
												</div>
											</div>
											<!-- /Edit Details Modal -->
											
										</div>

									
									</div>
									<!-- /Personal Details -->

								</div>
								<!-- /Personal Details Tab -->
								
								<!-- Change Password Tab -->
								<div id="password_tab" class="tab-pane fade">
								
									<div class="card">
										<div class="card-body">
											<h5 class="card-title">Change Password</h5>
											<div class="row">
												<div class="col-md-10 col-lg-6">
													<form>
														<div class="form-group">
															<label>Old Password</label>
															<input type="password" class="form-control">
														</div>
														<div class="form-group">
															<label>New Password</label>
															<input type="password" class="form-control">
														</div>
														<div class="form-group">
															<label>Confirm Password</label>
															<input type="password" class="form-control">
														</div>
														<button class="btn btn-primary" type="submit">Save Changes</button>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- /Change Password Tab -->
								
							</div>
						</div>
					</div>
				
				</div>			
			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\pixelar_doc\laravel-files\template\resources\views/admin/profile-doctor.blade.php ENDPATH**/ ?>