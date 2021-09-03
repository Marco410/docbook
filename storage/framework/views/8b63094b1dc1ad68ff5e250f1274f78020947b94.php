<?php $page="patient-register-step3";?>

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
												<li><a href="#" class="active-done">1</a></li>
												<li><a href="#" class="active-done">2</a></li>
												<li><a href="#" class="active">3</a></li>
												<li><a href="#">4</a></li>
											</ul>
										</div>
										<h3 class="text-center" ><?php echo e($paciente->nombre); ?> <?php echo e($paciente->apellido_p); ?> <?php echo e($paciente->apellido_m); ?> </h3>
										<form method="post" enctype="multipart/form-data"  action="<?php echo e(url('/pa-registro-paso3')); ?>" class="needs-validation" novalidate>
											<?php echo e(csrf_field()); ?>

											<input type="hidden" name="id" value="<?php echo e($paciente->id); ?>" />
				                        	<div class="text-left mt-2">
						                        <p>Who all you want to cover in health insurance</p>
						                        <h4 class="mt-3">Select Members</h4>
						                    </div>
				                        	 <div class="checklist-col pregnant-col">
                                              
                                                <div class="remember-me-col d-flex justify-content-between">
                                                    <span class="mt-1">Casado</span>
                                                    <label class="custom_check">
                                                        <input type="checkbox" class="" name="casado" id="spouse" value="1">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="remember-me-col d-flex justify-content-between">
                                                    <span class="mt-1">Niños</span>
                                                    <div class="increment-decrement">
                                                        <div class="input-groups">
                                                            <input type="button" value="-" id="subs" class="button-minus dec button">
                                                            <input type="text" name="ninos" id="child" value="0" class="quantity-field">
                                                            <input type="button" value="+" id="adds" class="button-plus inc button a1 a2 a3 a4 a0">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="remember-me-col d-flex justify-content-between">
                                                    <span class="mt-1">Madre</span>
                                                    <label class="custom_check">
                                                        <input type="checkbox" class="" name="madre" id="mother" value="1">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="remember-me-col d-flex justify-content-between">
                                                    <span class="mt-1">Padre</span>
                                                    <label class="custom_check">
                                                        <input type="checkbox" class="" name="padre" id="father" value="1">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
							                <div class="mt-5">
					                        	<div class="mt-5">
													<button class="btn btn-primary btn-block btn-lg login-btn" type="submit" >Continuar</button>
												</div>
					                        </div>
				                        </form>
									</div>
								</div>
								<div class="login-bottom-copyright">
									<span>© 2020 Doccure. All rights reserved.</span>
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
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\pixelar_doc\laravel-files\template\resources\views/pacients/patient-register-step3.blade.php ENDPATH**/ ?>