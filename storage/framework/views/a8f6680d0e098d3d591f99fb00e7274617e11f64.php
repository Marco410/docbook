<?php $page="doctor-register-step1";?>

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
											</ul>
										</div>
										
                                        <h3 class="text-center" ><?php echo e($nombre); ?> <?php echo e($apellido); ?> <?php echo e($id); ?> </h3>
										<form method="post" enctype="multipart/form-data" action="<?php echo e(url('/registro-paso1')); ?>">
                                            <?php echo e(csrf_field()); ?>

											
											<div class="profile-pic-col">
												<h3>Foto de Perfil</h3>
												<div class="profile-pic-upload">
													<div class="cam-col">
														<img src="assets/img/icons/camera.svg" id="prof-avatar" alt="" class="img-fluid">
													</div>
													<span>Subir Foto de Perfil</span>
													<input required type="file" id="profile_image" name="foto">
												</div>
											</div>
											<div class="text-left mt-2">
						                        <h4 class="mt-3">Selecciona tu género</h4>
						                    </div>
						                    <div class="select-gender-col">
						                    	<div class="row">
						                    		<div class="col-6 pr-2">
						                    			<input type="radio" id="test1" name="sexo" checked="" value="Masculino">
    													<label for="test1">
    														<span class="gender-icon"><img src="assets/img/icons/male.png" alt=""></span>
    														<span>Hombre</span>
    													</label>
						                    		</div>
						                    		<div class="col-6 pl-2">
						                    			<input type="radio" id="test2" name="sexo" value="Femenino">
    													<label for="test2">
    														<span class="gender-icon"><img src="assets/img/icons/female.png" alt=""></span>
    														<span>Mujer</span>
    													</label>
						                    		</div>
						                    	</div>
						                    </div>
                                            
										
											<div class="mt-5">
                                                <input type="hidden" value="<?php echo e($id); ?>" name="id" />
                                                <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Continuar</button>
												
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
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\pixelar_doc\laravel-files\template\resources\views/doctors/doctor-register-step1.blade.php ENDPATH**/ ?>