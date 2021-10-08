<!DOCTYPE html>
<html lang="es">
  <head>
    <?php echo $__env->make('layout.partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </head>
  <?php if(Route::is(['map-grid'])): ?>
  <body class="map-page">
  <?php endif; ?>
  <?php if(Route::is(['chat-doctor','chat'])): ?>
  <body class="chat-page">
  <?php endif; ?>

  <?php if(Route::is(['doctor-register','registro-doctor','registro','registro-paso1','registro-paso2','registro-paso3','forgot-password','login','register','patient-register-step2','patient-register-step1','doctor-register-step1','pa-registro-paso1','pa-registro-paso2','pa-registro-paso3','doctor-register-step2','doctor-register-step3','patient-register-step3','patient-register-step4','patient-register-step5','pharmacy-register','pharmacy-register-step1','pharmacy-register-step2','pharmacy-register-step3','registro-dr','clinica-nueva'])): ?>
  <body class="account-page">
  <?php endif; ?>

  <?php if(Route::is(['video-call','voice-call'])): ?>
  <body class="call-page">
  <?php endif; ?>

  

  <?php if(!Route::is(['doctor-register-step1','registro','registrodr.store','registro-paso1','registro-paso2','registro-paso3','guardar-paciente','pa-registro-paso1','pa-registro-paso2','pa-registro-paso3','doctor-register-step2','doctor-register-step3','patient-register-step1','patient-register-step2','patient-register-step3','patient-register-step4','patient-register-step5','pharmacy-register-step1','pharmacy-register-step2','pharmacy-register-step3','clinica-nueva'])): ?>
  <body  class="body-historial"  >
  <?php echo $__env->make('layout.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endif; ?>
      
<?php echo $__env->yieldContent('content'); ?>
      
  
  <?php if(!Route::is(['iniciar-sesion','registro','registrodr.store','registro-paso1','registro-paso2','registro-paso3','guardar-paciente','pa-registro-paso1','pa-registro-paso2','pa-registro-paso3','map-grid','map-list','chat','voice-call','video-call','doctor-register-step1','doctor-register-step2','doctor-register-step3','patient-register-step1','patient-register-step2','patient-register-step3','patient-register-step4','patient-register-step5','pharmacy-register-step1','pharmacy-register-step2','pharmacy-register-step3','clinica-nueva'])): ?>
  <?php echo $__env->make('layout.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endif; ?>

<?php echo $__env->make('layout.partials.footer-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </body>
</html>
<script>
$(document).ready(function(){
  // alert(1);
 /*$('.submenu li a').click(function(){
   $(.submenu li a).removeClass("active");
   $(this).addClass("active");
   $('.has-submenu a').removeClass("active");
   $('.has-submenu a').addClass("active");
   
   //$(this).toggleClass("active");
 });*/
});
</script><?php /**PATH D:\xampp\htdocs\pixelar_doc\laravel-files\template\resources\views/layout/mainlayout.blade.php ENDPATH**/ ?>