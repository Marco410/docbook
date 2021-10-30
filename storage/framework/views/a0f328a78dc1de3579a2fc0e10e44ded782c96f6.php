<?php $page="paciente-nuevo";?>

<?php $__env->startSection('content'); ?>

			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="doctor-inicio">Inicio</a></li>
									<li class="breadcrumb-item active" aria-current="page">Editar Paciente</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Editando a Paciente <?php echo e($paciente->nombre); ?> <?php echo e($paciente->apellido_p); ?> <?php echo e($paciente->apellido_m); ?></h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
						
							<?php echo $__env->make('doctors.doctor-profile-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
							
						</div>
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="col-sm-12">
								<?php if($errors->any()): ?>
									<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<div role="alert" class="alert alert-danger alert-dismissible fade show"  ><strong>Error: </strong><?php echo e($error); ?></div>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endif; ?>
							</div>
							<form method="post" enctype="multipart/form-data"  action="<?php echo e(route('doctor-paciente-editar')); ?>" class="needs-validation" novalidate>
								<?php echo e(csrf_field()); ?>

								<!-- Basic Information -->
								<input type="hidden" name="paciente_id" value="<?php echo e($paciente->id); ?>" >
								<div class="card">
									
									<div class="card-body">
										<h4 class="card-title">Información Básica Actualizando</h4><br><br>
										<div class="row form-row">
											<div class="col-md-3">
												<div class="form-group">
													<div class="profile-pic-col" style="margin-top: -120px;">
														<div class="profile-pic-upload">
															<div class="cam-col">
																<?php if($paciente->foto): ?>
																<img id="prof-avatar" class="img-fluid" src="../storage/<?php echo e($paciente->foto); ?>" alt="<?php echo e($paciente->nombre); ?>">
																<?php else: ?>
																	<?php if($paciente->sexo == "Masculino"): ?>
																	<img src="assets/img/icons/male.png" id="prof-avatar" class="img-fluid" alt="">
																	<?php else: ?>
																	<img src="assets/img/icons/female.png" id="prof-avatar" class="img-fluid" alt="">
																	<?php endif; ?>
																<?php endif; ?>
															</div>
															<span>Actualizar Foto de Perfil</span>
															<input type="file" id="profile_image" name="foto">
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Nombre(s) <span class="text-danger">*</span></label>
													<input type="text" name="nombre" class="form-control" required value="<?php echo e($paciente->nombre); ?>" >
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Apellido Paterno <span class="text-danger">*</span></label>
													<input type="text" name="apellido_p" class="form-control" value="<?php echo e($paciente->apellido_p); ?>" required >
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Apellido Materno</label>
													<input type="text" name="apellido_m" class="form-control" value="<?php echo e($paciente->apellido_m); ?>" >
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Fecha de Nacimiento <span class="text-danger">*</span></label>
													<input type="date" name="fecha_nacimiento" required class="form-control" value="<?php echo e($paciente->fecha_nacimiento); ?>" >
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Género <span class="text-danger">*</span></label>
													<select  name="sexo" class="form-control select" required >
														<option value="" >Selecciona: </option>
														<option value="Masculino" <?php echo e(($paciente->sexo == "Masculino") ? "selected" : ""); ?> >Masculino</option>
														<option value="Femenino" <?php echo e(($paciente->sexo == "Femenino") ? "selected" : ""); ?> >Femenino</option>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Teléfono <span class="text-danger">*</span></label>
													<input type="text" name="telefono" min="10" max="10" class="form-control" value="<?php echo e($paciente->telefono); ?>" required >
												</div>
											</div>
											
											<div class="col-md-6">
												<div class="form-group">
													<label>Grupo Sanguineo</label>
													<select   class="form-control select" id="blood_group" name="tipo_sangre" tabindex="-1" aria-hidden="true">
														<option value="">Selecciona</option>
														<option value="A-" <?php echo e(($paciente->tipo_sangre == "A-") ? "selected" : ""); ?> >A-</option>
														<option value="A+" <?php echo e(($paciente->tipo_sangre == "A+") ? "selected" : ""); ?>>A+</option>
														<option value="B-" <?php echo e(($paciente->tipo_sangre == "B-") ? "selected" : ""); ?>>B-</option>
														<option value="B+" <?php echo e(($paciente->tipo_sangre == "B+") ? "selected" : ""); ?>>B+</option>
														<option value="AB-" <?php echo e(($paciente->tipo_sangre == "AB-") ? "selected" : ""); ?>>AB-</option>
														<option value="AB+" <?php echo e(($paciente->tipo_sangre == "AB+") ? "selected" : ""); ?>>AB+</option>
														<option value="O-" <?php echo e(($paciente->tipo_sangre == "O-") ? "selected" : ""); ?>>O-</option>
														<option value="O+" <?php echo e(($paciente->tipo_sangre == "O+") ? "selected" : ""); ?>>O+</option>
													</select>
													<div class="invalid-feedback">
														Este campo es requerido
													</div>
												</div>
											</div>
											<div class="col-md-6 ">
												<div class="form-group">
													<label>CURP </label>
													<input type="text" name="curp" class="form-control" value="<?php echo e($paciente->curp); ?>">
												</div>
											</div>
										<div class="mb-4" data-toggle="collapse" href="#datos_demo" role="button" aria-expanded="false" aria-controls="datos_demo" ><h4 class="text-primary" > <i class="fas fa-home"></i> Datos Demográficos <i class="fas fa-chevron-down"></i> </h4>
										</div>
										<div class="collapse" id="datos_demo">
											<div class="row" >
											
											<div class="col-md-5">
												<div class="form-group mb-3">
													<label>Calle </label>
													<input type="text" name="calle" required class="form-control" value="<?php echo e($paciente->calle); ?>">
												</div>
											</div>
											<div class="col-md-5">
												<div class="form-group mb-0">
													<label>Colonia </label>
													<input type="text" name="colonia" required class="form-control" value="<?php echo e($paciente->colonia); ?>">
												</div>
											</div>
											<div class="col-md-2">
											<div class="form-group mb-0">
													<label>Código Postal </label>
													<input type="text" name="cp" required class="form-control" value="<?php echo e($paciente->cp); ?>">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group mb-0">
													<label>Ciudad </label>
													<input type="text" name="ciudad" required class="form-control" value="<?php echo e($paciente->ciudad); ?>">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group mb-3">
													<label>Estado </label>
													<select name="estado" id="estado" class="form-control select" aria-hidden="true" required >
														<option value="">Seleccione: </option>
														<option value="Aguascalientes" <?php echo e(($paciente->estado == "Aguascalientes") ? "selected" : ""); ?>>Aguascalientes</option>
														<option value="Baja California" <?php echo e(($paciente->estado == "Baja California") ? "selected" : ""); ?>>Baja California</option>
														<option value="Baja California Sur" <?php echo e(($paciente->estado == "Baja California Sur") ? "selected" : ""); ?>>Baja California Sur</option>
														<option value="Campeche" <?php echo e(($paciente->estado == "Campeche") ? "selected" : ""); ?>>Campeche</option>
														<option value="Chiapas" <?php echo e(($paciente->estado == "Chiapas") ? "selected" : ""); ?>>Chiapas</option>
														<option value="Chihuahua" <?php echo e(($paciente->estado == "Chihuahua") ? "selected" : ""); ?>>Chihuahua</option>
														<option value="Coahuila" <?php echo e(($paciente->estado == "Coahuila") ? "selected" : ""); ?>>Coahuila</option>
														<option value="Colima" <?php echo e(($paciente->estado == "Colima") ? "selected" : ""); ?>>Colima</option>
														<option value="Distrito Federal" <?php echo e(($paciente->estado == "Distrito Federal") ? "selected" : ""); ?>>Distrito Federal</option>
														<option value="Durango" <?php echo e(($paciente->estado == "Durango") ? "selected" : ""); ?>>Durango</option>
														<option value="Guanajuato" <?php echo e(($paciente->estado == "Guanajuato") ? "selected" : ""); ?>>Guanajuato</option>
														<option value="Guerrero" <?php echo e(($paciente->estado == "Guerrero") ? "selected" : ""); ?>>Guerrero</option>
														<option value="Hidalgo" <?php echo e(($paciente->estado == "Hidalgo") ? "selected" : ""); ?>>Hidalgo</option>
														<option value="Jalisco" <?php echo e(($paciente->estado == "Jalisco") ? "selected" : ""); ?>>Jalisco</option>
														<option value="Mexico" <?php echo e(($paciente->estado == "Mexico") ? "selected" : ""); ?>>México</option>
														<option value="Michoacan" <?php echo e(($paciente->estado == "Michoacan") ? "selected" : ""); ?>>Michoacán</option>
														<option value="Morelos" <?php echo e(($paciente->estado == "Morelos") ? "selected" : ""); ?>>Morelos</option>
														<option value="Nayarit" <?php echo e(($paciente->estado == "Nayarit") ? "selected" : ""); ?>>Nayarit</option>
														<option value="Nuevo Leon" <?php echo e(($paciente->estado == "Nuevo Leon") ? "selected" : ""); ?>>Nuevo León</option>
														<option value="Oaxaca" <?php echo e(($paciente->estado == "Oaxaca") ? "selected" : ""); ?>>Oaxaca</option>
														<option value="Puebla" <?php echo e(($paciente->estado == "Puebla") ? "selected" : ""); ?>>Puebla</option>
														<option value="Queretaro" <?php echo e(($paciente->estado == "Queretaro") ? "selected" : ""); ?>>Querétaro</option>
														<option value="Quintana Roo" <?php echo e(($paciente->estado == "Quintana Roo") ? "selected" : ""); ?>>Quintana Roo</option>
														<option value="San Luis Potosi" <?php echo e(($paciente->estado == "San Luis Potosi") ? "selected" : ""); ?>>San Luis Potosí</option>
														<option value="Sinaloa" <?php echo e(($paciente->estado == "Sinaloa") ? "selected" : ""); ?>>Sinaloa</option>
														<option value="Sonora" <?php echo e(($paciente->estado == "Sonora") ? "selected" : ""); ?>>Sonora</option>
														<option value="Tabasco" <?php echo e(($paciente->estado == "Tabasco") ? "selected" : ""); ?>>Tabasco</option>
														<option value="Tamaulipas" <?php echo e(($paciente->estado == "Tamaulipas") ? "selected" : ""); ?>>Tamaulipas</option>
														<option value="Tlaxcala" <?php echo e(($paciente->estado == "Tlaxcala") ? "selected" : ""); ?>>Tlaxcala</option>
														<option value="Veracruz" <?php echo e(($paciente->estado == "Veracruz") ? "selected" : ""); ?>>Veracruz</option>
														<option value="Yucatan" <?php echo e(($paciente->estado == "Yucatan") ? "selected" : ""); ?>>Yucatán</option>
														<option value="Zacatecas" <?php echo e(($paciente->estado == "Zacatecas") ? "selected" : ""); ?>>Zacatecas</option>
													</select>
												</div>
											</div>
										</div>
										</div>
											<div class="col-sm-12">
												<div class="form-group mb-2">
													<div class="remember-me-col justify-content-between">
														<label class="custom_check">
															<input required type="checkbox" name="recordatorio"  value="1" <?php echo e(($paciente->recordatorio == "1") ? "checked" : ""); ?>  >
															<span class="checkmark"></span>
														</label>
														<span class="">El<strong> paciente</strong> acepta recibir recordatorios</span>
													</div>
												</div>
											</div>
											
											<div class="col-sm-12">
												<div class="form-group mb-2">
													<div class="remember-me-col justify-content-between">
														
														<label class="custom_check">
															<input required type="checkbox" class="" name="correo_bienvenida"  value="1" <?php echo e(($paciente->correo_bienvenida == "1") ? "checked" : ""); ?>>
															<span class="checkmark"></span>
														</label>
														<span class="">Enviar <strong>correo</strong> de bienvenida.</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- /Basic Information -->
								
								<div class="submit-section submit-btn-bottom">
									<button type="submit" class="btn btn-warning submit-btn btn-block text-white"><i class="fas fa-edit" ></i> Actualizar Paciente</button>
								</div>
							</form>
						</div>
					</div>

				</div>

			</div>		
            <!-- /Page Content -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\pixelar_doc\laravel-files\template\resources\views/doctors/doctor-patient-edit.blade.php ENDPATH**/ ?>