<?php $page="patient-register-step1";?>

<?php $__env->startSection('content'); ?>
<!-- Page Content -->
			<div class="content login-page pt-0">
				<div class="container-fluid">
					
					<!-- Register Content -->
					<div class="account-content">
						<div class="row align-items-center">
							<div class="login-right">
								<div class="inner-right-login">
									<div class="login-header">
										<div class="logo-icon">
											<img src="assets/img/logo.png" alt="">
										</div>
										<div class="step-list">
											<ul>
												<li><a href="#" class="active">1</a></li>
												<li><a href="#">2</a></li>
												<li><a href="#">3</a></li>
												<li><a href="#">4</a></li>
											</ul>
										</div>
										<h3 class="text-center" ><?php echo e($nombre); ?> <?php echo e($apellido); ?> <?php echo e($id); ?> </h3>
										<form method="post" enctype="multipart/form-data"  action="<?php echo e(url('/pa-registro-paso1')); ?>" class="needs-validation" novalidate>
                                            <?php echo e(csrf_field()); ?>

											<div class="profile-pic-col">
												<h3>Imagen de Perfil</h3>
												<div class="profile-pic-upload">
													<div class="cam-col">
														<img src="assets/img/icons/camera.svg" id="prof-avatar" alt="" class="img-fluid">
													</div>
													<span>Cargar imagen de perfil</span>
													<input required type="file" id="profile_image" name="foto">
													<div class="invalid-feedback">
														Este campo es requerido
													</div> 
												</div>
											</div>
											<input type="hidden" name="id" value="<?php echo e($id); ?>" />
											<div class="mt-5">
												<button class="btn btn-primary btn-block btn-lg login-btn" type="submit" >Continuar</button>
											</div>
										</form>
									</div>
								</div>
								<div class="login-bottom-copyright">
									<span>© 2020 Docbook. Todos los derechos reservados.</span>
								</div>
							</div>
						</div>
					</div>
					<!-- /Register Content -->

				</div>

			</div>		
			<!-- /Page Content -->

            </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\pixelar_doc\laravel-files\template\resources\views/pacients/patient-register-step1.blade.php ENDPATH**/ ?>