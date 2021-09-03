<!DOCTYPE html>
<html lang="es">
  <head>
    @include('layout.partials.head_admin')
  </head>

  <body>
    @auth

    @if(!Route::is(['login-admin','registro','forgot-password','lock-screen','error-404','error-500']))
      @include('layout.partials.header_admin')
  
    @endauth

  @include('layout.partials.nav_admin')
 @endif
 @yield('content')

 @include('layout.partials.footer_admin-scripts')


  </body>
</html>