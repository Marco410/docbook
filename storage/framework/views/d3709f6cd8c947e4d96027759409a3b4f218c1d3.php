

<?php $__env->startSection('content'); ?>
	<!-- Breadcrumb -->
    <div class="breadcrumb-bar">
		<div class="container-fluid">
			<div class="row align-items-center">
				<div class="col-md-12 col-12">
					<nav aria-label="breadcrumb" class="page-breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="doctor-inicio">Inicio</a></li>
							<li class="breadcrumb-item active" aria-current="page"> <a href="<?php echo e(route('mis-pacientes')); ?>"> Mis Pacientes</a></li>
							<li class="breadcrumb-item active" aria-current="page">Historial</li>
						</ol>
					</nav>
					<h2 class="breadcrumb-title">Historial</h2>
				</div>
			</div>
		</div>
	</div>
	
	<input type="hidden" id="clinic_id" value="<?php echo e(auth()->user("doctors")->clinicas->where('activa',1)->first()->id); ?>" >
	<input type="hidden" id="especialidad_id" value="<?php echo e(auth()->user("doctors")->especialidad[0]->id); ?>" >
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<input type="hidden" name="paciente_id" id="paciente_id" value="<?php echo e($paciente->pluck('id')[0]); ?>" >
						<!-- 1er Columna -->
						<div class="col-sm-4">
							<div class="col-sm-12" >
								<div class="profile-sidebar">
									<div class="widget-profile pro-widget-content">
										<div class="profile-info-widget">
											<a href="#" class="booking-doc-img">
												
												<?php if($paciente->pluck('foto')[0] === ""): ?>
												<img class="avatar-img" src="../storage/<?php echo e($paciente->pluck('foto')[0]); ?>" alt="<?php echo e($paciente->pluck('nombre')[0]); ?>">
												<?php else: ?>
													<?php if($paciente->pluck('sexo')[0] == "Masculino"): ?>
													<img src="/assets/img/icons/male.png" alt="Paciente Masculino">
													<?php else: ?>
													<img src="/assets/img/icons/female.png" alt="Paciente Femenino">
													<?php endif; ?>
												<?php endif; ?>
											</a>
											<div class="profile-det-info">
												<h3><?php echo e($paciente->pluck('nombre')[0]); ?> <?php echo e($paciente->pluck('apellido_p')[0]); ?> <?php echo e($paciente->pluck('apellido_m')[0]); ?></h3>

												<div class="patient-details">
													<h5 class="mb-0">Paciente</h5>
												</div>
												<div class="col-sm-12 mb-2" >
													<a href="" class="edit-link"><small><i class="fa fa-edit mr-1" ></i>Editar</small></a>
												</div>
												<div class="col-sm-12" >
													<a href="" data-toggle="modal" data-target="#consulta_rapida" class="btn btn-sm btn-secondary"><small><i class="fa fa-fast-forward mr-1" ></i>Iniciar Consulta Rápida</small></a>
												</div>

											</div>
										</div>
									</div>
									<div class="dashboard-widget">
										<nav class="dashboard-menu">
											<ul>
												<li>
													<a href="index">
														<i class="fas fa-sign-out-alt"></i>
														<span>Cerrar Sesión</span>
													</a>
												</li>
											</ul>
										</nav>
									</div>
								</div>
							</div>
							<?php if(Session::has('storeN')): ?>
							<div class="col-sm-12" >
								<div class="col-sm-12" >
									<div class="alert alert-success alert-dismissible fade show" role="alert">
										<strong>Correcto</strong> La nota se guardo correctamente.
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									  </div>
								
								</div>
							</div>
							<?php endif; ?>
							<div class="col-sm-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">
											<h5 class="text-info"  > <i class="fas fa-sticky-note" ></i> NOTAS INTERNAS</h5>
										</div>
									</div>
									<div class="card-body">
										<form method="post" class="text-center" action="<?php echo e(route('store-notas-internas')); ?>">
											<?php echo e(csrf_field()); ?>

										<input type="hidden" name="paciente_id" value="<?php echo e($paciente->pluck('id')[0]); ?>" >
										<textarea name="notas_internas" class="form-control" id="" rows="5" placeholder="Escribe aqui..."><?php echo e($paciente->pluck('historial')[0][0]->notas_internas); ?></textarea>

										<button type="submit" class="btn btn-sm text-info text-center" >Guardar</button>
										</form>
									</div>
								</div>
							</div>

							<?php if(Session::has('storeS')): ?>
							<div class="col-sm-12" >
								<div class="alert alert-success alert-dismissible fade show" role="alert">
									<strong>Correcto</strong> Los datos se guardaron correctamente
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									  <span aria-hidden="true">&times;</span>
									</button>
								  </div>
							</div>
							<?php endif; ?>
							
							<div class="col-sm-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">
											<h5 class="text-info" > <i class="fas fa-heartbeat" ></i> SIGNOS VITALES</h5>
										</div>
									</div>
									<div class="card-body">
										<form method="post" action="<?php echo e(route('store-signos')); ?>">
											<?php echo e(csrf_field()); ?>

											<input type="hidden" name="paciente_id" value="<?php echo e($paciente->pluck('id')[0]); ?>" >
											<div class="col-sm-12">
												<div class="form-group row">
													<div class="col-sm-9">
														<label class="col-form-label"> <i class="fas fa-ruler-vertical text-info" ></i> Estatura</label>
													</div>
													<div class="col-sm-3 row" >
														<input type="number" value="<?php echo e($paciente->pluck('historial')[0][0]->estatura); ?>" class="form-control" id="estatura-signos" name="estatura" placeholder="m" maxlength="3" min="100"  >
														
													</div>
												</div>
												<div class="form-group row">
													<div class="col-sm-9">
														
														<label class="col-form-label "> <i class="fas fa-weight text-info" ></i> Peso</label>
													</div>
													<div class="col-sm-3 row" >
														<input type="number" value="<?php echo e($paciente->pluck('historial')[0][0]->peso); ?>" class="form-control" id="peso-signos" name="peso" placeholder="Kg" maxlength="3"  >
														
													</div>
												</div>
												<div class="form-group row">
													<div class="col-sm-9">
														<label class="col-form-label"> <i class="fas fa-male text-info" ></i> Indice  Masa Corporal</label>
													</div>
													<div class="col-sm-3 row" >
														<input type="hidden" id="masa_corporal" name="masa_corporal" value="<?php echo e($paciente->pluck('historial')[0][0]->masa_corporal ?? ''); ?>" >
														<label id="masa-corporal-label"><?php echo e($paciente->pluck('historial')[0][0]->masa_corporal ?? ''); ?> kg/m2</label>
													</div>
													<div class="col-sm-12" hidden >
														<small class="text-danger">Llena la estatura y la masa corporal</small>
													</div>
												</div>
												<div class="form-group row">
													<div class="col-sm-9">
														<label class="col-form-label"> <i class="fas fa-thermometer-three-quarters text-info" ></i> Temperatura</label>
													</div>
													<div class="col-sm-3 row" >
														<input type="number" value="<?php echo e($paciente->pluck('historial')[0][0]->temperatura ?? ''); ?>" name="temperatura" class="form-control form-control-sm" placeholder="°C" maxlength="3"   >
													</div>
												</div>
												<div class="form-group row">
													<div class="col-sm-9">
														<label class="col-form-label"><i class="fas fa-walking text-info"></i> Frecuencia Respiratoria</label>
													</div>
													<div class="col-sm-3 row" >
														<input type="number" value="<?php echo e($paciente->pluck('historial')[0][0]->frec_respiratoria ?? ''); ?>" class="form-control form-control-sm" placeholder="r/m" name="frec_respiratoria" maxlength="3"   >
													</div>
												</div>
												<div class="form-group row">
													<div class="col-sm-9">
														<label class="col-form-label"> <i class="fas fa-heartbeat text-info" ></i> Sistólica</label>
													</div>
													<div class="col-sm-3 row" >
														<input type="number" value="<?php echo e($paciente->pluck('historial')[0][0]->sistolica ?? ''); ?>" class="form-control form-control-sm" placeholder="mmHg" name="sistolica" maxlength="3"   >
													</div>
												</div>
												<div class="form-group row">
													<div class="col-sm-9">
														<label class="col-form-label"> <i class="fas fa-heartbeat text-info" ></i> Diastólica</label>
													</div>
													<div class="col-sm-3 row" >
														<input type="number" value="<?php echo e($paciente->pluck('historial')[0][0]->diastolica ?? ''); ?>" class="form-control form-control-sm" placeholder="mmHg" name="diastolica" maxlength="3"  >
													</div>
												</div>
												<div class="form-group row">
													<div class="col-sm-9">
														<label class="col-form-label"> <i class="fas fa-heart text-info" ></i> Frecuencia Cardiaca</label>
													</div>
													<div class="col-sm-3 row" >
														<input type="number" value="<?php echo e($paciente->pluck('historial')[0][0]->frec_cardiaca ?? ''); ?>" class="form-control form-control-sm" placeholder="bpm" name="frec_cardiaca"  maxlength="3"  >
													</div>
												</div>
												<div class="form-group row">
													<div class="col-sm-9">
														<label class="col-form-label"> <i class="fas fa-user-alt text-info" ></i> Porcentaje de Grasa Corporal</label>
													</div>
													<div class="col-sm-3 row" >
														<input type="number" value="<?php echo e($paciente->pluck('historial')[0][0]->grasa_corporal ?? ''); ?>" class="form-control form-control-sm" placeholder="%" name="grasa_corporal"  maxlength="3"  >
													</div>
												</div>
												<div class="form-group row">
													<div class="col-sm-9">
														<label class="col-form-label"> <i class="fas fa-user text-info" ></i>IMC</label>
													</div>
													<div class="col-sm-3 row" >
														<input type="number" value="<?php echo e($paciente->pluck('historial')[0][0]->masa_muscular ?? ''); ?>" class="form-control form-control-sm" placeholder="%" name="masa_muscular"  maxlength="3"  >
													</div>
												</div>
												<div class="form-group row">
													<div class="col-sm-9">
														<label class="col-form-label"> <i class="fas fa-smile text-info" ></i> Perimetro Cefálico</label>
													</div>
													<div class="col-sm-3 row" >
														<input type="number" value="<?php echo e($paciente->pluck('historial')[0][0]->cefalico ?? ''); ?>" class="form-control form-control-sm" placeholder="cm" name="cefalico" maxlength="3"  >
													</div>
												</div>
												<div class="form-group row">
													<div class="col-sm-9">
														<label class="col-form-label"> <i class="fas fa-stethoscope text-info" ></i> Saturación de Oxigeno</label>
													</div>
													<div class="col-sm-3 row" >
														<input type="number" value="<?php echo e($paciente->pluck('historial')[0][0]->sat_oxigeno ?? ''); ?>" class="form-control form-control-sm" placeholder="mmHg" name="sat_oxigeno"  maxlength="3"  >
													</div>
												</div>
												<div class="col-sm-12 mt-4">
													<button type="submit" class="btn btn-sm btn-primary btn-block" > <i class="fas fa-save" ></i> Guardar</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
								
						</div>
						<!-- Termina 1er Columna -->

						<!-- 2da Columna -->
						<div class="col-sm-4">
							<div class="row">
								<div class="col-sm-6">
									<h3 >ANTECEDENTES</h3>
								</div>
								<div class="col-sm-6 mb-4">
									
								</div>
							</div>

							<div class="row">
								
							<!--- ALERGIAS -->
							<div class="card col-sm-12 border-left ">
								<div class="card-header " data-toggle="collapse" href="#alergias">
									<div class="card-title ">
										<h5 class="text-info " ><i class="fas fa-file-medical"></i> ALERGIAS</h5>
									</div>
								</div>
								<div class="card-body collapse multi-collapse" id="alergias">
								
									<div  class="text-right mb-2">
										<div  class="custom-checkbox">
											<label  for="paciente_alergias" class="text-secondary text-sm">El paciente no tiene alergias conocidas
											</label> <input <?php if($paciente->pluck('historial')[0][0]->alergias_option == 0): ?> <?php echo e('checked'); ?> 	<?php endif; ?> type="checkbox" id="paciente_alergias" name="" >
										</div>
									</div>
								<div id="alergias_conocidas">
									<?php $__currentLoopData = $paciente[0]->alergias()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alergia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<label style="padding: 5px 10px 5px 10px;" for='s-alergia' id='s-alergia<?php echo e($alergia->id); ?>' class='badge badge-info m-1 s-alergia'> <input disabled type='hidden' checked  value='<?php echo e($alergia->id); ?>' ><?php echo e($alergia->alergia); ?> </label><i class='fas fa-trash text-danger ' onclick="eliminar_alergia(this)" data-id="<?php echo e($alergia->id); ?>" > </i> 
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</div>
									<div id="panel-alergias" style=" <?php if($paciente->pluck('historial')[0][0]->alergias_option == 0): ?> <?php echo e('display:none;'); ?> <?php endif; ?>" >
										<label for="buscar_alergia" class="text-secondary text-sm">Buscar alergia</label>

										<div class="input-group mb-2" >
												<input type="text" placeholder="Comienza a escribir algo para buscar" class="form-control" name="buscar_alergia" id="buscar_alergia"  >
												<div class="input-group-append ">
													<span class="input-group-text btn-primary text-white" id="basic-addon2"><i class="fas fa-search"></i></span>
												</div>
										</div>
										
										<div id="panel-store-alergias" >
										<div class="col-sm-12">
											<div id="select_alergia" >
											</div>
										</div>
										<div class="col-sm-12">
											<div id="btn_select_alergia" class="text-center" style="display: none" >
												<button type="button" id="btn-store-alergias" class="btn btn-sm btn-primary mb-2" > <i class="fas fa-save" ></i> Guardar</button>
											</div>
										</div>									</div>	
										
										<label for="otras_alergia" class="text-secondary text-sm">Otras alergias</label>	
										<div class="input-group" >
											
											<input type="text" name="otras_alergias" id="otras_alergias" class="form-control" placeholder="Escribe algo" />
											<div class="input-group-append ">
												<span class="input-group-text btn-primary text-white" id="basic-addon2"><i class="fas fa-plus"></i></span>
											</div>
										</div>
										<div id="btn-guardar-nueva-alergia" class="mt-3 text-center" style="display: none;">
											<button type="button" id="btn-new-alergia" class="btn btn-sm btn-info"> <i class="fas fa-plus" ></i> Añadir Nueva</button>
										</div>
									</div>
								</div>
							</div>
							<!--- TERMINA ALERGIAS -->

							<!--- ANTECEDENTES PATOLOGICOS -->
								<div class="card col-sm-12 border-left ">
									<div class="card-header " data-toggle="collapse" href="#pato">
										<div class="card-title ">
											<h5 class="text-info " ><i class="fas fa-file-medical"></i> PATOLÓGICOS</h5>
										</div>
									</div>
									<div class="card-body collapse multi-collapse" id="pato">
										<form id="formPato">
											<div class="row">
												
													<?php echo e(csrf_field()); ?>

												<div class="col-sm-12 text-right mb-3">
													<a role="button" class="text-info" id="no_a_todo" >No a todo</a>
												</div>
												<div class="col-sm-8 mb-2">
													<label >Hospitalización Previa</label>
												</div>
												<div class="col-sm-4">
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->hospi == "Si"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="hospi" id="hospi1" value="Si" >
														<label class="form-check-label" for="hospi1">
														Si
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->hospi == "No"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="hospi" id="hospi2" value="No">
														<label class="form-check-label" for="hospi2">
														No
														</label>
													</div>
												</div>
												<div class="col-sm-8 mb-2">
													<label >Cirugías Previas</label>
												</div>
												<div class="col-sm-4">
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->cirugia == "Si"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="cirugia" id="cirugia1" value="Si" >
														<label class="form-check-label" for="cirugia1">
														Si
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->cirugia == "No"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="cirugia" id="cirugia2" value="No">
														<label class="form-check-label" for="cirugia2">
														No
														</label>
													</div>
												</div>
												<div class="col-sm-8 mb-2">
													<label >Diabetes</label>
												</div>
												<div class="col-sm-4">
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->diabetes == "Si"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="diabetes" id="diabetes1" value="Si" >
														<label class="form-check-label" for="diabetes1">
														Si
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->diabetes == "No"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="diabetes" id="diabetes2" value="No">
														<label class="form-check-label" for="diabetes2">
														No
														</label>
													</div>
												</div>
												<div class="col-sm-8 mb-2">
													<label >Enfermedades Tiroideas</label>
												</div>
												<div class="col-sm-4">
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->tiroideas == "Si"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="tiroideas" id="tiroideas1" value="Si" >
														<label class="form-check-label" for="tiroideas1">
														Si
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->tiroideas == "No"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="tiroideas" id="tiroideas2" value="No">
														<label class="form-check-label" for="tiroideas2">
														No
														</label>
													</div>
												</div>
												<div class="col-sm-8 mb-2">
													<label >Hipertensión Arterial</label>
												</div>
												<div class="col-sm-4">
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->hipertension == "Si"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="hipertension" id="hipertension1" value="Si" >
														<label class="form-check-label" for="hipertension1">
														Si
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->hipertension == "No"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="hipertension" id="hipertension2" value="No">
														<label class="form-check-label" for="hipertension2">
														No
														</label>
													</div>
												</div>
												<div class="col-sm-8 mb-2">
													<label >Cardiopatias</label>
												</div>
												<div class="col-sm-4">
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->cardio == "Si"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="cardio" id="cardio1" value="Si" >
														<label class="form-check-label" for="cardio1">
														Si
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->cardio == "No"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="cardio" id="cardio2" value="No">
														<label class="form-check-label" for="cardio2">
														No
														</label>
													</div>
												</div>
												<div class="col-sm-8 mb-2">
													<label >Traumatismos</label>
												</div>
												<div class="col-sm-4">
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->trauma == "Si"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="trauma" id="trauma1" value="Si" >
														<label class="form-check-label" for="trauma1">
														Si
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->trauma == "No"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="trauma" id="trauma2" value="No">
														<label class="form-check-label" for="trauma2">
														No
														</label>
													</div>
												</div>
												<div class="col-sm-8 mb-2">
													<label >Cáncer</label>
												</div>
												<div class="col-sm-4">
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->cancer == "Si"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="cancer" id="cancer1" value="Si">
														<label class="form-check-label" for="cancer1">
														Si
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->cancer == "No"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="cancer" id="cancer2" value="No">
														<label class="form-check-label" for="cancer2">
														No
														</label>
													</div>
												</div>
												<div class="col-sm-8 mb-2">
													<label >Tuberculosis</label>
												</div>
												<div class="col-sm-4">
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->tuberculosis == "Si"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="tuberculosis" id="tuberculosis1" value="Si" >
														<label class="form-check-label" for="tuberculosis1">
														Si
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->tuberculosis == "No"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="tuberculosis" id="tuberculosis2" value="No">
														<label class="form-check-label" for="tuberculosis2">
														No
														</label>
													</div>
												</div>
												<div class="col-sm-8 mb-2">
													<label >Transfusiones</label>
												</div>
												<div class="col-sm-4">
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->trans == "Si"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="trans" id="trans1" value="Si">
														<label class="form-check-label" for="trans1">
														Si
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->trans == "No"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="trans" id="trans2" value="No">
														<label class="form-check-label" for="trans2">
														No
														</label>
													</div>
												</div>
												<div class="col-sm-8 mb-2">
													<label >Patologías Respiratorias</label>
												</div>
												<div class="col-sm-4">
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->pato_respiratorias == "Si"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="pato_respiratorias" id="pato_respiratorias1" value="Si" >
														<label class="form-check-label" for="pato_respiratorias1">
														Si
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->pato_respiratorias == "No"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="pato_respiratorias" id="pato_respiratorias2" value="No">
														<label class="form-check-label" for="pato_respiratorias2">
														No
														</label>
													</div>
												</div>
												<div class="col-sm-8 mb-2">
													<label >Patologías Gastrointestinales</label>
												</div>
												<div class="col-sm-4">
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->pato_gastro == "Si"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="pato_gastro" id="pato_gastro1" value="Si">
														<label class="form-check-label" for="pato_gastro1">
														Si
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->pato_gastro == "No"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="pato_gastro" id="pato_gastro2" value="No">
														<label class="form-check-label" for="pato_gastro2">
														No
														</label>
													</div>
												</div>
												<div class="col-sm-8 mb-2">
													<label >Enfermedades de Transmisión Sexual</label>
												</div>
												<div class="col-sm-4">
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->sexual == "Si"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="sexual" id="sexual1" value="Si" >
														<label class="form-check-label" for="sexual1">
														Si
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->sexual == "No"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="sexual" id="sexual2" value="No">
														<label class="form-check-label" for="sexual2">
														No
														</label>
													</div>
												</div>

												<div class="col-sm-4 ">
													<label >Otros</label>
												</div>
												<div class="col-sm-8 ">
													<textarea name="pato_otros" id="pato_otros" class="form-control" placeholder="Escribe aquí" ><?php echo e($paciente->pluck('historial')[0][0]->pato_otros); ?></textarea>
												</div>

												<div class="col-sm-8 offset-2 mt-4">
													<button type="button" class="btn btn-sm btn-primary btn-block" id="btn-save-pato" > <i class="fas fa-save" ></i> Guardar</button>
												</div>
											
											</div>
										</form>
									</div>
								</div>
							</div>
							<!--- TERMINA ANTECEDENTES PATOLOGICOS -->

							<!--- ANTECEDENTES NO PATOLOGICOS -->
							<div class="row">
								<div class="card col-sm-12 border-left">
									<div class="card-header " data-toggle="collapse" href="#no_pato">
										<div class="card-title">
											<h5 class="text-info" ><i class="fas fa-file-medical"></i> NO PATOLÓGICOS</h5>
										</div>
									</div>
									<div class="card-body collapse multi-collapse" id="no_pato">
										<form id="formNPato">
											<div class="row">
												<div class="col-sm-12 text-right mb-3">
													<a role="button" class="text-info" id="npato_no_a_todo" >No a todo</a>
												</div>
												<div class="col-sm-8 mb-2">
													<label >Actividad Fisica</label>
												</div>
												<div class="col-sm-4">
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->fisica == "Si"): ?> <?php echo e('checked'); ?> <?php endif; ?>  type="radio" name="fisica" id="fisica1" value="Si" >
														<label class="form-check-label" for="fisica1">
														Si
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->fisica == "No"): ?> <?php echo e('checked'); ?> <?php endif; ?>  type="radio" name="fisica" id="fisica2" value="No">
														<label class="form-check-label" for="fisica2">
														No
														</label>
													</div>
												</div>
												<div class="col-sm-8 mb-2">
													<label >Tabaquismo</label>
												</div>
												<div class="col-sm-4">
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->tabaco == "Si"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="tabaco" id="tabaco1" value="Si" >
														<label class="form-check-label" for="tabaco1">
														Si
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->tabaco == "No"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="tabaco" id="tabaco2" value="No">
														<label class="form-check-label" for="tabaco2">
														No
														</label>
													</div>
												</div>
												<div class="col-sm-8 mb-2">
													<label >Alcoholismo</label>
												</div>
												<div class="col-sm-4">
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->alcohol == "Si"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="alcohol" id="alcohol1" value="Si" >
														<label class="form-check-label" for="alcohol1">
														Si
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->alcohol == "No"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="alcohol" id="alcohol2" value="No">
														<label class="form-check-label" for="alcohol2">
														No
														</label>
													</div>
												</div>
												<div class="col-sm-8 mb-2">
													<label >Uso de otras sustancias (Drogas)</label>
												</div>
												<div class="col-sm-4">
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->sustancias == "Si"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="sustancias" id="sustancias1" value="Si" >
														<label class="form-check-label" for="sustancias1">
														Si
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->sustancias == "No"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="sustancias" id="sustancias2" value="No">
														<label class="form-check-label" for="sustancias2">
														No
														</label>
													</div>
												</div>
												<div class="col-sm-8 mb-2">
													<label >Vacuna o Inmunización reciente</label>
												</div>
												<div class="col-sm-4">
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->vacuna_reciente == "Si"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="vacuna_reciente" id="vacuna_reciente1" value="Si" >
														<label class="form-check-label" for="vacuna_reciente1">
														Si
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->vacuna_reciente == "No"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="vacuna_reciente" id="vacuna_reciente2" value="No">
														<label class="form-check-label" for="vacuna_reciente2">
														No
														</label>
													</div>
												</div>
												<div class="col-sm-4 mb-2">
													<label >Otros</label>
												</div>
												<div class="col-sm-8">
													<textarea name="npato_otros" id="npato_otros" class="form-control" placeholder="Escribe aquí" ><?php echo e($paciente->pluck('historial')[0][0]->npato_otros); ?></textarea>
												</div>
												<div class="col-sm-8 offset-2 mt-4">
													<button class="btn btn-sm btn-primary btn-block" type="button" id="btn-save-npato"  > <i class="fas fa-save" ></i> Guardar</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
							<!--- TERMINA ANTECEDENTES NO PATOLOGICOS -->

							<!--- ANTECEDENTES HEREDOFAMILIARES -->
							<div class="row">
								<div class="card col-sm-12 border-left">
									<div class="card-header " data-toggle="collapse" href="#heredo">
										<div class="card-title">
											<h5 class="text-info" ><i class="fas fa-users"></i> HEREDOFAMILIARES</h5>
										</div>
									</div>
									<div class="card-body collapse multi-collapse" id="heredo">
										<form id="formHeredo">
											<div class="row">
												<div class="col-sm-12 text-right mb-3">
													<a role="button" class="text-info" id="heredo_no_a_todo" >No a todo</a>
												</div>
												<div class="col-sm-8 mb-2">
													<label >Diabetes</label>
												</div>
												<div class="col-sm-4">
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->heredo_diabetes == "Si"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="heredo_diabetes" id="heredo_diabetes1" value="Si" >
														<label class="form-check-label" for="heredo_diabetes1">
														Si
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->heredo_diabetes == "No"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="heredo_diabetes" id="heredo_diabetes2" value="No">
														<label class="form-check-label" for="heredo_diabetes2">
														No
														</label>
													</div>
												</div>
												<div class="col-sm-8 mb-2">
													<label >Cardiopatías</label>
												</div>
												<div class="col-sm-4">
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->h_cardio == "Si"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="h_cardio" id="h_cardio1" value="Si" >
														<label class="form-check-label" for="h_cardio1">
														Si
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->h_cardio == "No"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="h_cardio" id="h_cardio2" value="No">
														<label class="form-check-label" for="h_cardio2">
														No
														</label>
													</div>
												</div>
												<div class="col-sm-8 mb-2">
													<label >Hipertensión Arterial</label>
												</div>
												<div class="col-sm-4">
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->h_hipertension == "Si"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="h_hipertension" id="h_hipertension1" value="Si" >
														<label class="form-check-label" for="h_hipertension1">
														Si
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->h_hipertension == "No"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="h_hipertension" id="h_hipertension2" value="No">
														<label class="form-check-label" for="h_hipertension2">
														No
														</label>
													</div>
												</div>
												<div class="col-sm-8 mb-2">
													<label >Enfermedades Tiroideas</label>
												</div>
												<div class="col-sm-4">
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->h_tiroideas == "Si"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="h_tiroideas" id="h_tiroideas1" value="Si" >
														<label class="form-check-label" for="h_tiroideas1">
														Si
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->h_tiroideas == "No"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="h_tiroideas" id="h_tiroideas2" value="No">
														<label class="form-check-label" for="h_tiroideas2">
														No
														</label>
													</div>
												</div>
												<div class="col-sm-4 mb-2">
													<label >Otros</label>
												</div>
												<div class="col-sm-8">
													<textarea name="heredo_otros" id="heredo_otros" class="form-control" placeholder="Escribe aquí" ><?php echo e($paciente->pluck('historial')[0][0]->heredo_otros); ?> </textarea>
												</div>
												<div class="col-sm-8 offset-2 mt-4">
													<button type="button" id="btn-save-heredo" class="btn btn-sm btn-primary btn-block" > <i class="fas fa-save" ></i> Guardar</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
							<!--- TERMINA ANTECEDENTES HEREDOFAMILIARES -->

							<!--- ANTECEDENTES PSIQUIATRICOS -->
							<div class="row">
								<div class="card col-sm-12 border-left">
									<div class="card-header " data-toggle="collapse" href="#psiqui">
										<div class="card-title">
											<h5 class="text-info" ><i class="fas fa-brain"></i> PSIQUIÁTRICOS</h5>
										</div>
									</div>
									<div class="card-body collapse multi-collapse" id="psiqui">
										<form id="formPsiqui" >
											<div class="row">
												<div class="col-sm-12 text-right mb-3">
													<a role="button" class="text-info" id="psiqui_no_a_todo" >No a todo</a>
												</div>
												<div class="col-sm-4">
													<label >Historia Familiar</label>
												</div>
												<div class="col-sm-8 mb-2">
													<textarea name="historia_familiar" id="historia_familiar" class="form-control" placeholder="Escribe aquí" ><?php echo e($paciente->pluck('historial')[0][0]->historia_familiar); ?></textarea>
												</div>
												<div class="col-sm-8 mb-2">
													<label >Conciencia de enfermedad</label>
												</div>
												<div class="col-sm-4">
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->conciencia == "Si"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="conciencia" id="conciencia1" value="Si" >
														<label class="form-check-label" for="conciencia1">
														Si
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->conciencia == "No"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="conciencia" id="conciencia2" value="No">
														<label class="form-check-label" for="conciencia2">
														No
														</label>
													</div>
												</div>
												<div class="col-sm-4 ">
													<label >Áreas afectadas por la enfermedad</label>
												</div>
												<div class="col-sm-8 mb-2">
													<textarea name="psiqui_areas" id="psiqui_areas" class="form-control" placeholder="Escribe aquí" ><?php echo e($paciente->pluck('historial')[0][0]->psiqui_areas); ?></textarea>
												</div>
												<div class="col-sm-4 ">
													<label >Tratamientos pasados y actuales</label>
												</div>
												<div class="col-sm-8 mb-2">
													<textarea name="psiqui_tratamientos" id="psiqui_tratamientos" class="form-control" placeholder="Escribe aquí" ><?php echo e($paciente->pluck('historial')[0][0]->psiqui_tratamientos); ?></textarea>
												</div>
												<div class="col-sm-8 mb-2">
													<label >Apoyo del grupo familiar o social</label>
												</div>
												<div class="col-sm-4">
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->psiqui_apoyo == "Si"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="psiqui_apoyo" id="psiqui_apoyo1" value="Si" >
														<label class="form-check-label" for="psiqui_apoyo1">
														Si
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" <?php if($paciente->pluck('historial')[0][0]->psiqui_apoyo == "No"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="psiqui_apoyo" id="psiqui_apoyo2" value="No">
														<label class="form-check-label" for="psiqui_apoyo2">
														No
														</label>
													</div>
												</div>
												<div class="col-sm-4 ">
													<label >Grupo familiar del paciente</label>
												</div>
												<div class="col-sm-8 mb-2">
													<textarea name="psiqui_grupo_familiar" id="psiqui_grupo_familiar" class="form-control" placeholder="Escribe aquí" ><?php echo e($paciente->pluck('historial')[0][0]->psiqui_grupo_familiar); ?></textarea>
												</div>
												<div class="col-sm-4 ">
													<label >Aspectos de la vida social</label>
												</div>
												<div class="col-sm-8 mb-2">
													<textarea name="psiqui_vida_social" id="psiqui_vida_social" class="form-control" placeholder="Escribe aquí" ><?php echo e($paciente->pluck('historial')[0][0]->psiqui_vida_social); ?></textarea>
												</div>
												<div class="col-sm-4">
													<label >Aspectos de la vida laboral</label>
												</div>
												<div class="col-sm-8  mb-2">
													<textarea name="psiqui_vida_laboral" id="psiqui_vida_laboral" class="form-control" placeholder="Escribe aquí" ><?php echo e($paciente->pluck('historial')[0][0]->psiqui_vida_laboral); ?></textarea>
												</div>
												<div class="col-sm-4">
													<label >Relación con la autoridad</label>
												</div>
												<div class="col-sm-8  mb-2">
													<textarea name="psiqui_autoridad" id="psiqui_autoridad" class="form-control" placeholder="Escribe aquí" ><?php echo e($paciente->pluck('historial')[0][0]->psiqui_autoridad); ?></textarea>
												</div>
												<div class="col-sm-4 ">
													<label >Control de los impulsos</label>
												</div>
												<div class="col-sm-8 mb-2">
													<textarea name="psiqui_impulsos" id="psiqui_impulsos" class="form-control" placeholder="Escribe aquí" ><?php echo e($paciente->pluck('historial')[0][0]->psiqui_impulsos); ?></textarea>
												</div>
												<div class="col-sm-4 ">
													<label >Manejo de frustración en su vida</label>
												</div>
												<div class="col-sm-8 mb-2">
													<textarea name="psiqui_frustracion" id="psiqui_frustracion" class="form-control" placeholder="Escribe aquí" ><?php echo e($paciente->pluck('historial')[0][0]->psiqui_frustracion); ?></textarea>
												</div>

												<div class="col-sm-8 offset-2 mt-4">
													<button type="button" id="btn-save-psiqui" class="btn btn-sm btn-primary btn-block" > <i class="fas fa-save" ></i> Guardar</button>
												</div>
											</div>
										</form>	
									</div>
								</div>
							</div>
							<!--- TERMINA ANTECEDENTES PSIQUIATRICOS -->

							<!--- DIETA NUTRIOLOGICA -->
							<div class="row">
								<div class="card col-sm-12 border-left">
									<div class="card-header " data-toggle="collapse" href="#dieta">
										<div class="card-title">
											<h5 class="text-info" > <i class="fas fa-utensils"></i> DIETA NUTRIOLÓGICA</h5>
										</div>
									</div>
									<div class="card-body collapse multi-collapse" id="dieta">
										<form id="formNutri">
											<div class="row">
												<div class="col-sm-12 text-right mb-3">
													<a role="button" class="text-info" id="dieta_no_a_todo" >No a todo</a>
												</div>
												<div class="col-sm-8 mb-2">
													<label >Desayuno</label>
												</div>
												<div class="col-sm-4">
													<div class="form-check form-check-inline">
														<input class="form-check-input"  <?php if($paciente->pluck('historial')[0][0]->desayuno == "Si"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="desayuno" id="desayuno1" value="Si" >
														<label class="form-check-label" for="desayuno1">
														Si
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input"  <?php if($paciente->pluck('historial')[0][0]->desayuno == "No"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="desayuno" id="desayuno2" value="No">
														<label class="form-check-label" for="desayuno2">
														No
														</label>
													</div>
												</div>
												<div class="col-sm-8 mb-2">
													<label >Colación en la mañana</label>
												</div>
												<div class="col-sm-4">
													<div class="form-check form-check-inline">
														<input class="form-check-input"  <?php if($paciente->pluck('historial')[0][0]->colacion == "Si"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="colacion" id="colacion1" value="Si" >
														<label class="form-check-label" for="colacion1">
														Si
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input"  <?php if($paciente->pluck('historial')[0][0]->colacion == "No"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="colacion" id="colacion2" value="No">
														<label class="form-check-label" for="colacion2">
														No
														</label>
													</div>
												</div>
												<div class="col-sm-8 mb-2">
													<label >Comida</label>
												</div>
												<div class="col-sm-4">
													<div class="form-check form-check-inline">
														<input class="form-check-input"  <?php if($paciente->pluck('historial')[0][0]->comida == "Si"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="comida" id="comida1" value="Si" >
														<label class="form-check-label" for="comida1">
														Si
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input"  <?php if($paciente->pluck('historial')[0][0]->comida == "No"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="comida" id="comida2" value="No">
														<label class="form-check-label" for="comida2">
														No
														</label>
													</div>
												</div>
												<div class="col-sm-8 mb-2">
													<label >Colación en la tarde</label>
												</div>
												<div class="col-sm-4">
													<div class="form-check form-check-inline">
														<input class="form-check-input"  <?php if($paciente->pluck('historial')[0][0]->colacion_tarde == "Si"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="colacion_tarde" id="colacion_tarde1" value="Si" >
														<label class="form-check-label" for="colacion_tarde1">
														Si
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input"  <?php if($paciente->pluck('historial')[0][0]->colacion_tarde == "No"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="colacion_tarde" id="colacion_tarde2" value="No">
														<label class="form-check-label" for="colacion_tarde2">
														No
														</label>
													</div>
												</div>
												<div class="col-sm-8 mb-2">
													<label >Cena</label>
												</div>
												<div class="col-sm-4">
													<div class="form-check form-check-inline">
														<input class="form-check-input"  <?php if($paciente->pluck('historial')[0][0]->cena == "Si"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="cena" id="cena1" value="Si" >
														<label class="form-check-label" for="cena1">
														Si
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input"  <?php if($paciente->pluck('historial')[0][0]->cena == "No"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="cena" id="cena2" value="No">
														<label class="form-check-label" for="cena2">
														No
														</label>
													</div>
												</div>
												<div class="col-sm-8 mb-2">
													<label >¿Alimentos preparados en casa?</label>
												</div>
												<div class="col-sm-4">
													<div class="form-check form-check-inline">
														<input class="form-check-input"  <?php if($paciente->pluck('historial')[0][0]->alimentos_casa == "Si"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="alimentos_casa" id="alimentos_casa1" value="Si" >
														<label class="form-check-label" for="alimentos_casa1">
														Si
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input"  <?php if($paciente->pluck('historial')[0][0]->alimentos_casa == "No"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="alimentos_casa" id="alimentos_casa2" value="No">
														<label class="form-check-label" for="alimentos_casa2">
														No
														</label>
													</div>
												</div>
												<div class="col-sm-12 mb-2">
													<label >Nivel de Apetito</label>
												</div>
												<div class="col-sm-12 mb-4">
													<div class="form-check form-check-inline">
														<input class="form-check-input"  <?php if($paciente->pluck('historial')[0][0]->apetito == "Excesivo"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="apetito" id="apetito1" value="Excesivo" >
														<label class="form-check-label" for="apetito1">
														Excesivo
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input"  <?php if($paciente->pluck('historial')[0][0]->apetito == "Bueno"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="apetito" id="apetito2" value="Bueno">
														<label class="form-check-label" for="apetito2">
														Bueno
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input"  <?php if($paciente->pluck('historial')[0][0]->apetito == "Regular"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="apetito" id="apetito3" value="Regular">
														<label class="form-check-label" for="apetito3">
														Regular
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input"  <?php if($paciente->pluck('historial')[0][0]->apetito == "Poco"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="apetito" id="apetito4" value="Poco">
														<label class="form-check-label" for="apetito4">
														Poco
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input"  <?php if($paciente->pluck('historial')[0][0]->apetito == "Nulo"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="apetito" id="apetito5" value="Nulo">
														<label class="form-check-label" for="apetito5">
														Nulo
														</label>
													</div>
												</div>
												<div class="col-sm-8 mb-2">
													<label >Presencia de hambre-ansiedad</label>
												</div>
												<div class="col-sm-4">
													<div class="form-check form-check-inline">
														<input class="form-check-input"  <?php if($paciente->pluck('historial')[0][0]->hambre == "Si"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="hambre" id="hambre1" value="Si" >
														<label class="form-check-label" for="hambre1">
														Si
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input"  <?php if($paciente->pluck('historial')[0][0]->hambre == "No"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="hambre" id="hambre2" value="No">
														<label class="form-check-label" for="hambre2">
														No
														</label>
													</div>
												</div>
												<div class="col-sm-8 mb-2">
													<label >Vasos de agua al día</label>
												</div>
												<div class="col-sm-4 mb-2">
													<div class="form-check form-check-inline">
														<input class="form-check-input"  <?php if($paciente->pluck('historial')[0][0]->vasos == "1 ó menos"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="vasos" id="vasos1" value="1 ó menos" >
														<label class="form-check-label" for="vasos1">
														1 ó menos
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input"  <?php if($paciente->pluck('historial')[0][0]->vasos == "2 a 3"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="vasos" id="vasos2" value="2 a 3">
														<label class="form-check-label" for="vasos2">
														2 a 3
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input"  <?php if($paciente->pluck('historial')[0][0]->vasos == "4 ó más"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="vasos" id="vasos3" value="4 ó más">
														<label class="form-check-label" for="vasos3">
														4 ó más
														</label>
													</div>
												</div>
												<div class="col-sm-4 ">
													<label >Preferencias de alimentos</label>
												</div>
												<div class="col-sm-8 mb-4">
													<textarea name="prefer_alimentos" id="prefer_alimentos" class="form-control" placeholder="Escribe aquí" > <?php echo e($paciente->pluck('historial')[0][0]->prefer_alimentos); ?></textarea>
												</div>
												<div class="col-sm-8 mb-2">
													<label >Malestares por alimentos</label>
												</div>
												<div class="col-sm-4">
													<div class="form-check form-check-inline">
														<input class="form-check-input"  <?php if($paciente->pluck('historial')[0][0]->malestares == "Si"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="malestares" id="malestares1" value="Si" >
														<label class="form-check-label" for="malestares1">
														Si
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input"  <?php if($paciente->pluck('historial')[0][0]->malestares == "No"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="malestares" id="malestares2" value="No">
														<label class="form-check-label" for="malestares2">
														No
														</label>
													</div>
												</div>
												<div class="col-sm-8 mb-2">
													<label >Medicamentos, complementos o suplementos</label>
												</div>
												<div class="col-sm-4">
													<div class="form-check form-check-inline">
														<input class="form-check-input"  <?php if($paciente->pluck('historial')[0][0]->complementos == "Si"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="complementos" id="complementos1" value="Si" >
														<label class="form-check-label" for="complementos1">
														Si
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input"  <?php if($paciente->pluck('historial')[0][0]->complementos == "No"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="complementos" id="complementos2" value="No">
														<label class="form-check-label" for="complementos2">
														No
														</label>
													</div>
												</div>
												<div class="col-sm-8 mb-2">
													<label >Otras dietas realizadas</label>
												</div>
												<div class="col-sm-4">
													<div class="form-check form-check-inline">
														<input class="form-check-input"  <?php if($paciente->pluck('historial')[0][0]->otras_dietas == "Si"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="otras_dietas" id="otras_dietas1" value="Si" >
														<label class="form-check-label" for="otras_dietas1">
														Si
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input"  <?php if($paciente->pluck('historial')[0][0]->otras_dietas == "No"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="otras_dietas" id="otras_dietas2" value="No">
														<label class="form-check-label" for="otras_dietas2">
														No
														</label>
													</div>
												</div>
												<div class="col-sm-8 mb-3">
													<label >Peso ideal</label>
												</div>
												<div class="col-sm-4 mb-3">
													<input type="text" class="form-control" placeholder="kg" name="peso_ideal" id="peso_ideal" value="<?php echo e($paciente->pluck('historial')[0][0]->peso_ideal); ?>" />
												</div>
												<div class="col-sm-8 mb-2">
													<label >Padecimiento atual relacionado al peso</label>
												</div>
												<div class="col-sm-4">
													<div class="form-check form-check-inline">
														<input class="form-check-input"  <?php if($paciente->pluck('historial')[0][0]->padecimiento_peso == "Si"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="padecimiento_peso" id="padecimiento_peso1" value="Si" >
														<label class="form-check-label" for="padecimiento_peso1">
														Si
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input"  <?php if($paciente->pluck('historial')[0][0]->padecimiento_peso == "No"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="padecimiento_peso" id="padecimiento_peso2" value="No">
														<label class="form-check-label" for="padecimiento_peso2">
														No
														</label>
													</div>
												</div>
												<div class="col-sm-8 mb-2">
													<label >Antecedentes personales relacionados al peso</label>
												</div>
												<div class="col-sm-4">
													<div class="form-check form-check-inline">
														<input class="form-check-input"  <?php if($paciente->pluck('historial')[0][0]->antecedentes_peso == "Si"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="antecedentes_peso" id="antecedentes_peso1" value="Si" >
														<label class="form-check-label" for="antecedentes_peso1">
														Si
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input"  <?php if($paciente->pluck('historial')[0][0]->antecedentes_peso == "No"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="antecedentes_peso" id="antecedentes_peso2" value="No">
														<label class="form-check-label" for="antecedentes_peso2">
														No
														</label>
													</div>
												</div>
												<div class="col-sm-8 mb-2">
													<label >Consumo de liquidos</label>
												</div>
												<div class="col-sm-4">
													<div class="form-check form-check-inline">
														<input class="form-check-input"  <?php if($paciente->pluck('historial')[0][0]->consumo_liquidos == "Si"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="consumo_liquidos" id="consumo_liquidos1" value="Si" >
														<label class="form-check-label" for="consumo_liquidos1">
														Si
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input"  <?php if($paciente->pluck('historial')[0][0]->consumo_liquidos == "No"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="consumo_liquidos" id="consumo_liquidos2" value="No">
														<label class="form-check-label" for="consumo_liquidos2">
														No
														</label>
													</div>
												</div>
												<div class="col-sm-8 mb-2">
													<label >Educación Nutriológica</label>
												</div>
												<div class="col-sm-4">
													<div class="form-check form-check-inline">
														<input class="form-check-input"  <?php if($paciente->pluck('historial')[0][0]->educacion_nutri == "Si"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="educacion_nutri" id="educacion_nutri1" value="Si" >
														<label class="form-check-label" for="educacion_nutri1">
														Si
														</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input"  <?php if($paciente->pluck('historial')[0][0]->educacion_nutri == "No"): ?> <?php echo e('checked'); ?> <?php endif; ?> type="radio" name="educacion_nutri" id="educacion_nutri2" value="No">
														<label class="form-check-label" for="educacion_nutri2">
														No
														</label>
													</div>
												</div>
												<div class="col-sm-4 mb-2">
													<label >Otros</label>
												</div>
												<div class="col-sm-8">
													<textarea name="nutri_otros" id="nutri_otros" class="form-control" placeholder="Escribe aquí" > <?php echo e($paciente->pluck('historial')[0][0]->nutri_otros); ?> </textarea>
												</div>
												<div class="col-sm-8 offset-2 mt-4">
													<button type="button" id="btn-save-nutri" class="btn btn-sm btn-primary btn-block" > <i class="fas fa-save" ></i> Guardar</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
							<!--- TERMINA DIETA NUTRIOLOGICA -->
							
							
							<div class="row">
								<div class="card col-sm-12">
									<div class="card-header">
										<div class="card-title">
											<h5 class="text-info" > <i class="fas fa-syringe" ></i> VACUNAS</h5>
										</div>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-sm-12">
												<div id="vacunas_conocidas">
													<?php $__currentLoopData = $paciente[0]->vacunas()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vacuna): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<label style="padding: 5px 10px 5px 10px;" for='s-vacuna' id='s-vacuna<?php echo e($vacuna->id); ?>' class='badge badge-info m-1 s-vacuna'> <input disabled type='hidden' checked  value='<?php echo e($vacuna->id); ?>' ><?php echo e($vacuna->vacuna); ?> </label><i class='fas fa-trash text-danger ' onclick="eliminar_vacuna(this)" data-id="<?php echo e($vacuna->id); ?>" > </i> 
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</div>
												<div id="panel-vacunas"  >
													<label for="buscar_vacuna" class="text-secondary text-sm">Buscar vacuna</label>
			
													<div class="input-group mb-2" >
															<input type="text" placeholder="Comienza a escribir algo para buscar" class="form-control" name="buscar_vacuna" id="buscar_vacuna"  >
															<div class="input-group-append ">
																<span class="input-group-text btn-primary text-white" id="basic-addon2"><i class="fas fa-search"></i></span>
															</div>
													</div>
													
													<div id="panel-store-vacunas" >
													<div class="col-sm-12">
														<div id="select_vacuna" >
														</div>
													</div>
													<div class="col-sm-12">
														<div id="btn_select_vacuna" class="text-center" style="display: none" >
															<button type="button" id="btn-store-vacunas" class="btn btn-sm btn-primary mb-2" > <i class="fas fa-save" ></i> Guardar</button>
														</div>
													</div>									</div>	
													
													<label for="otras_vacuna" class="text-secondary text-sm">Otras vacunas</label>	
													<div class="input-group" >
														
														<input type="text" name="otras_vacunas" id="otras_vacunas" class="form-control" placeholder="Escribe algo" />
														<div class="input-group-append ">
															<span class="input-group-text btn-primary text-white" id="basic-addon2"><i class="fas fa-plus"></i></span>
														</div>
													</div>
													<div id="btn-guardar-nueva-vacuna" class="mt-3 text-center" style="display: none;">
														<button type="button" id="btn-new-vacuna" class="btn btn-sm btn-info"> <i class="fas fa-plus" ></i> Añadir Nueva</button>
													</div>
												</div>
											</div>
										
										  </div>
									</div>
								</div>
							</div>

							
							<div class="row">
								<div class="card col-sm-12">
									<div class="card-header">
										<div class="card-title">
											<h5 class="text-info" > <i class="fas fa-tablets" ></i> MEDICAMENTOS ACTIVOS</h5>
										</div>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-sm-12">
												<div id="medis_conocidas">
													<?php $__currentLoopData = $paciente[0]->medis()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<label style="padding: 5px 10px 5px 10px;" for='s-medi' id='s-medi<?php echo e($medi->id); ?>' class='badge badge-info m-1 s-medi'> <input disabled type='hidden' checked  value='<?php echo e($medi->id); ?>' ><?php echo e($medi->medicamento); ?> </label><i class='fas fa-trash text-danger ' onclick="eliminar_medi(this)" data-id="<?php echo e($medi->id); ?>" > </i> 
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</div>
												<div id="panel-medis"  >
													<label for="buscar_medi" class="text-secondary text-sm">Buscar medicamento</label>
			
													<div class="input-group mb-2" >
															<input type="text" placeholder="Comienza a escribir algo para buscar" class="form-control" name="buscar_medi" id="buscar_medi"  >
															<div class="input-group-append ">
																<span class="input-group-text btn-primary text-white" id="basic-addon2"><i class="fas fa-search"></i></span>
															</div>
													</div>
													
													<div id="panel-store-medis" >
													<div class="col-sm-12">
														<div id="select_medi" >
														</div>
													</div>
													<div class="col-sm-12">
														<div id="btn_select_medi" class="text-center" style="display: none" >
															<button type="button" id="btn-store-medis" class="btn btn-sm btn-primary mb-2" > <i class="fas fa-save" ></i> Guardar</button>
														</div>
													</div>									</div>	
													
													<label for="otros_medi" class="text-secondary text-sm">Otros Medicamentos</label>	
													<div class="input-group" >
														
														<input type="text" name="otros_medis" id="otros_medis" class="form-control" placeholder="Escribe algo" />
														<div class="input-group-append ">
															<span class="input-group-text btn-primary text-white" id="basic-addon2"><i class="fas fa-plus"></i></span>
														</div>
													</div>
													<div id="btn-guardar-nueva-medi" class="mt-3 text-center" style="display: none;">
														<button type="button" id="btn-new-medi" class="btn btn-sm btn-info"> <i class="fas fa-plus" ></i> Añadir Nueva</button>
													</div>
												</div>
											</div>
											
										  </div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="card col-sm-12">
									<div class="card-header">
										<div class="card-title">
											<h5 class="text-info"> <i class="fas fa-notes-medical" ></i> NOTAS DE HISTORIAL</h5>
										</div>
									</div>
									<div class="card-body">
										<form id="formNotasHis">
											<div class="col-sm-12">
												<textarea name="notas_historial" id="notas_historial"  rows="6" placeholder="Escribe aquí" id="" class="form-control notas" ><?php echo e($paciente->pluck('historial')[0][0]->notas_historial ?? ''); ?></textarea>
												
											</div>
											<div class="col-sm-8 offset-2 mt-4">
												<button type="button" id="btn-save-notas-his" class="btn btn-sm btn-primary btn-block" > <i class="fas fa-save" ></i> Guardar</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						
						</div>
						<!-- Termina 2da Columna -->

						<!-- 3er Columna -->
						<div class="col-sm-4">
							<div class="row">
								<div class="col-sm-6">
									<div class="card pt-2 pb-1 pl-2">
										<div class="row">
											<div class="col-sm-4 text-center">
												<label class="text-sm text-warning" for=""><i class="fas fa-calendar" ></i></label>
											</div>
											<div class="col-sm-8 text-warning">
												<label class="text-lg " for=""> <?php echo e($paciente[0]->get_edad()); ?>

												</label><small> años</small>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="card pt-2 pb-1 pl-2">
										<div class="row">
											<div class="col-sm-4 text-center">
												<label class="text-sm text-info" for=""><i class="fas fa-ruler" ></i></label>
											</div>
											<div class="col-sm-8 text-info">
												<label class="text-lg " for=""><?php echo e($paciente->pluck('historial')[0][0]->estatura); ?>  
												</label><small> cm</small>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="card pt-2 pb-1 pl-2">
										<div class="row">
											<div class="col-sm-4 text-center">
												<label class="text-sm text-info" for=""><i class="fas fa-weight" ></i></label>
											</div>
											<div class="col-sm-8 text-info">
												<label class="text-lg " for=""><?php echo e($paciente->pluck('historial')[0][0]->peso); ?>

												</label><small> kg</small>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="card pt-2 pb-1 pl-2">
										<div class="row">
											<div class="col-sm-4 text-center">
												<label class="text-sm text-warning" for=""><i class="fas fa-weight" ></i></label>
											</div>
											<div class="col-sm-8 text-warning">
												<label class="text-lg " for=""><?php echo e($paciente->pluck('historial')[0][0]->masa_corporal); ?>  
												</label><small> kg/m2</small>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-12">
									<label for="agendar" class="text-secondary">Agendar Consulta</label>
									
									<div class="input-group mb-3">
										<input type="datetime" class="form-control datetimepicker" name="agendar_cita">
										<div class="input-group-append ">
											<span class="input-group-text btn-primary text-white" id="basic-addon2"><i class="fas fa-calendar"></i></span>
										  </div>
										
									  </div>
								</div>
								<div class="col-sm-12">
									<h5 class="text-secondary text-sm" >CONSULTAS INICIADAS</h5>
									<?php if(!empty($consultas)): ?>
										<?php $__currentLoopData = $consultas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consulta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<i style="display: none;" ><?php echo e($fechaInt = strtotime($consulta->created_at)); ?></i>
											<div class="card boder-primary">
												<div class="card-header text-center" >
													<label class="text-info text-lg" for=""><i class="fas fa-laptop-medical" ></i></label>
												</div>
												<div class="row card-body">
													<div class="col-sm-4 text-center p-2">
														<label class="text-secondary text-sm mb-1" ><?php echo e(date("d", $fechaInt)); ?></label><br>
														<label class="text-secondary text-lg mb-1" ><?php echo e(date("M", $fechaInt)); ?></label><br>
														<label class="text-secondary text-md mb-1"><?php echo e(date("Y", $fechaInt)); ?></label>
													</div>
													<div class="col-sm-8 p-2">
														<div class="row">											<div class="col-sm-8">
																<label class="text-secondary text-sm mb-3 font-italic" for="">Dr. <?php echo e($consulta->doctor()->get()[0]->nombre); ?> <?php echo e($consulta->doctor()->get()[0]->apellido_p); ?></label> 
															</div>
															<div class="col-sm-4">
																<label class="text-secondary  text-sm mb-3 " ><?php echo e(date("h:i A", $fechaInt)); ?></label>
															</div>
															<div class="col-sm-12">
																<label class="text-primary text-sm font-weight-bold mb-1 " for=""><?php echo e($consulta->motivo()->get()[0]->motivo); ?></label><br>
																<label class="text-secondary text-sm font-weight-bold mb-1 " for=""> <small><?php echo e(($consulta->diagnostico_id) ?  $consulta->diagnostico()->first()->descripcion_4 : $consulta->diagnostico_str); ?></small></label>
															</div>
														</div>
														
														
													</div>
												</div>
												<div class="card-footer" >
													<div class="row">

														<div class="col-sm-4">
															<a class="btn btn-sm bg-info-light" href="<?php echo e($consulta->receta); ?>" target="_blank" >Ver Receta</a>
														</div>
														<div class="col-sm-3" >
															<a class="btn bg-warning-light btn-sm" data-toggle="collapse" href="#notas<?php echo e($consulta->id); ?>" role="button" aria-expanded="false" aria-controls="notas<?php echo e($consulta->id); ?>">Notas
															</a>
														</div>
			
														<div class="col-sm-5" >
															<?php if($consulta->pagado == 0): ?>
																<button class="btn btn-sm bg-danger-light" onclick="pagar_atrasado('<?php echo e($consulta->id); ?>','<?php echo e(($consulta->diagnostico_id) ?  $consulta->diagnostico()->first()->descripcion_4 : $consulta->diagnostico_str); ?>','<?php echo e($consulta->motivo()->get()[0]->motivo); ?>')"> Pagar</button>
															<?php elseif($consulta->pagado == 1): ?>
															<a class="btn btn-sm bg-success-light" href="<?php echo e($consulta->recibo); ?>" target="_blank" >Recibo de Pago</a>
															
															<?php endif; ?>
	
														</div>
													</div>

												</div>
												
												<div class="collapse" id="notas<?php echo e($consulta->id); ?>">
													<div class="card card-body">
													 <?php echo $consulta->notas_consulta_rapida; ?>

													</div>
												  </div>
												
											</div>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>
									<div class="col-sm-12 text-center" >
										<?php echo e($consultas->links()); ?>

									</div>
								</div>
							</div>
						</div>
						<!-- Termina 3er Columna -->

					</div>
				</div>
			</div>		
			<!-- /Page Content -->
		</div>
		<!-- /Main Wrapper -->

		<!-- Consulta Rápida Modal -->
<div class="modal fade" id="consulta_rapida" aria-hidden="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document" >
		<div class="modal-content">
			<div class="modal-header">
				
				<h5 class="modal-title text-info">
					Nueva Consulta Rápida
				</h5>
				
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12 mb-4">
						<div class="row">
							<div class="col-sm-4">
								<div class="col-sm-12">
									<div class="input-group mb-4" id="input_buscar_motivo_rapida">
										<input type="text" class="form-control" id="buscar_motivo_rapida" 
										placeholder="Escribe para buscar motivo de consulta..." />
										
									</div>
								</div>
								
								<div class="col-sm-12">
									<div id="panel-motivo-select" ></div>
								</div>
								
							</div>
							<div class="col-sm-8">
								<div class="input-group ">
									<input type="text" class="form-control" placeholder="Diagnostico Principal" id="diagnostico_principal" readonly />
									<button class="btn btn-sm btn-info"  data-toggle="modal" data-target="#agregar_diagnostico" > <i class="fas fa-search" ></i> Buscar</button>
								</div>
							</div>
							<div class="col-sm-12">
								<div id="panel-motivos" ></div>
							</div>
						</div>
						
					</div>
					<div class="col-sm-7 mb-3">
						
						<textarea name="txtconsulta_rapida" id="txtconsulta_rapida" height="400px" rows="10" placeholder="Empieza a escribir aquí tu notas"></textarea>
					</div>
					<div class="col-sm-5 mb-3" >
						<div class="form-group row">
							<div class="col-sm-9">
								<label class="col-form-label"> <i class="fas fa-ruler-vertical text-info" ></i> Estatura</label>
							</div>
							<div class="col-sm-3 row" >
								<input type="number" value="<?php echo e($paciente->pluck('historial')[0][0]->estatura); ?>" class="form-control" id="estatura-signos2" name="estatura-signos2" placeholder="m" maxlength="3" min="100"  >
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-9">
								<label class="col-form-label "> <i class="fas fa-weight text-info" ></i> Peso</label>
							</div>
							<div class="col-sm-3 row" >
								<input type="number" value="<?php echo e($paciente->pluck('historial')[0][0]->peso); ?>" class="form-control" id="peso-signos2" name="peso_signos2" placeholder="Kg" maxlength="3"  >
								
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-9">
								<label class="col-form-label"> <i class="fas fa-male text-info" ></i> Masa Corporal</label>
							</div>
							<div class="col-sm-3 row" >
								<input type="hidden" id="masa_corporal2" name="masa_corporal2" value="<?php echo e($paciente->pluck('historial')[0][0]->masa_corporal ?? ''); ?>" >
								<label id="masa-corporal-label2"><?php echo e($paciente->pluck('historial')[0][0]->masa_corporal ?? ''); ?> kg/m2</label>
							</div>
							<div class="col-sm-12" hidden >
								<small class="text-danger">Llena la estatura y la masa corporal</small>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-9">
								<label class="col-form-label"> <i class="fas fa-thermometer-three-quarters text-info" ></i> Temperatura</label>
							</div>
							<div class="col-sm-3 row" >
								<input type="number" value="<?php echo e($paciente->pluck('historial')[0][0]->temperatura ?? ''); ?>" name="temperatura-signos2" id="temperatura-signos2" class="form-control form-control-sm" placeholder="°C" maxlength="3"   >
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-9">
								<label class="col-form-label"><i class="fas fa-walking text-info"></i> Frecuencia Respiratoria</label>
							</div>
							<div class="col-sm-3 row" >
								<input type="number" value="<?php echo e($paciente->pluck('historial')[0][0]->frec_respiratoria ?? ''); ?>" class="form-control form-control-sm" placeholder="r/m" id="frec_respiratoria-signos2" name="frec_respiratoria-signos2" maxlength="3"   >
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-9">
								<label class="col-form-label"> <i class="fas fa-heartbeat text-info" ></i> Sistólica</label>
							</div>
							<div class="col-sm-3 row" >
								<input type="number" value="<?php echo e($paciente->pluck('historial')[0][0]->sistolica ?? ''); ?>" class="form-control form-control-sm" placeholder="mmHg" id="sistolica2" name="sistolica2" maxlength="3"   >
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-9">
								<label class="col-form-label"> <i class="fas fa-heartbeat text-info" ></i> Diastólica</label>
							</div>
							<div class="col-sm-3 row" >
								<input type="number" value="<?php echo e($paciente->pluck('historial')[0][0]->diastolica ?? ''); ?>" class="form-control form-control-sm" placeholder="mmHg" id="diastolica2" name="diastolica2" maxlength="3"  >
							</div>
						</div>

					</div>
					<div id="panel-estudios-rapida" class="col-sm-6 text-center">
						<h4>Estudios</h4>
						<div id="panel-estudios-rapida-estudio" class="col-sm-12" ></div>
						
					</div>
					<div id="panel-medi-rapida" class="col-sm-6 text-center">
						<h4>Medicamentos</h4>
						<div id="panel-articulos-rapida-articulo" class="col-sm-12" ></div>

					</div>
					<div class="col-sm-6 mb-2 text-center">
						<div>
							<button class="btn btn-sm btn-info" data-toggle="modal" data-target="#agregar_estudio" > <i class="fas fa-plus" ></i> Agregar Estudio</button>
							
							
							
						</div>
					</div>
					<div class="col-sm-6 mb-2 text-center">
						<button class="btn btn-sm btn-info"  data-toggle="modal" data-target="#agregar_articulo" > <i class="fas fa-plus" ></i> Agregar Artículo</button>
					</div>
					
				</div>
				
			</div>
			<div class="modal-footer">
				<div class="col-sm-12" >
					<button class="btn btn-sm btn-primary btn-block" id="btn-add-consulta-rapida">Terminar Consulta</button>
				</div>
			</div>
			
		</div>
	</div>
</div>
<!-- /Consulta Rápida Modal -->

<!-- / Agregar Artículo Modal -->
<div class="modal fade" id="agregar_articulo" aria-hidden="true" role="dialog" >
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document" >
		<div class="modal-content sombra" >
			<div class="modal-header back-sec" >
				<h5 class="modal-title text-white"> <i clas="fas fa-search" ></i>
					Busqueda de Artículos<br>
					<small  >Capture la descripción del artículo</small>
				</h5>
				
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="text-white" >&times;</span>
				</button>
				
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12 mb-2 text-center">
						<table class=" table table-hover table-center mb-0" id="table_articulos">
							<thead>
								<tr>
									<th>Identificador</th>
									<th>Nombre del Medicamento</th>
									<th>Descripción</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>
							
							</tbody>
						</table>
						
					</div>
					
				</div>
				
			</div>
			<div class="modal-footer">
				<div class="row ">
					<div clas="col-sm-4" >
						<input type="text"  class="form-control form-control-sm" name="new_articulo_rapida" id="new_articulo_rapida" placeholder="Ingrese el nombre del nuevo artículo" >
					</div>
					
					<div clas="col-sm-4" >
						<input type="text" class="form-control form-control-sm" name="new_descripcion_rapida" id="new_descripcion_rapida" placeholder="Ingrese la descripción del nuevo artículo" >
					</div>
					<div class="col-sm-4" >
						<button id="btn-add-new-articulo" class="btn btn-sm btn-warning text-white" > <small> <i class="fas fa-plus" ></i> Añadir nuevo artículo inexistente</small> </button>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
<!-- / Cierra Agregar Artículo Modal -->

<!-- / Agregar Estudios Modal -->
<div class="modal fade" id="agregar_estudio" aria-hidden="true" role="dialog" >
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document" >
		<div class="modal-content sombra" >
			<div class="modal-header back-sec" >
				<h5 class="modal-title text-white"> <i clas="fas fa-search" ></i>
					Busqueda de Estudios<br>
					<small  >Capture el nombre del estudio en la barra de busqueda</small>
				</h5>
				
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="text-white" >&times;</span>
				</button>
				
			</div>
			<div class="modal-body">
				<div class="row">
					
					<div class="col-sm-12 mb-2 text-center">
						<table id="table_estudios" class="table table-hover table-center mb-0">
							<thead>
								<tr>
									<th>Identificador</th>
									<th>Estudio</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
						
					</div>
					
				</div>
				
			</div>
			<div class="modal-footer">
				<div class="row ">
					<div clas="col-sm-4" >
						<input type="text"  class="form-control form-control-sm" name="new_estudio_rapida" id="new_estudio_rapida" placeholder="Ingrese el nombre del nuevo estudio" >
					</div>
					<div class="col-sm-6" >
						<button id="btn-add-new-estudio" class="btn btn-sm btn-warning text-white" > <small> <i class="fas fa-plus" ></i> Añadir nuevo estudio inexistente</small> </button>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
<!-- / Cierra Agregar Estudios Modal -->

<!-- / Agregar Diagnóstico Modal -->
<div class="modal fade" id="agregar_diagnostico" aria-hidden="true" role="dialog" >
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document" >
		<div class="modal-content sombra" >
			<div class="modal-header back-prim" >
				<h5 class="modal-title text-white"> <i clas="fas fa-search" ></i>
					Busqueda de Diagnosticos<br>
					<small  >Catálogo de Diagnósticos CIE-10</small>
				</h5>
				
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="text-white" >&times;</span>
				</button>
				
			</div>
			<div class="modal-body">
				<div class="row">
					
					<div class="col-sm-12 mb-2 text-center">
						<table id="table_diagnosticos" class="table table-hover table-center mb-0">
							<thead>
								<tr>
									<th>#</th>
									<th>COD_3</th>
									<th>Descripción 3</th>
									<th>COD_4</th>
									<th>Descripcion 4</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
						
					</div>
					
				</div>
				
			</div>
			<div class="modal-footer">
				<div class="row">
					<div class="col-sm-12 text-center">
						<h5 class="text-secondary" >Agregar diagnóstico no encontrado</h5>
					</div>
					<div class="col-sm-6" >
						<input type="text" value="" class="form-control" id="diagnostico_no_encontrado" minlength="4" >
					</div>
					<div class="col-sm-6">
						<button class="btn btn-sm bg-info-light" id="btn_diagnostico_no_encontrado"  >Agregar</button>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
<!-- / Cierra agregar diagnóstico Modal -->

<!-- / Agregar pago Modal -->
<div class="modal fade" id="pagar_consulta" aria-hidden="true" role="dialog" >
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document" >
		<div class="modal-content sombra" >
			<div class="modal-header back-prim" >
				<h5 class="modal-title text-white">
					Recibir Pago Consulta Rápida<br>
					<small  ></small>
				</h5>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12 text-center" >
						<h4><i class="fas fa-money-check"></i> Cobrar:</h4>
					</div>
				</div>
				<div class="select-gender-col text-center">
					<div class="row">
						<div class="col-sm-6 pr-2">
							<input type="hidden" id="id_consulta_rapida" name="id_consulta_rapida" >
							<input type="radio" id="cobro1" name="cobro" checked="" value="<?php echo e(auth()->user("doctors")->seguimiento); ?>">
							<label for="cobro1">
								<span>$<?php echo e(auth()->user("doctors")->seguimiento); ?></span>
							</label>
						</div>
						<div class="col-sm-6 pl-2">
							<input type="radio" id="cobro2" name="cobro" value="<?php echo e(auth()->user("doctors")->primera); ?>">
							<label for="cobro2">
								<span>$<?php echo e(auth()->user("doctors")->primera); ?></span>
							</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 text-center"><h4><i class="fas fa-info-circle"></i> Detalles:</h4></div>
					<div class="col-sm-6 p-3 offset-3">
						<p>
							<strong>Diagnóstico: </strong><span id="diagnostico-consulta-cobro" ></span><br>
							<strong>Motivo: </strong><span id="motivo-consulta-cobro" ></span>
						</p>
					</div>
					<div class="col-sm-6 text-center offset-3" >
						<h4>Cobro extra:</h4>
						<input type="number" min="0"  id="cobro_extra" class="form-control" placeholder="$" >
						<input type="text" id="motivo_extra" name="motivo_extra"  class="form-control" placeholder="Motivo cobro extra"   >
						<p> <strong>Total: $</strong><span id="total_consulta_rapida" ><?php echo e(auth()->user("doctors")->seguimiento); ?></span> </p>
					</div>
					<div class="col-sm-6 offset-3 text-center" >
						<h4>Metodo de Pago:</h4>
						<select class="form-control" required name="metodo_pago" id="metodo_pago">
							<option value="">Seleccione:</option>
							<option value="Efectivo">Efectivo</option>
							<option value="Tarjeta">Tarjeta</option>
							<option value="Transferencia">Transferencia</option>
						</select>
					</div>
				</div>
				
			</div>
			<div class="modal-footer">
				<div class="col-sm-12" >
					<button class="btn btn-sm btn-block btn-primary" id="btn-hacer-pago" >Realizar cobro</button>
				</div>
			</div>
			
		</div>
	</div>
</div>
<!-- / Cierra agregar pago Modal -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\pixelar_doc\laravel-files\template\resources\views/doctors/historial.blade.php ENDPATH**/ ?>