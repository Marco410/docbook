
<?php $__env->startSection('content'); ?>	
<!-- Main Wrapper -->
<div class="main-wrapper login-body">
            <div class="login-wrapper">
            	<div class="container">
					<?php if(session()->has('msj')): ?>
					<h4 class="text-center" ><?php echo e(session()->get('msj')); ?></h4>
					<?php endif; ?>
					
                	<div class="loginbox">
                    	<div class="login-left">
							<img class="img-fluid" src="../assets_admin/img/logo-white.png" alt="Logo">
                        </div>
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>Ingresar</h1>
								<p class="account-subtitle">Accede al panel de administrador</p>
								
								<!-- Form -->
								<form method="POST" action="<?php echo e(route('login')); ?>">
									<?php echo e(csrf_field()); ?>

									<div class="form-group">
										<input name="email" class="form-control" type="text" placeholder="Email" value="<?php echo e(old('email')); ?>" required>
									</div>
									<div class="form-group">
										<input name="password" class="form-control" type="password" placeholder="Contraseña" value="<?php echo e(old('password')); ?>" required>
									</div>
									<div class="form-group">
										<button class="btn btn-primary btn-block" type="submit">Iniciar Sesión</button>
									</div>
								</form>
								<!-- /Form -->
								
								<div class="text-center forgotpass"><a href="forgot-password">¿Olvidaste tu contraseña?</a></div>
								<!--
								<div class="login-or">
									<span class="or-line"></span>
									<span class="span-or">or</span>
								</div>
								  
								 Social Login 
								<div class="social-login">
									<span>Login with</span>
									<a href="#" class="facebook"><i class="fa fa-facebook"></i></a><a href="#" class="google"><i class="fa fa-google"></i></a>
								</div>
								 /Social Login 
							--><?php if($errors->any()): ?>
											<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<div role="alert" class="alert alert-danger alert-dismissible fade show"  ><strong>Error: </strong><?php echo e($error); ?></div>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endif; ?>
								<div class="text-center dont-have">¿No tienes una cuenta? <a href="registro">Registrate</a></div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\pixelar_doc\laravel-files\template\resources\views/admin/login.blade.php ENDPATH**/ ?>