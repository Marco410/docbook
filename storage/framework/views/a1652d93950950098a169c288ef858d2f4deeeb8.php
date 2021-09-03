<!DOCTYPE html>
<html lang="es">
  <head>
    <?php echo $__env->make('layout.partials.head_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </head>

  <body>
    <?php if(auth()->guard()->check()): ?>

    <?php if(!Route::is(['login-admin','registro','forgot-password','lock-screen','error-404','error-500'])): ?>
      <?php echo $__env->make('layout.partials.header_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  
    <?php endif; ?>

  <?php echo $__env->make('layout.partials.nav_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <?php endif; ?>
 <?php echo $__env->yieldContent('content'); ?>

 <?php echo $__env->make('layout.partials.footer_admin-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


  </body>
</html><?php /**PATH D:\xampp\htdocs\pixelar_doc\laravel-files\template\resources\views/layout/mainlayout_admin.blade.php ENDPATH**/ ?>