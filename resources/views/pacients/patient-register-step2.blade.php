<?php $page="patient-register-step2";?>
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
												<li><a href="#" class="active">2</a></li>
												<li><a href="#">3</a></li>
												<li><a href="#">4</a></li>
											</ul>
										</div>
										<h3 class="text-center" >{{ $paciente->nombre }} {{ $paciente->apellido_p }} {{ $paciente->apellido_m }} </h3>
										<form method="post" enctype="multipart/form-data"  action="{{ url('/pa-registro-paso2')}}" class="needs-validation" novalidate>
                                            {{ csrf_field() }}
											<input type="hidden" name="id" value="{{ $paciente->id }}" />
					                    	<div class="text-left mt-2">
						                        <h3 class="mt-3">Selecciona tu genero:</h3>
						                    </div><br>
						                    <div class="select-gender-col">
						                    	<div class="row">
						                    		<div class="col-6 pr-2">
						                    			<input type="radio" id="test1" name="sexo" value="Masculino">
														
    													<label for="test1">
    														<span class="gender-icon"><img src="assets/img/icons/male.png" alt=""></span>
    														<span>Masculino</span>
    													</label>
						                    		</div>
						                    		<div class="col-6 pl-2">
						                    			<input type="radio" id="test2" name="sexo" value="Femenino">
														
    													<label for="test2">
    														<span class="gender-icon"><img src="assets/img/icons/female.png" alt=""></span>
    														<span>Femenino</span>
    													</label>
						                    		</div>
						                    	</div>
						                    </div>
						                    <div class="pregnant-col pt-4">
						                    	<div>
						                            <div class="remember-me-col d-flex justify-content-between">
						                            	<span class="mt-1">¿Estás embarazada?</span>
						                                <label class="custom_check">
                                                            <input type="checkbox" class="" id="is_registered" name="is_embarazada" value="1">
                                                            <span class="checkmark"></span>
						                                </label>
						                            </div>
						                        </div>
						                    </div>
						                    <div class="step-process-col mt-4">
							                    <div class="form-group" id="preg_div" style="display: none;">
							                    	<label>Tiempo de embarazo</label>
							                    	<select class="form-control select" id="preg_term" name="meses_embarazada" tabindex="-1" aria-hidden="true">
							                    		<option selected="" value="">Meses de embarazo</option>
							                    		<option value="1">1</option>
							                    		<option value="2">2</option>
							                    		<option value="3">3</option>
							                    		<option value="4">4</option>
							                    		<option value="5">5</option>
							                    		<option value="6">6</option>
							                    		<option value="">7</option>
							                    		<option value="8">8</option>
							                    		<option value="9">9</option>
							                    		<option value="10">10</option>
							                    	</select>
							                    </div>
							                    <div class="form-group">
							                    	<label>Tu Peso</label>
							                    	<div class="row">
							                    		<div class="col-7 pr-2">
							                    			<input type="text" class="form-control" name="peso" value="" id="weight">
							                    		</div>
							                    		<div class="col-5 pl-2">
							                    			<select class="form-control select" id="weight_unit" >
									                    		<option value="kg">Kg</option>
									                    	</select>
							                    		</div>
							                    	</div>
							                    </div>
							                    <div class="form-group">
							                    	<label>Tu Altura</label>
							                    	<div class="row">
							                    		<div class="col-7 pr-2">
							                    			<input type="text" value="" name="altura" class="form-control" id="height">
							                    		</div>
							                    		<div class="col-5 pl-2">
							                    			<select class="form-control select" id="height_unit" tabindex="-1" aria-hidden="true">
									                    		<option value="cm">cm</option>
									                    	</select>
							                    		</div>
							                    	</div>
							                    </div>
							                    <div class="form-group">
							                    	<label>Edad</label>
							                    	<input required type="text" name="edad" value=""  class="form-control" id="age">
													<div class="invalid-feedback">
														Este campo es requerido
													</div>
							                    </div>
							                    <div class="form-group">
							                    	<label>Tipo de Sangre</label>
							                    	<select required class="form-control select" id="blood_group" name="tipo_sangre" tabindex="-1" aria-hidden="true">
							                    		<option value="">Selecciona</option>
														<option value="A-">A-</option>
														<option value="A+">A+</option>
														<option value="B-">B-</option>
														<option value="B+">B+</option>
														<option value="AB-">AB-</option>
														<option value="AB+">AB+</option>
														<option value="O-">O-</option>
														<option value="O+">O+</option>
							                    	</select>
													<div class="invalid-feedback">
														Este campo es requerido
													</div>
							                    </div>
							                    <div class="form-group">
							                    	<label>Ritmo Cárdiaco</label>
							                    	<select class="form-control select" id="heart_rate" name="ritmo_cardiaco" tabindex="-1" aria-hidden="true">
							                    		<option value="">Selecciona</option>
							                    		<option value="0">No lo sé</option>
							                    		<option value="1">1</option>
							                    		<option value="2">2</option>
							                    	</select>
							                    </div>
							                    <div class="form-group">
							                    	<label>Presión sanguínea</label>
							                    	<select class="form-control select" id="bp" name="presion_sanguinea" tabindex="-1" aria-hidden="true">
							                    		<option value="">Selecciona:</option>
							                    		<option value="0">No lo sé</option>
							                    		<option value="1">1</option>
							                    		<option value="2">2</option>
							                    	</select>
							                    </div>
							                    <div class="form-group">
							                    	<label>Nivel de Glucosa</label>
							                    	<select class="form-control select" id="glucose" name="glucosa" tabindex="-1" aria-hidden="true">
							                    		<option value="">Seleccione:</option>
							                    		<option value="0">No lo sé</option>
							                    		<option value="1">1</option>
							                    		<option value="2">2</option>
							                    	</select>
							                    </div>
							                    <div class="form-group">
							                    	<label>Alergias</label>
							                    	<input type="text" class="form-control" value="" id="allergies" name="alergias">
							                    </div>
						                            <div class="remember-me-col d-flex justify-content-between">
						                            	<span class="mt-1">¿Estás tomando algún medicamento?</span>
						                                <label class="custom_check">
                                                            <input type="checkbox" class="" name="toma_medi" id="medicine" onclick="show_medicine(this)" value="1">
                                                            <span class="checkmark"></span>
						                                </label>
						                            </div>
						                            <div class="remember-me-col medicine_div" id="medicine_div" style="display:none"><br>
						                            	<div class="medicine_input">
															
                                                            <input type="text" id="medicine_name" name="medicamentos[]" value="" class="form-control" placeholder="Nombre de la Medicina">
                                                            <input type="text" value="" id="dosage" name="dosis[]" class="form-control" placeholder="Dosis"><br>
														
                                                        </div>
														<div class="text-center" >
						                            	<button type="button" onclick="add_medicine()" class="btn add_medicine"><i class="fa fa-plus"></i></button>
													</div>
						                            </div>
						                        </div>
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