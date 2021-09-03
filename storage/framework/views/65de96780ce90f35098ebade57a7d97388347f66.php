<?php $page="login";?>

<?php $__env->startSection('content'); ?>
	<!-- Page Content -->
    <div class="content" style="min-height:205px;">
				<div class="container-fluid">
					
					<div class="row">
						<div class="col-md-8 offset-md-2">
							
							<!-- Login Tab Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="assets/img/login-banner.png" class="img-fluid" alt="Doccure Login">	
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>Iniciar Sesión <span>DocBook</span> <?php echo e($tipo); ?> <?php if($tipo == "Paciente"): ?><a href="<?php echo e(route('iniciar-sesion')); ?>">¿Eres un Doctor?</a><?php else: ?><a href="<?php echo e(route('iniciar-sesion-paciente')); ?>">¿Eres un Paciente?</a><?php endif; ?> </h3>
										</div>
										<form method="POST" action="<?php echo e(route($route)); ?>">
											<?php echo csrf_field(); ?>
											<div class="form-group form-focus">
												<input type="email" name="email" class="form-control floating" value="<?php echo e(old('email')); ?>">
												<label class="focus-label">Email</label>
											</div>
											<div class="form-group form-focus">
												<input type="password" name="password" class="form-control floating">
												<label class="focus-label">Contraseña</label>
											</div>
											<div class="text-right">
												<a class="forgot-link" href="forgot-password">¿Olvidaste tu contraseña?</a>
											</div>
											<?php if($errors->any()): ?>
														<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<div role="alert" class="alert alert-danger alert-dismissible fade show"  ><strong>Error: </strong><?php echo e($error); ?></div>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
											<?php if(isset($errorL)): ?>
												<?php if($errorL): ?>
												<div role="alert" class="alert alert-danger alert-dismissible fade show"  ><strong>Error: </strong><?php echo e($errorL); ?></div>
												<?php else: ?>
													
												<?php endif; ?>
											<?php endif; ?>
											
											<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Iniciar Sesión</button>
											<!---
											<div class="login-or">
												<span class="or-line"></span>
												<span class="span-or">or</span>
											</div>
											<div class="row form-row social-login">
												<div class="col-6">
													<a href="#" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f mr-1"></i> Login</a>
												</div>
												<div class="col-6">
													<a href="#" class="btn btn-google btn-block"><i class="fab fa-google mr-1"></i> Login</a>
												</div>
											</div>-->

											<div class="text-center dont-have">¿No tienes una cuenta? <a href="<?php echo e(url('/registro-paciente')); ?>">Registrate</a></div>

										</form>
									</div>
								</div>
							</div>
							<!-- /Login Tab Content -->
								
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
            </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\pixelar_doc\laravel-files\template\resources\views/login.blade.php ENDPATH**/ ?>