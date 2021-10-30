<?php $page="patient-profile";?>

<?php $__env->startSection('content'); ?>
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
	<div class="container-fluid">
		<div class="row align-items-center">
			<div class="col-md-12 col-12">
				<nav aria-label="breadcrumb" class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="/doctor-inicio">Inicio</a></li>
						<li class="breadcrumb-item active" aria-current="page">Perfil</li>
					</ol>
				</nav>
				<h2 class="breadcrumb-title">Perfil</h2>
			</div>
		</div>
	</div>
</div>
			<!-- /Breadcrumb -->
	<input type="hidden" id="clinic_id" value="<?php echo e(auth()->user("doctors")->clinicas->where('activa',1)->first()->id); ?>" >
	<input type="hidden" id="especialidad_id" value="<?php echo e(auth()->user("doctors")->especialidad[0]->id); ?>" >			
			<!-- Page Content -->
<div class="content">
	<div class="container-fluid">
		
		<div class="row">
			<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar dct-dashbd-lft">
			
				<!-- Profile Widget -->
				<div class="card widget-profile pat-widget-profile">
					<div class="card-body">
						<div class="pro-widget-content">
							<div class="profile-info-widget">
								<a href="#" class="booking-doc-img">
									<?php if($paciente->foto): ?>
									<img class="avatar-img" src="../storage/<?php echo e($paciente->foto); ?>" alt="<?php echo e($paciente->nombre); ?>">
									<?php else: ?>
										<?php if($paciente->sexo == "Masculino"): ?>
										<img src="/assets/img/icons/male.png" alt="">
										<?php else: ?>
										<img src="/assets/img/icons/female.png" alt="">
										<?php endif; ?>
									<?php endif; ?>
								</a>
								<div class="profile-det-info">
									<h3><?php echo e($paciente->nombre); ?> <?php echo e($paciente->apellido_p); ?> <?php echo e($paciente->apellido_m); ?></h3>
									
									<div class="patient-details">
										<h5><b>Patient ID :</b> P- <?php echo e($paciente->id); ?></h5>
										<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> <?php echo e($paciente->calle); ?> <?php echo e($paciente->colonia); ?>, <?php echo e($paciente->cp); ?>, <?php echo e($paciente->estado); ?>, <?php echo e($paciente->pais); ?></h5>
									</div>
								</div>
							</div>
						</div>
						<div class="patient-info">
							<ul>
								<li>Teléfono <span><?php echo e($paciente->telefono); ?></span></li>
								<li>Edad <span><?php echo e($paciente->get_edad()); ?> años, <?php echo e($paciente->sexo); ?></span></li>
								<li>Tipo Sangre <span><?php echo e($paciente->tipo_sangre); ?></span></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /Profile Widget -->
				
				<!-- Last Booking -->
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Ultimas Consultas Rápidas</h4>
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item">
							<div class="media align-items-center">
								<div class="mr-3">
									<img alt="Image placeholder" src="assets/img/doctors/doctor-thumb-02.jpg" class="avatar  rounded-circle">
								</div>
								<div class="media-body">
									<h5 class="d-block mb-0">Dr. Darren Elder </h5>
									<span class="d-block text-sm text-muted">Dentist</span>
									<span class="d-block text-sm text-muted">14 Nov 2019 5.00 PM</span>
								</div>
							</div>
						</li>
						<li class="list-group-item">
							<div class="media align-items-center">
								<div class="mr-3">
									<img alt="Image placeholder" src="assets/img/doctors/doctor-thumb-02.jpg" class="avatar  rounded-circle">
								</div>
								<div class="media-body">
									<h5 class="d-block mb-0">Dr. Darren Elder </h5>
									<span class="d-block text-sm text-muted">Dentist</span>
									<span class="d-block text-sm text-muted">12 Nov 2019 11.00 AM</span>
								</div>
							</div>
						</li>
					</ul>
				</div>
				<!-- /Last Booking -->
				
			</div>

			<div class="col-md-7 col-lg-8 col-xl-9 dct-appoinment">
				<div class="card">
					<div class="card-body pt-0">
						<div class="user-tabs">
							<ul class="nav nav-tabs nav-tabs-bottom nav-justified flex-wrap">
								<li class="nav-item">
									<a class="nav-link active" href="#pat_appointments" data-toggle="tab">Consultas Rápidas</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#pres" data-toggle="tab"><span>Prescription</span></a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#medical" data-toggle="tab"><span class="med-records">Medical Records</span></a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#billing" data-toggle="tab"><span>Billing</span></a>
								</li> 
							</ul>
						</div>
						<div class="tab-content">
							
							<!-- Appointment Tab -->
							<div id="pat_appointments" class="tab-pane fade show active">
								<div class="card card-table mb-0">
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-hover table-center mb-0">
												<thead>
													<tr>
														<th>Doctor</th>
														<th>Motivo</th>
														<th>Diagnóstico</th>
														<th>Fecha</th>
														<th>Acciones</th>
													</tr>
												</thead>
												<tbody>
													<?php if(!empty($consultas)): ?>
														<?php $__currentLoopData = $consultas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consulta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<i style="display: none;" ><?php echo e($fechaInt = strtotime($consulta->created_at)); ?></i>
													<tr>
														<td>
															<h2 class="table-avatar">
																
																<a href="doctor-profile">Dr. <?php echo e($consulta->doctor->nombre); ?> <?php echo e($consulta->doctor->apellido_p); ?> <?php echo e($consulta->doctor->apellido_m); ?>  <span><?php echo e($consulta->doctor->especialidad[0]->nombre); ?> </span></a>
															</h2>
														</td>
														<td><span class="text-primary" ><?php echo e($consulta->motivo->motivo); ?></span></td>
														<td>
															<?php if($consulta->diagnostico_id): ?>
																<?php if(strlen($consulta->diagnostico()->first()->descripcion_4) > 25): ?>
																<span title="<?php echo e($consulta->diagnostico()->first()->descripcion_4); ?>" ><?php echo e(substr($consulta->diagnostico()->first()->descripcion_4, 0, 25) . "..."); ?></span>

																<?php endif; ?>
															<?php else: ?> 
															<?php if(strlen($consulta->diagnostico_str) > 25): ?>
																
																<span title="<?php echo e($consulta->diagnostico_str); ?>" ><?php echo e(substr($consulta->diagnostico_str, 0, 25) . "..."); ?></span>

																<?php endif; ?>
															<?php endif; ?>
														</td>
														<td><?php echo e(date("d M Y", $fechaInt)); ?> <span class="d-block text-info"><?php echo e(date("h:i A", $fechaInt)); ?></span></td>
														<td>
															<a class="btn btn-sm bg-info-light" href="<?php echo e($consulta->receta); ?>" target="_blank" >Ver Receta</a>
															<?php if($consulta->pagado == 0): ?>
																
																<span class="text-danger" >Sin Pagar</span>
															<?php elseif($consulta->pagado == 1): ?>
															<a class="btn btn-sm bg-success-light" href="<?php echo e($consulta->recibo); ?>" target="_blank" >Recibo de Pago</a>
															
															<?php endif; ?>
														
														</td>
													</tr>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													<?php endif; ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<!-- /Appointment Tab -->
							
							<!-- Prescription Tab -->
							<div class="tab-pane fade" id="pres">
								<div class="text-right">
									<a href="add-prescription" class="add-new-btn">Add Prescription</a>
								</div>
								<div class="card card-table mb-0">
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-hover table-center mb-0">
												<thead>
													<tr>
														<th>Date </th>
														<th>Name</th>									
														<th>Created by </th>
														<th></th>
													</tr>     
												</thead>
												<tbody>
													<tr>
														<td>14 Nov 2019</td>
														<td>Prescription 1</td>
														<td>
															<h2 class="table-avatar">
																<a href="doctor-profile" class="avatar avatar-sm mr-2">
																	<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-01.jpg" alt="User Image">
																</a>
																<a href="doctor-profile">Dr. Ruby Perrin <span>Dental</span></a>
															</h2>
														</td>
														<td class="text-right">
															<div class="table-action">
																<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																	<i class="fas fa-print"></i> Print
																</a>
																<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																	<i class="far fa-eye"></i> View
																</a>
															</div>
														</td>
													</tr>
													<tr>
														<td>13 Nov 2019</td>
														<td>Prescription 2</td>
														<td>
															<h2 class="table-avatar">
																<a href="doctor-profile" class="avatar avatar-sm mr-2">
																	<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
																</a>
																<a href="doctor-profile">Dr. Darren Elder <span>Dental</span></a>
															</h2>
														</td>
														<td class="text-right">
															<div class="table-action">
																<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																	<i class="fas fa-print"></i> Print
																</a>
																<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																	<i class="far fa-eye"></i> View
																</a>
																<a href="edit-prescription" class="btn btn-sm bg-success-light">
																	<i class="fas fa-edit"></i> Edit
																</a>
																<a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
																	<i class="far fa-trash-alt"></i> Delete
																</a>
															</div>
														</td>
													</tr>
													<tr>
														<td>12 Nov 2019</td>
														<td>Prescription 3</td>
														<td>
															<h2 class="table-avatar">
																<a href="doctor-profile" class="avatar avatar-sm mr-2">
																	<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-03.jpg" alt="User Image">
																</a>
																<a href="doctor-profile">Dr. Deborah Angel <span>Cardiology</span></a>
															</h2>
														</td>
														<td class="text-right">
															<div class="table-action">
																<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																	<i class="fas fa-print"></i> Print
																</a>
																<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																	<i class="far fa-eye"></i> View
																</a>
															</div>
														</td>
													</tr>
													<tr>
														<td>11 Nov 2019</td>
														<td>Prescription 4</td>
														<td>
															<h2 class="table-avatar">
																<a href="doctor-profile" class="avatar avatar-sm mr-2">
																	<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-04.jpg" alt="User Image">
																</a>
																<a href="doctor-profile">Dr. Sofia Brient <span>Urology</span></a>
															</h2>
														</td>
														<td class="text-right">
															<div class="table-action">
																<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																	<i class="fas fa-print"></i> Print
																</a>
																<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																	<i class="far fa-eye"></i> View
																</a>
															</div>
														</td>
													</tr>
													<tr>
														<td>10 Nov 2019</td>
														<td>Prescription 5</td>
														<td>
															<h2 class="table-avatar">
																<a href="doctor-profile" class="avatar avatar-sm mr-2">
																	<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-05.jpg" alt="User Image">
																</a>
																<a href="doctor-profile">Dr. Marvin Campbell <span>Dental</span></a>
															</h2>
														</td>
														<td class="text-right">
															<div class="table-action">
																<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																	<i class="fas fa-print"></i> Print
																</a>
																<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																	<i class="far fa-eye"></i> View
																</a>
															</div>
														</td>
													</tr>
													<tr>
														<td>9 Nov 2019</td>
														<td>Prescription 6</td>
														<td>
															<h2 class="table-avatar">
																<a href="doctor-profile" class="avatar avatar-sm mr-2">
																	<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-06.jpg" alt="User Image">
																</a>
																<a href="doctor-profile">Dr. Katharine Berthold <span>Orthopaedics</span></a>
															</h2>
														</td>
														<td class="text-right">
															<div class="table-action">
																<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																	<i class="fas fa-print"></i> Print
																</a>
																<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																	<i class="far fa-eye"></i> View
																</a>
															</div>
														</td>
													</tr>
													<tr>
														<td>8 Nov 2019</td>
														<td>Prescription 7</td>
														<td>
															<h2 class="table-avatar">
																<a href="doctor-profile" class="avatar avatar-sm mr-2">
																	<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-07.jpg" alt="User Image">
																</a>
																<a href="doctor-profile">Dr. Linda Tobin <span>Neurology</span></a>
															</h2>
														</td>
														<td class="text-right">
															<div class="table-action">
																<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																	<i class="fas fa-print"></i> Print
																</a>
																<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																	<i class="far fa-eye"></i> View
																</a>
															</div>
														</td>
													</tr>
													<tr>
														<td>7 Nov 2019</td>
														<td>Prescription 8</td>
														<td>
															<h2 class="table-avatar">
																<a href="doctor-profile" class="avatar avatar-sm mr-2">
																	<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-08.jpg" alt="User Image">
																</a>
																<a href="doctor-profile">Dr. Paul Richard <span>Dermatology</span></a>
															</h2>
														</td>
														<td class="text-right">
															<div class="table-action">
																<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																	<i class="fas fa-print"></i> Print
																</a>
																<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																	<i class="far fa-eye"></i> View
																</a>
															</div>
														</td>
													</tr>
													<tr>
														<td>6 Nov 2019</td>
														<td>Prescription 9</td>
														<td>
															<h2 class="table-avatar">
																<a href="doctor-profile" class="avatar avatar-sm mr-2">
																	<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-09.jpg" alt="User Image">
																</a>
																<a href="doctor-profile">Dr. John Gibbs <span>Dental</span></a>
															</h2>
														</td>
														<td class="text-right">
															<div class="table-action">
																<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																	<i class="fas fa-print"></i> Print
																</a>
																<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																	<i class="far fa-eye"></i> View
																</a>
															</div>
														</td>
													</tr>
													<tr>
														<td>5 Nov 2019</td>
														<td>Prescription 10</td>
														<td>
															<h2 class="table-avatar">
																<a href="doctor-profile" class="avatar avatar-sm mr-2">
																	<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-10.jpg" alt="User Image">
																</a>
																<a href="doctor-profile">Dr. Olga Barlow <span>Dental</span></a>
															</h2>
														</td>
														<td class="text-right">
															<div class="table-action">
																<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																	<i class="fas fa-print"></i> Print
																</a>
																<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																	<i class="far fa-eye"></i> View
																</a>
															</div>
														</td>
													</tr>
												</tbody>	
											</table>
										</div>
									</div>
								</div>
							</div>
							<!-- /Prescription Tab -->

							<!-- Medical Records Tab -->
							<div class="tab-pane fade" id="medical">
								<div class="text-right">		
									<a href="#" class="add-new-btn" data-toggle="modal" data-target="#add_medical_records">Add Medical Records</a>
								</div>
								<div class="card card-table mb-0">
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-hover table-center mb-0">
												<thead>
													<tr>
														<th>ID</th>
														<th>Date </th>
														<th>Description</th>
														<th>Attachment</th>
														<th>Created</th>
														<th></th>
													</tr>     
												</thead>
												<tbody>
													<tr>
														<td><a href="javascript:void(0);">#MR-0010</a></td>
														<td>14 Nov 2019</td>
														<td>Dental Filling</td>
														<td><a href="#">dental-test.pdf</a></td>
														<td>
															<h2 class="table-avatar">
																<a href="doctor-profile" class="avatar avatar-sm mr-2">
																	<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-01.jpg" alt="User Image">
																</a>
																<a href="doctor-profile">Dr. Ruby Perrin <span>Dental</span></a>
															</h2>
														</td>
														<td class="text-right">
															<div class="table-action">
																<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																	<i class="fas fa-print"></i> Print
																</a>
																<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																	<i class="far fa-eye"></i> View
																</a>
															</div>
														</td>
													</tr>
													<tr>
														<td><a href="javascript:void(0);">#MR-0009</a></td>
														<td>13 Nov 2019</td>
														<td>Teeth Cleaning</td>
														<td><a href="#">dental-test.pdf</a></td>
														<td>
															<h2 class="table-avatar">
																<a href="doctor-profile" class="avatar avatar-sm mr-2">
																	<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
																</a>
																<a href="doctor-profile">Dr. Darren Elder <span>Dental</span></a>
															</h2>
														</td>
														<td class="text-right">
															<div class="table-action">
																<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																	<i class="fas fa-print"></i> Print
																</a>
																<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																	<i class="far fa-eye"></i> View
																</a>
																<a href="edit-prescription" class="btn btn-sm bg-success-light" data-toggle="modal" data-target="#add_medical_records">
																	<i class="fas fa-edit"></i> Edit
																</a>
																<a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
																	<i class="far fa-trash-alt"></i> Delete
																</a>
															</div>
														</td>
													</tr>
													<tr>
														<td><a href="javascript:void(0);">#MR-0008</a></td>
														<td>12 Nov 2019</td>
														<td>General Checkup</td>
														<td><a href="#">cardio-test.pdf</a></td>
														<td>
															<h2 class="table-avatar">
																<a href="doctor-profile" class="avatar avatar-sm mr-2">
																	<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-03.jpg" alt="User Image">
																</a>
																<a href="doctor-profile">Dr. Deborah Angel <span>Cardiology</span></a>
															</h2>
														</td>
														<td class="text-right">
															<div class="table-action">
																<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																	<i class="fas fa-print"></i> Print
																</a>
																<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																	<i class="far fa-eye"></i> View
																</a>
															</div>
														</td>
													</tr>
													<tr>
														<td><a href="javascript:void(0);">#MR-0007</a></td>
														<td>11 Nov 2019</td>
														<td>General Test</td>
														<td><a href="#">general-test.pdf</a></td>
														<td>
															<h2 class="table-avatar">
																<a href="doctor-profile" class="avatar avatar-sm mr-2">
																	<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-04.jpg" alt="User Image">
																</a>
																<a href="doctor-profile">Dr. Sofia Brient <span>Urology</span></a>
															</h2>
														</td>
														<td class="text-right">
															<div class="table-action">
																<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																	<i class="fas fa-print"></i> Print
																</a>
																<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																	<i class="far fa-eye"></i> View
																</a>
															</div>
														</td>
													</tr>
													<tr>
														<td><a href="javascript:void(0);">#MR-0006</a></td>
														<td>10 Nov 2019</td>
														<td>Eye Test</td>
														<td><a href="#">eye-test.pdf</a></td>
														<td>
															<h2 class="table-avatar">
																<a href="doctor-profile" class="avatar avatar-sm mr-2">
																	<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-05.jpg" alt="User Image">
																</a>
																<a href="doctor-profile">Dr. Marvin Campbell <span>Ophthalmology</span></a>
															</h2>
														</td>
														<td class="text-right">
															<div class="table-action">
																<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																	<i class="fas fa-print"></i> Print
																</a>
																<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																	<i class="far fa-eye"></i> View
																</a>
															</div>
														</td>
													</tr>
													<tr>
														<td><a href="javascript:void(0);">#MR-0005</a></td>
														<td>9 Nov 2019</td>
														<td>Leg Pain</td>
														<td><a href="#">ortho-test.pdf</a></td>
														<td>
															<h2 class="table-avatar">
																<a href="doctor-profile" class="avatar avatar-sm mr-2">
																	<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-06.jpg" alt="User Image">
																</a>
																<a href="doctor-profile">Dr. Katharine Berthold <span>Orthopaedics</span></a>
															</h2>
														</td>
														<td class="text-right">
															<div class="table-action">
																<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																	<i class="fas fa-print"></i> Print
																</a>
																<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																	<i class="far fa-eye"></i> View
																</a>
															</div>
														</td>
													</tr>
													<tr>
														<td><a href="javascript:void(0);">#MR-0004</a></td>
														<td>8 Nov 2019</td>
														<td>Head pain</td>
														<td><a href="#">neuro-test.pdf</a></td>
														<td>
															<h2 class="table-avatar">
																<a href="doctor-profile" class="avatar avatar-sm mr-2">
																	<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-07.jpg" alt="User Image">
																</a>
																<a href="doctor-profile">Dr. Linda Tobin <span>Neurology</span></a>
															</h2>
														</td>
														<td class="text-right">
															<div class="table-action">
																<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																	<i class="fas fa-print"></i> Print
																</a>
																<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																	<i class="far fa-eye"></i> View
																</a>
															</div>
														</td>
													</tr>
													<tr>
														<td><a href="javascript:void(0);">#MR-0003</a></td>
														<td>7 Nov 2019</td>
														<td>Skin Alergy</td>
														<td><a href="#">alergy-test.pdf</a></td>
														<td>
															<h2 class="table-avatar">
																<a href="doctor-profile" class="avatar avatar-sm mr-2">
																	<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-08.jpg" alt="User Image">
																</a>
																<a href="doctor-profile">Dr. Paul Richard <span>Dermatology</span></a>
															</h2>
														</td>
														<td class="text-right">
															<div class="table-action">
																<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																	<i class="fas fa-print"></i> Print
																</a>
																<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																	<i class="far fa-eye"></i> View
																</a>
															</div>
														</td>
													</tr>
													<tr>
														<td><a href="javascript:void(0);">#MR-0002</a></td>
														<td>6 Nov 2019</td>
														<td>Dental Removing</td>
														<td><a href="#">dental-test.pdf</a></td>
														<td>
															<h2 class="table-avatar">
																<a href="doctor-profile" class="avatar avatar-sm mr-2">
																	<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-09.jpg" alt="User Image">
																</a>
																<a href="doctor-profile">Dr. John Gibbs <span>Dental</span></a>
															</h2>
														</td>
														<td class="text-right">
															<div class="table-action">
																<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																	<i class="fas fa-print"></i> Print
																</a>
																<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																	<i class="far fa-eye"></i> View
																</a>
															</div>
														</td>
													</tr>
													<tr>
														<td><a href="javascript:void(0);">#MR-0001</a></td>
														<td>5 Nov 2019</td>
														<td>Dental Filling</td>
														<td><a href="#">dental-test.pdf</a></td>
														<td>
															<h2 class="table-avatar">
																<a href="doctor-profile" class="avatar avatar-sm mr-2">
																	<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-10.jpg" alt="User Image">
																</a>
																<a href="doctor-profile">Dr. Olga Barlow <span>Dental</span></a>
															</h2>
														</td>
														<td class="text-right">
															<div class="table-action">
																<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																	<i class="fas fa-print"></i> Print
																</a>
																<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																	<i class="far fa-eye"></i> View
																</a>
															</div>
														</td>
													</tr>
												</tbody>  	
											</table>
										</div>
									</div>
								</div>
							</div>
							<!-- /Medical Records Tab -->
							
							<!-- Billing Tab -->
							<div class="tab-pane" id="billing">
								<div class="text-right">
									<a class="add-new-btn" href="add-billing">Add Billing</a>
								</div>
								<div class="card card-table mb-0">
									<div class="card-body">
										<div class="table-responsive">
										
											<table class="table table-hover table-center mb-0">
												<thead>
													<tr>
														<th>Invoice No</th>
														<th>Doctor</th>
														<th>Amount</th>
														<th>Paid On</th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>
															<a href="invoice-view">#INV-0010</a>
														</td>
														<td>
															<h2 class="table-avatar">
																<a href="doctor-profile" class="avatar avatar-sm mr-2">
																	<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-01.jpg" alt="User Image">
																</a>
																<a href="doctor-profile">Ruby Perrin <span>Dental</span></a>
															</h2>
														</td>
														<td>$450</td>
														<td>14 Nov 2019</td>
														<td class="text-right">
															<div class="table-action">
																<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																	<i class="fas fa-print"></i> Print
																</a>
																<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																	<i class="far fa-eye"></i> View
																</a>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<a href="invoice-view">#INV-0009</a>
														</td>
														<td>
															<h2 class="table-avatar">
																<a href="doctor-profile" class="avatar avatar-sm mr-2">
																	<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
																</a>
																<a href="doctor-profile">Dr. Darren Elder <span>Dental</span></a>
															</h2>
														</td>
														<td>$300</td>
														<td>13 Nov 2019</td>
														<td class="text-right">
															<div class="table-action">
																<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																	<i class="fas fa-print"></i> Print
																</a>
																<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																	<i class="far fa-eye"></i> View
																</a>
																<a href="edit-billing" class="btn btn-sm bg-success-light">
																	<i class="fas fa-edit"></i> Edit
																</a>
																<a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
																	<i class="far fa-trash-alt"></i> Delete
																</a>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<a href="invoice-view">#INV-0008</a>
														</td>
														<td>
															<h2 class="table-avatar">
																<a href="doctor-profile" class="avatar avatar-sm mr-2">
																	<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-03.jpg" alt="User Image">
																</a>
																<a href="doctor-profile">Dr. Deborah Angel <span>Cardiology</span></a>
															</h2>
														</td>
														<td>$150</td>
														<td>12 Nov 2019</td>
														<td class="text-right">
															<div class="table-action">
																<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																	<i class="fas fa-print"></i> Print
																</a>
																<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																	<i class="far fa-eye"></i> View
																</a>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<a href="invoice-view">#INV-0007</a>
														</td>
														<td>
															<h2 class="table-avatar">
																<a href="doctor-profile" class="avatar avatar-sm mr-2">
																	<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-04.jpg" alt="User Image">
																</a>
																<a href="doctor-profile">Dr. Sofia Brient <span>Urology</span></a>
															</h2>
														</td>
														<td>$50</td>
														<td>11 Nov 2019</td>
														<td class="text-right">
															<div class="table-action">
																<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																	<i class="fas fa-print"></i> Print
																</a>
																<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																	<i class="far fa-eye"></i> View
																</a>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<a href="invoice-view">#INV-0006</a>
														</td>
														<td>
															<h2 class="table-avatar">
																<a href="doctor-profile" class="avatar avatar-sm mr-2">
																	<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-05.jpg" alt="User Image">
																</a>
																<a href="doctor-profile">Dr. Marvin Campbell <span>Ophthalmology</span></a>
															</h2>
														</td>
														<td>$600</td>
														<td>10 Nov 2019</td>
														<td class="text-right">
															<div class="table-action">
																<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																	<i class="fas fa-print"></i> Print
																</a>
																<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																	<i class="far fa-eye"></i> View
																</a>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<a href="invoice-view">#INV-0005</a>
														</td>
														<td>
															<h2 class="table-avatar">
																<a href="doctor-profile" class="avatar avatar-sm mr-2">
																	<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-06.jpg" alt="User Image">
																</a>
																<a href="doctor-profile">Dr. Katharine Berthold <span>Orthopaedics</span></a>
															</h2>
														</td>
														<td>$200</td>
														<td>9 Nov 2019</td>
														<td class="text-right">
															<div class="table-action">
																<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																	<i class="fas fa-print"></i> Print
																</a>
																<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																	<i class="far fa-eye"></i> View
																</a>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<a href="invoice-view">#INV-0004</a>
														</td>
														<td>
															<h2 class="table-avatar">
																<a href="doctor-profile" class="avatar avatar-sm mr-2">
																	<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-07.jpg" alt="User Image">
																</a>
																<a href="doctor-profile">Dr. Linda Tobin <span>Neurology</span></a>
															</h2>
														</td>
														<td>$100</td>
														<td>8 Nov 2019</td>
														<td class="text-right">
															<div class="table-action">
																<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																	<i class="fas fa-print"></i> Print
																</a>
																<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																	<i class="far fa-eye"></i> View
																</a>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<a href="invoice-view">#INV-0003</a>
														</td>
														<td>
															<h2 class="table-avatar">
																<a href="doctor-profile" class="avatar avatar-sm mr-2">
																	<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-08.jpg" alt="User Image">
																</a>
																<a href="doctor-profile">Dr. Paul Richard <span>Dermatology</span></a>
															</h2>
														</td>
														<td>$250</td>
														<td>7 Nov 2019</td>
														<td class="text-right">
															<div class="table-action">
																<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																	<i class="fas fa-print"></i> Print
																</a>
																<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																	<i class="far fa-eye"></i> View
																</a>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<a href="invoice-view">#INV-0002</a>
														</td>
														<td>
															<h2 class="table-avatar">
																<a href="doctor-profile" class="avatar avatar-sm mr-2">
																	<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-09.jpg" alt="User Image">
																</a>
																<a href="doctor-profile">Dr. John Gibbs <span>Dental</span></a>
															</h2>
														</td>
														<td>$175</td>
														<td>6 Nov 2019</td>
														<td class="text-right">
															<div class="table-action">
																<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																	<i class="fas fa-print"></i> Print
																</a>
																<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																	<i class="far fa-eye"></i> View
																</a>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<a href="invoice-view">#INV-0001</a>
														</td>
														<td>
															<h2 class="table-avatar">
																<a href="doctor-profile" class="avatar avatar-sm mr-2">
																	<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-10.jpg" alt="User Image">
																</a>
																<a href="doctor-profile">Dr. Olga Barlow <span>#0010</span></a>
															</h2>
														</td>
														<td>$550</td>
														<td>5 Nov 2019</td>
														<td class="text-right">
															<div class="table-action">
																<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																	<i class="fas fa-print"></i> Print
																</a>
																<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																	<i class="far fa-eye"></i> View
																</a>
															</div>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<!-- Billing Tab -->
									
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

</div>		
            <!-- /Page Content -->
</div>

		<!-- Add Medical Records Modal -->
		<div class="modal fade custom-modal" id="add_medical_records">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title">Medical Records</h3>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<form>					
						<div class="modal-body">
							<div class="form-group">
								<label>Date</label>
								<input type="text" class="form-control datetimepicker" value="31-10-2019">
							</div>
							<div class="form-group">
								<label>Description ( Optional )</label>
								<textarea class="form-control"></textarea>
							</div>
							<div class="form-group">
								<label>Upload File</label> 
								<input type="file" class="form-control">
							</div>	
							<div class="submit-section text-center">
								<button type="submit" class="btn btn-primary submit-btn">Submit</button>
								<button type="button" class="btn btn-secondary submit-btn" data-dismiss="modal">Cancel</button>							
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- /Add Medical Records Modal -->


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
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\pixelar_doc\laravel-files\template\resources\views/doctors/patient-profile.blade.php ENDPATH**/ ?>