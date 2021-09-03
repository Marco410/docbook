<?php $page="doctor-register-step2";?>

<?php $__env->startSection('content'); ?>
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
											<img src="assets/img/logo.png" alt="">
										</div>
										<div class="step-list">
											<ul>
												<li><a href="#" class="active-done">1</a></li>
												<li><a href="#" class="active">2</a></li>
												<li><a href="#">3</a></li>
											</ul>
										</div>
                                        <h3 class="text-center" ><?php echo e($doctor->nombre); ?> <?php echo e($doctor->apellido_p); ?> </h3>
                                        <h2 class="text-center text-info" >Datos de tu Organización</h2>
										
                                        
										<form method="post" enctype="multipart/form-data" action="<?php echo e(url('/registro-paso2')); ?>" novalidate >
                                            <?php echo e(csrf_field()); ?>

                                            <input name="id" type="hidden" value="<?php echo e($doctor->id); ?>" />
											<input type="hidden" id="clinic_is" name="clinic_is" value="0" />

												<div  class="pregnant-col pt-4 mb-3">
														<div class="remember-me-col d-flex justify-content-between">
															<span class="mt-1 text-warning">¿Tu organización ya se encuentra registrada?</span>
															<label class="custom_check">
															<input type="checkbox" class="" id="clinic_is_registered"    />
															
															<span class="checkmark"></span>
															</label>
														</div>
												</div>

												<div class="form-group" id="registradas" style="display: none" >
													<label for="">Clinicas</label>
													<select class="form-control select" name="clinica" id="">
														<option value="">Seleccione tu clinica</option>
														<?php $__currentLoopData = $clinicas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clinica): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($clinica->id); ?>"><?php echo e($clinica->nombre_consultorio); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													</select>
												</div>
							                     
                                                <div id="registrar_clinic" >
                                                <div class="form-group">
							                    	<label>Nombre de tu Organización <span class="text-danger">*</span></label>
							                    	<input required type="text" name="nombre_organizacion" class="form-control" id="nombre_organizacion" value="<?php echo e(old('nombre_organizacion')); ?>" >
							                    </div>
							                     <div class="form-group">
							                    	<label>Tipo de Organización <span class="text-danger">*</span></label>
							                    	<input type="text" required name="tipo_organizacion" class="form-control" id="tipo_organizacion" value="<?php echo e(old('tipo_organizacion')); ?>" >
							                    </div>
							                     <div class="form-group">
													<div class="remember-me-col d-flex justify-content-between">
														<span class="mt-1">Número de Médicos <span class="text-danger">*</span></span>
														<div class="increment-decrement">
															<div class="input-groups">
																<input type="button" value="-" id="subs" class="button-minus dec button">
																<input type="text" name="no_medicos" required id="child" value="1" class="quantity-field">
																<input type="button" value="+" id="adds" class="button-plus inc button a1 a2 a3 a4 a0">
															</div>
														</div>
													</div>
							                    </div>
												<div class="form-group">
							                    	<label>Teléfono de la Organización <span class="text-danger">*</span></label>
							                    	<input type="text" required name="tel_organizacion" class="form-control" id="tel_organizacion" value="<?php echo e(old('tel_organizacion')); ?>" >
							                    </div>
												<div class="form-group">
													<p class="text-secondary text-center" >La siguiente información se usará en los encabezados de documentos (recetas médicas, resúmenes clínicos, notas de remisión, etc.), y como tus detalles de contacto en mensajes a pacientes.</p>
												</div>

												<div class="form-group">
							                    	<label>Nombre del Consultorio <span class="text-danger">*</span></label>
							                    	<input required type="text" name="nombre_consultorio" class="form-control" id="nombre_consultorio" value="<?php echo e(old('nombre_consultorio')); ?>" >
							                    </div>
												<div class="profile-pic-col">
													<h3>Logotipo del Consultorio</h3>
													<div class="profile-pic-upload">
														<div class="cam-col">
															<img src="assets/img/icons/camera.svg" id="prof-avatar" alt="" class="img-fluid">
														</div>
														<span>Subir el Logotipo <span class="text-danger">*</span></span>
														<input required type="file" id="profile_image" accept="image/png,image/jpeg" name="logotipo">
													</div>
												</div>
												<div class="form-group">
							                    	<label>País del Consultorio <span class="text-danger">*</span></label>
							                    	<input required type="text" name="pais_consultorio" class="form-control" id="pais_consultorio" value="<?php echo e(old('pais_consultorio') ?? 'México'); ?>" >
							                    </div>
												<div class="form-group">
							                    	<label>Estado del Consultorio <span class="text-danger">*</span></label>
							                    	<select name="estado_consultorio" id="estado_consultorio" class="form-control select" aria-hidden="true" required >
														<option value="<?php echo e(old('estado_consultorio') ?? ""); ?>" ></option>
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
							                    	<label>Ciudad del Consultorio <span class="text-danger">*</span></label>
							                    	<input required type="text" name="ciudad_consultorio" class="form-control" id="ciudad_consultorio" value="<?php echo e(old('ciudad_consultorio')); ?>" >
							                    </div>
												<div class="form-group">
							                    	<label>Colonia del Consultorio <span class="text-danger">*</span></label>
							                    	<input required type="text" name="colonia_consultorio" class="form-control" id="colonia_consultorio" value="<?php echo e(old('colonia_consultorio')); ?>" >
							                    </div>
												<div class="form-group">
							                    	<label>Calle del Consultorio <span class="text-danger">*</span></label>
							                    	<input required type="text" name="calle_consultorio" class="form-control" id="calle_consultorio" value="<?php echo e(old('calle_consultorio')); ?>" >
							                    </div>
												<div class="form-group">
							                    	<label>Código Postal del Consultorio <span class="text-danger">*</span></label>
							                    	<input type="text" required name="cp_consultorio" class="form-control" id="cp_consultorio" value="<?php echo e(old('cp_consultorio')); ?>" >
							                    </div>
												<div class="form-group">
							                    	<label>Télefono del Consultorio <span class="text-danger">*</span></label>
							                    	<input type="text" required name="tel_consultorio" class="form-control" id="tel_consultorio" value="<?php echo e(old('tel_consultorio')); ?>" >
							                    </div>
											</div>

												
							                    
						                	</div>
					                        <div class="mt-5">
					                        	<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Continuar</button>
					                        </div>
				                        </form>
									</div>
									<div class="login-bottom-copyright">
										<span>© 2020 DocBook. Todos los derechos reservados.</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Register Content -->

				</div>

			</div>		
			<!-- /Page Content -->
            </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\pixelar_doc\laravel-files\template\resources\views/doctors/doctor-register-step2.blade.php ENDPATH**/ ?>