<?php $page="patient-register-step5";?>
@extends('layout.mainlayout')
@section('content')

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
											<img width="250px" src="assets/img/logo.png" alt="">
										</div>
										<div class="step-list">
											<ul>
												<li><a href="#" class="active-done">1</a></li>
												<li><a href="#" class="active-done">2</a></li>
												<li><a href="#" class="active-done">3</a></li>
												<li><a href="#" class="active">4</a></li>
											</ul>
										</div>
										<form method="post" enctype="multipart/form-data"  action="{{ url('/pa-registro-paso4')}}" class="needs-validation" novalidate>
				                        	{{ csrf_field() }}
											<input type="hidden" name="id" value="{{ $paciente->id }}" />
											<h3 class="my-4">Tu Ubicación</h3>
				                        	
											<div class="form-group">
												<label>Estado</label>
												<select name="estado" id="estado" class="form-control select" aria-hidden="true" required >
													<option value="">Seleccione: </option>
													  <option value="Aguascalientes">Aguascalientes</option>
													  <option value="Baja California">Baja California</option>
													  <option value="Baja California Sur">Baja California Sur</option>
													  <option value="Campeche">Campeche</option>
													  <option value="Chiapas">Chiapas</option>
													  <option value="Chihuahua">Chihuahua</option>
													  <option value="Coahuila">Coahuila</option>
													  <option value="Colima">Colima</option>
													  <option value="Distrito Federal">Distrito Federal</option>
													  <option value="Durango">Durango</option>
													  <option value="Guanajuato">Guanajuato</option>
													  <option value="Guerrero">Guerrero</option>
													  <option value="Hidalgo">Hidalgo</option>
													  <option value="Jalisco">Jalisco</option>
													  <option value="Mexico">México</option>
													  <option value="Michoacan">Michoacán</option>
													  <option value="Morelos">Morelos</option>
													  <option value="Nayarit">Nayarit</option>
													  <option value="Nuevo Leon">Nuevo León</option>
													  <option value="Oaxaca">Oaxaca</option>
													  <option value="Puebla">Puebla</option>
													  <option value="Queretaro">Querétaro</option>
													  <option value="Quintana Roo">Quintana Roo</option>
													  <option value="San Luis Potosi">San Luis Potosí</option>
													  <option value="Sinaloa">Sinaloa</option>
													  <option value="Sonora">Sonora</option>
													  <option value="Tabasco">Tabasco</option>
													  <option value="Tamaulipas">Tamaulipas</option>
													  <option value="Tlaxcala">Tlaxcala</option>
													  <option value="Veracruz">Veracruz</option>
													  <option value="Yucatan">Yucatán</option>
													  <option value="Zacatecas">Zacatecas</option>
												  </select>
											</div>
											<div class="form-group">
												<label>Ciudad</label>
												<input required type="text" class="form-control" name="ciudad" />
											</div>

											<div class="form-group">
												<label>Dirección (Calle, No, Colonia, CP)</label>
												<input required  type="text" class="form-control" name="direccion" />
											</div>

						                    
							                <div class="mt-5">
					                        	<button class="btn btn-primary btn-block btn-lg login-btn" type="submit" >Continuar</button>
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
@endsection