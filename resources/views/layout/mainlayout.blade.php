<!DOCTYPE html>
<html lang="es">
  <head>
    @include('layout.partials.head')
  </head>
  @if(Route::is(['map-grid']))
  <body class="map-page">
  @endif
  @if(Route::is(['chat-doctor','chat']))
  <body class="chat-page">
  @endif

  @if(Route::is(['doctor-register','registro-doctor','registro','registro-paso1','registro-paso2','registro-paso3','forgot-password','login','register','patient-register-step2','patient-register-step1','doctor-register-step1','pa-registro-paso1','pa-registro-paso2','pa-registro-paso3','doctor-register-step2','doctor-register-step3','patient-register-step3','patient-register-step4','patient-register-step5','pharmacy-register','pharmacy-register-step1','pharmacy-register-step2','pharmacy-register-step3','registro-dr','clinica-nueva']))
  <body class="account-page">
  @endif

  @if(Route::is(['video-call','voice-call']))
  <body class="call-page">
  @endif

  {{-- Estaba con el "!"  !Route::is( --}}

  @if(!Route::is(['doctor-register-step1','registro','registrodr.store','registro-paso1','registro-paso2','registro-paso3','guardar-paciente','pa-registro-paso1','pa-registro-paso2','pa-registro-paso3','doctor-register-step2','doctor-register-step3','patient-register-step1','patient-register-step2','patient-register-step3','patient-register-step4','patient-register-step5','pharmacy-register-step1','pharmacy-register-step2','pharmacy-register-step3','clinica-nueva']))
  <body  class="body-historial"  >
  @include('layout.partials.header')
  @endif
      
@yield('content')
      
  {{-- Estaba con el "!"  !Route::is( --}}
  @if(!Route::is(['iniciar-sesion','registro','registrodr.store','registro-paso1','registro-paso2','registro-paso3','guardar-paciente','pa-registro-paso1','pa-registro-paso2','pa-registro-paso3','map-grid','map-list','chat','voice-call','video-call','doctor-register-step1','doctor-register-step2','doctor-register-step3','patient-register-step1','patient-register-step2','patient-register-step3','patient-register-step4','patient-register-step5','pharmacy-register-step1','pharmacy-register-step2','pharmacy-register-step3','clinica-nueva']))
  @include('layout.partials.footer')
  @endif

@include('layout.partials.footer-scripts')
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
</script>