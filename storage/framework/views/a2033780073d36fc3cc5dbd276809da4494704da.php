
<?php $__env->startSection('content'); ?>	
	<!-- Main Wrapper -->
    <div class="main-wrapper login-body">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                    	<div class="login-left">
							<img class="img-fluid" src="../assets_admin/img/logo-white.png" alt="Logo">
                        </div>
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>Registrate</h1>
								<p class="account-subtitle">Accede a nuestro menú de inicio</p>
								
								<!-- Form -->
								<form method="POST" action="<?php echo e(route('register')); ?>">
									<?php echo csrf_field(); ?>
									<div class="form-group">
										<input id="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name')); ?>" required autocomplete="name" placeholder="Nombre" autofocus>
										<div class="invalid-feedback">
											Este campo es requerido
										</div>
									</div>
									<div class="form-group">
										<input required class="form-control" type="email" name="email" placeholder="Correo Electrónico">
										<div class="invalid-feedback">
											Este campo es requerido
										</div>
									</div>
									<div class="form-group">
										<input class="form-control" id="password" type="password" name="password" placeholder="Contraseña" required>
										<div class="invalid-feedback">
											Este campo es requerido
										</div>
									</div>
									<div class="form-group">
										<input class="form-control" id="password_confirm" type="password" name="password_confirm" placeholder="Confirmar Contraseña" required>
										<div class="invalid-feedback" id="msj-pass">
											Este campo es requerido
										</div>
									</div>
									<?php if($errors->any()): ?>
                                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div role="alert" class="alert alert-danger alert-dismissible fade show"  ><strong>Error: </strong><?php echo e($error); ?></div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
									<div class="form-group mb-0">
										<button class="btn btn-primary btn-block" type="submit">Registrarme</button>
									</div>
								</form>
								<!-- /Form -->
								
								<!---
								<div class="login-or">
									<span class="or-line"></span>
									<span class="span-or">or</span>
								</div>
								
								 Social Login 
								<div class="social-login">
									<span>Register with</span>
									<a href="#" class="facebook"><i class="fa fa-facebook"></i></a><a href="#" class="google"><i class="fa fa-google"></i></a>
								</div>
								 /Social Login 
							-->
								<div class="text-center dont-have">¿Ya tienes una cuenta? <a href="login">Iniciar Sesión</a></div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\pixelar_doc\laravel-files\template\resources\views/admin/register.blade.php ENDPATH**/ ?>