<!-- Profile Sidebar -->
    <div class="profile-sidebar">
        <div class="widget-profile pro-widget-content">
            <div class="profile-info-widget">
                <a href="#" class="booking-doc-img">
                    <img src="/assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
                </a>
                <div class="profile-det-info">
                    <h3>Dr. {{ Auth::user()->nombre }} {{ Auth::user()->apellido_p }} {{ Auth::user()->apellido_m }} {{ $msj ?? '' }} </h3>

                    <div class="patient-details">
                        <h5 class="mb-0">{{ Auth::user()->getRoleNames()[0] }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard-widget">
            <nav class="dashboard-menu">
                <ul>
                    <li  class="@if($page == "doctor-inicio") active @endif" >
                        <a href="/doctor-inicio?{{ session()->get('id') }}">
                            <i class="fas fa-columns"></i>
                            <span>Inicio</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="appointments">
                            <i class="fas fa-calendar-check"></i>
                            <span>Citas</span>
                        </a>
                    </li> --}}
                    <li  class="@if($page == "mis-pacientes") active @endif" >
                        <a href="{{ route('mis-pacientes') }}">
                            <i class="fas fa-user-injured"></i>
                            <span>Mis Pacientes</span>
                        </a>
                    </li>
                    <li  class="@if($page == "pagos") active @endif" >
                        <a href="{{ route('pagos') }}">
                            <i class="fas fa-money-check"></i>
                            <span>Movimientos (Pagos)</span>
                        </a>
                    </li>
                    <li  class="@if($page == "caja") active @endif" >
                        <a href="{{ route('caja') }}">
                            <i class="fas fa-cash-register"></i>
                            <span>Caja</span>
                        </a>
                    </li>
                    <li  class="@if($page == "clinicas") active @endif" >
                        <a href="{{ route('clinicas') }}">
                            <i class="fas fa-clinic-medical"></i>
                            <span>Clinicas</span>
                        </a>
                    </li>
                    <li  class="@if($page == "reportes") active @endif" >
                        <a href="{{ route('reportes') }}">
                            <i class="fas fa-file-medical"></i>
                            <span>Reportes</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="schedule-timings">
                            <i class="fas fa-hourglass-start"></i>
                            <span>Programar horarios</span>
                        </a>
                    </li>
                    <li>
                        <a href="available-timings">
                            <i class="fas fa-clock"></i>
                            <span>Horarios Disponibles</span>
                        </a>
                    </li>
                    <li>
                        <a href="invoices">
                            <i class="fas fa-file-invoice"></i>
                            <span>Facturas</span>
                        </a>
                    </li>
                    <li>
                        <a href="accounts">
                            <i class="fas fa-file-invoice-dollar"></i>
                            <span>Cuentas</span>
                        </a>
                    </li>
                    <li>
                        <a href="reviews">
                            <i class="fas fa-star"></i>
                            <span>Comentarios</span>
                        </a>
                    </li>
                    <li>
                        <a href="chat-doctor">
                            <i class="fas fa-comments"></i>
                            <span>Mensajes</span>
                            <small class="unread-msg">23</small>
                        </a>
                    </li>
                    <li>
                        <a href="config-perfil-doctor">
                            <i class="fas fa-user-cog"></i>
                            <span>Configuración de Perfil</span>
                        </a>
                    </li>
                    <li>
                        <a href="social-media">
                            <i class="fas fa-share-alt"></i>
                            <span>Redes Sociales</span>
                        </a>
                    </li>
                    <li>
                        <a href="doctor-change-password">
                            <i class="fas fa-lock"></i>
                            <span>Cambiar Contraseña</span>
                        </a>
                    </li> --}}
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Cerrar Sesión</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- /Profile Sidebar -->