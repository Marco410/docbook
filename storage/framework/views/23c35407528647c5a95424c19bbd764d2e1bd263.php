<html lang="es" >
<head>
	
<style>
	@import  url('https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,900');

	@font-face {
		font-family: 'Material Icons';
		font-style: normal;
		font-weight: 400;
		src: url(../fonts/MaterialIcons-Regular.eot); /* For IE6-8 */
		src: local('Material Icons'),
		local('MaterialIcons-Regular'),
		url(../fonts/MaterialIcons-Regular.woff2) format('woff2'),
		url(../fonts/MaterialIcons-Regular.woff) format('woff'),
		url(../fonts/MaterialIcons-Regular.ttf) format('truetype');
	}
	html {
		margin: 0px;
	}
	body {
		background-color: #f8f9fa;
		color: #272b41;
		font-family: "Poppins",sans-serif;
		font-size: 0.9375rem;
		height: 100%;
		overflow-x: hidden;
	}
	h1,h2 {
		font-size: 20px;
	}

	h4 {
		font-size: 16px;
		margin: 5px;
		padding: 0;
	}
	p,span,label {
		font-size: 12px;
	}
	input[type=checkbox] {
    transform: scale(0.7);
	}
	table td.v  {
		border: 1px solid #000;
		/* Alto de las celdas */
		height: 8px;
		font-size: 8px;
		}
	.invoice-content {

		background-color: #fff;

		border: 1px solid #f0f0f0;

		border-radius: 4px;

		padding-bottom: 10px;

		padding-right: 20px;

		padding-left: 20px;

	}

	.invoice-item .invoice-logo {

		margin-bottom: 30px;

	}

	.invoice-item .invoice-logo img {
		width: auto;
		max-height: 52px;

	}

	.invoice-item .invoice-text h2 {
		color:#272b41;
		font-size:36px;
		font-weight:600;

	}

	.invoice-item .invoice-details {
		text-align:right;
		color:#757575;
		font-weight:500
	}

	.invoice-item .invoice-details strong {
		color:#272b41
	}

	.invoice-item .invoice-details-two {
		text-align:left
	}

	.invoice-item .invoice-text {
		padding-top:42px;
		padding-bottom:36px
	}

	.invoice-item .invoice-text h2 {
		font-weight:400
	}

	.invoice-info {
		margin-bottom: 30px;
	}

	.invoice-info p {
		margin-bottom: 0;
	}

	.invoice-info.invoice-info2 {
		text-align: right;
	}

	.invoice-item .customer-text {
		font-size: 18px;
		color: #272b41;
		font-weight: 600;
		margin-bottom: 8px;
		display: block

	}

	.invoice-table tr th,
	.invoice-table tr td,
	.invoice-table-two tr th,
	.invoice-table-two tr td {

		color: #272b41;
		font-weight: 600;
		padding: 10px 20px;
		line-height: inherit

	}

	.invoice-table tr td,

	.invoice-table-two tr td {
		color: #757575;
		font-weight: 500;

	}
	.invoice-table-two {
		margin-bottom:0
	}
	.invoice-table-two tr th,
	.invoice-table-two tr td {
		border-top: 0;
	}
	.invoice-table-two tr td {
		text-align: right

	}

	.invoice-info h5 {

		font-size: 16px;

		font-weight: 500;

	}

	.other-info {

		margin-top: 10px;

	}

</style>

</head>
			<!-- Page Content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="invoice-content">
				<div class="invoice-item">
					<div style="width: 100%; margin-bottom: 20px;">
						<table style="border-bottom:3px solid #3399ff!important;width: 100%;">
							<tbody>
								<td style="width: 50%; text-align: left;"  >
									<h2>RESUMEN CLINÍCO</h2>
									<p>
										<strong>Paciente: <?php echo e($paciente->nombre); ?> <?php echo e($paciente->apellido_p); ?> <?php echo e($paciente->apellido_m); ?></strong><br>
										<strong>Edad: <?php echo e($paciente->get_edad()); ?></strong><br>
										<strong>(<?php echo e($paciente->fecha_nacimiento); ?>) | <?php echo e($paciente->sexo); ?></strong><br>
									</p>
								</td>
								<td style="width: 50%; text-align: right;"  >
									<h2><?php echo e(auth()->user("doctors")->clinicas->where('activa',1)->first()->nombre_organizacion); ?></h2>
									<p>
										<strong>Dr. <?php echo e($doctor->nombre); ?> <?php echo e($doctor->apellido_p); ?> <?php echo e($doctor->apellido_m); ?></strong>
										<br>
										 <strong>Especialidad: </strong><?php echo e($doctor->especialidad[0]->nombre); ?><br>
										 <strong>CED.PROF: </strong><?php echo e($doctor->cedula); ?>

									</p>
								</td>
							</tbody>
						</table>
					</div>

					
					
					<div style="width: 100%; margin-bottom: 10px;" >
						<h4>SIGNOS VITALES</h4>
							<table style="border-top:2px solid gray!important;width: 100%" >
								<thead>
									<tr>
										<th style="text-align: left;" > <span> Estatura</span></th>
										<th style="text-align: left;" > <span> Peso</span></th>
										<th style="text-align: left;" > <span> Indice Masa Corporal</span></th>
										<th style="text-align: left;" > <span> Temperatura</span></th>
										<th style="text-align: left;" > <span> Frecuencia Respiratoria</span></th>
										<th style="text-align: left;" > <span> Sistólica</span></th>
										<th style="text-align: left;" > <span> Diastólica</span></th>
										<th style="text-align: left;" > <span> Frecuencia Cardiaca</span></th>
										<th style="text-align: left;" > <span> Porcentaje de Grasa Corporal</span></th>
										<th style="text-align: left;" > <span> IMC</span></th>
										<th style="text-align: left;" > <span> Perimetro Cefálico</span></th>
										<th style="text-align: left;" > <span> Saturación de Oxigeno</span></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" > <span> <?php echo e($paciente->historial[0]->estatura); ?></span></td>
										<td style="Word-break:break-all; Word-wrap:break-Word;" > <span> <?php echo e($paciente->historial[0]->peso); ?></span></td>
										<td style="Word-break:break-all; Word-wrap:break-Word;" > <span> <?php echo e($paciente->historial[0]->masa_corporal); ?></span></td>
										<td style="Word-break:break-all; Word-wrap:break-Word;" > <span><?php echo e($paciente->historial[0]->temperatura); ?></span></td>
										<td style="Word-break:break-all; Word-wrap:break-Word;" > <span> <?php echo e($paciente->historial[0]->frec_respiratoria); ?></span></td>
										<td style="Word-break:break-all; Word-wrap:break-Word;" > <span> <?php echo e($paciente->historial[0]->sistolica); ?></span></td>
										<td style="Word-break:break-all; Word-wrap:break-Word;" > <span> <?php echo e($paciente->historial[0]->diastolica); ?></span></td>
										<td style="Word-break:break-all; Word-wrap:break-Word;" > <span> <?php echo e($paciente->historial[0]->frec_cardiaca); ?></span></td>
										<td style="Word-break:break-all; Word-wrap:break-Word;" > <span> <?php echo e($paciente->historial[0]->grasa_corporal); ?>%</span></td>
										<td style="Word-break:break-all; Word-wrap:break-Word;" > <span> <?php echo e($paciente->historial[0]->masa_muscular); ?></span></td>
										<td style="Word-break:break-all; Word-wrap:break-Word;" > <span> <?php echo e($paciente->historial[0]->cefalico); ?></span></td>
										<td style="Word-break:break-all; Word-wrap:break-Word;" > <span> <?php echo e($paciente->historial[0]->sat_oxigeno); ?></span></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<table style="width: 100%;margin-bottom: 10px;">
						<tbody>
							<td style="width: 50%; text-align: left;">
								<h4>MEDICAMENTOS ACTIVOS</h4>
							<table style="border-top:1px solid gray!important;width: 100%" >
								<thead>
									<tr>
										<th style="text-align: left;" ><span></span></th>
									</tr>
								</thead>
								<tbody>
									<?php if(!empty($paciente->medis)): ?>
									<?php $__currentLoopData = $paciente->medis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" > <label> <input type="checkbox"><?php echo e($medi->medicamento); ?></label></td>
									</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>
								</tbody>
							</table>
							</td>
							<td style="width: 50%; text-align: left;">
								<h4>ALERGIAS</h4>
							<table style="border-top:1px solid gray!important;width: 100%" >
								<thead>
									<tr>
										<th style="text-align: left;" ><span></span></th>
									</tr>
								</thead>
								<tbody>
									
									<?php if(!empty($paciente->alergias()->get())): ?>
									<?php $__currentLoopData = $paciente->alergias()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alergia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" > <label> <input type="checkbox"><?php echo e($alergia->alergia); ?></label></td>
									</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>
								</tbody>
							</table>
							</td>
							
							<td style="width: 50%; text-align: left;"  >
								<h4>VACUNAS</h4>
								<table style="border-top:1px solid gray!important;width: 100%" >
									<thead>
										<tr>
											<th style="text-align: left;" ><span></span></th>
										</tr>
									</thead>
									<tbody>
										<?php if(!empty($paciente->vacunas)): ?>
										<?php $__currentLoopData = $paciente->vacunas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vacuna): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr>
											<td style="Word-break:break-all; Word-wrap:break-Word;" >   <label> <input type="checkbox"><?php echo e($vacuna->vacuna); ?></label></td>
										</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php endif; ?>
									</tbody>
								</table>
							</td>

						</tbody>
					</table>

					<table style="width: 100%;margin-bottom: 10px;">
						<tbody>
							<td style="width: 50%; text-align: left;">
								<h4>PATOLÓGICOS</h4>
							<table style="border-top:1px solid gray!important;width: 100%" >
								<thead>
									<tr>
										<th style="text-align: left;" ><span></span></th>
									</tr>
								</thead>
								<tbody>
									<?php if($paciente->historial[0]->hospi == "Si"): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" > <label> <input type="checkbox" >Hospitalización Previa</label></td>
									</tr>
									<?php endif; ?>										
									<?php if($paciente->historial[0]->cirugia == "Si"): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" > <label> <input type="checkbox" >Cirugías Previas</label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->diabetes == "Si"): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" > <label> <input type="checkbox" >Diabetes</label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->tiroideas == "Si"): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" > <label> <input type="checkbox" >Enfermedades Tiroideas</label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->hipertension == "Si"): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" > <label> <input type="checkbox" >Hipertensión Arterial</label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->cardio == "Si"): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" > <label> <input type="checkbox" >Cardiopatias</label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->trauma == "Si"): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" > <label> <input type="checkbox" >Traumatismos</label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->cancer == "Si"): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" > <label> <input type="checkbox" >Cáncer</label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->tuberculosis == "Si"): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" > <label> <input type="checkbox" >Tuberculosis</label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->trans == "Si"): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" > <label> <input type="checkbox" >Transfusiones</label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->pato_respiratorias == "Si"): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" > <label> <input type="checkbox" >Patologías Respiratorias</label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->pato_gastro == "Si"): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" > <label> <input type="checkbox" >Patologías Gastrointestinales</label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->sexual == "Si"): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" > <label> <input type="checkbox" >Enfermedades de Transmisión Sexual</label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->pato_otros != null): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" > <label> <input type="checkbox" ><?php echo e($paciente->historial[0]->pato_otros); ?></label></td>
									</tr>
									<?php endif; ?>

								</tbody>
							</table>
							</td>
							<td style="width: 50%; text-align: left;">
								<h4>NO PATOLÓGICOS</h4>
							<table style="border-top:1px solid gray!important;width: 100%" >
								<thead>
									<tr>
										<th style="text-align: left;" ><span></span></th>
									</tr>
								</thead>
								<tbody>
									<?php if($paciente->historial[0]->fisica == "Si"): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" > <label> <input type="checkbox" >Actividad Fisica</label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->tabaco == "Si"): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" > <label> <input type="checkbox" >Tabaquismo</label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->alcohol == "Si"): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" > <label> <input type="checkbox" >Alcoholismo</label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->sustancias == "Si"): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" > <label> <input type="checkbox" >Uso de otras sustancias (Drogas)</label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->vacuna_reciente == "Si"): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" > <label> <input type="checkbox" >Vacuna o Inmunización reciente</label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->npato_otros != null): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" > <label> <input type="checkbox" ><?php echo e($paciente->historial[0]->npato_otros); ?></label></td>
									</tr>
									<?php endif; ?>

								</tbody>
							</table>
							</td>
						</tbody>
					</table>


					<table style="width: 100%;">
						<tbody>
							<td style="width: 50%; text-align: left;">
								<h4>HEREDOFAMILIARES</h4>
							<table style="border-top:1px solid gray!important;width: 100%" >
								<thead>
									<tr>
										<th style="text-align: left;" ><span></span></th>
									</tr>
								</thead>
								<tbody>
									<?php if($paciente->historial[0]->heredo_diabetes == "Si"): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" ><label> <input type="checkbox" >Diabetes</label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->h_cardio == "Si"): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" ><label> <input type="checkbox" >Cardiopatías</label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->h_hipertension == "Si"): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" ><label> <input type="checkbox" >Hipertensión Arterial</label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->h_tiroideas == "Si"): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" ><label> <input type="checkbox" >Enfermedades Tiroideas</label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->heredo_otros != null): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" > <label> <input type="checkbox" ><?php echo e($paciente->historial[0]->heredo_otros); ?></label></td>
									</tr>
									<?php endif; ?>
								</tbody>
							</table>
							</td>

							<td style="width: 50%; text-align: left;">
								<h4>DIETA NUTRIOLÓGICA</h4>
							<table style="border-top:1px solid gray!important;width: 100%" >
								<thead>
									<tr>
										<th style="text-align: left;" ><span></span></th>
									</tr>
								</thead>
								<tbody>
									<?php if($paciente->historial[0]->desayuno == "Si"): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" ><label> <input type="checkbox" >Desayuno</label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->colacion == "Si"): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" ><label> <input type="checkbox" >Colación en la mañana</label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->comida == "Si"): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" ><label> <input type="checkbox" >Comida</label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->colacion_tarde == "Si"): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" ><label> <input type="checkbox" >Colación en la tarde</label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->cena == "Si"): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" ><label> <input type="checkbox" >Cena</label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->alimentos_casa == "Si"): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" ><label> <input type="checkbox" >Alimentos preparados en casa</label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->apetito != null): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" ><label> <input type="checkbox" >Apetito: <?php echo e($paciente->historial[0]->apetito); ?></label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->hambre == "Si"): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" ><label> <input type="checkbox" >Presencia de hambre-ansiedad</label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->vasos != null): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" ><label> <input type="checkbox" >Vasos de agua al día: <?php echo e($paciente->historial[0]->vasos); ?></label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->prefer_alimentos != null): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" > <label> <input type="checkbox" ><?php echo e($paciente->historial[0]->prefer_alimentos); ?></label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->malestares == "Si"): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" ><label> <input type="checkbox" >Malestares por alimentos</label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->complementos == "Si"): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" ><label> <input type="checkbox" >Medicamentos, complementos o suplementos</label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->otras_dietas == "Si"): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" ><label> <input type="checkbox" >Otras dietas realizadas
										</label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->peso_ideal != null): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" ><label> <input type="checkbox" ><?php echo e($paciente->historial[0]->peso_ideal); ?></label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->padecimiento_peso == "Si"): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" ><label> <input type="checkbox" >Padecimiento atual relacionado al peso</label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->antecedentes_peso == "Si"): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" ><label> <input type="checkbox" >Antecedentes personales relacionados al peso</label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->consumo_liquidos == "Si"): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" ><label> <input type="checkbox" >Consumo de liquidos</label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->educacion_nutri == "Si"): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" ><label> <input type="checkbox" >Educación Nutriológica</label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->nutri_otros != null): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" ><label> <input type="checkbox" ><?php echo e($paciente->historial[0]->nutri_otros); ?></label></td>
									</tr>
									<?php endif; ?>

									
								</tbody>
							</table>
							</td>
						</tbody>
					</table>

					<table style="width: 100%; margin-bottom: 10px;">
						<tbody>
							<td style="width: 50%; text-align: left;">
								<h4>PSIQUIÁTRICOS</h4>
							<table style="border-top:1px solid gray!important;width: 100%" >
								<thead>
									<tr>
										<th style="text-align: left;" ><span></span></th>
									</tr>
								</thead>
								<tbody>
									<?php if($paciente->historial[0]->historia_familiar != null): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" ><label> <input type="checkbox" >Historia Familiar: <?php echo e($paciente->historial[0]->historia_familiar); ?></label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->conciencia == "Si"): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" ><label> <input type="checkbox" >Conciencia de enfermedad</label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->psiqui_areas != null): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" ><label> <input type="checkbox" >Áreas afectadas por la enfermedad: <?php echo e($paciente->historial[0]->psiqui_areas); ?></label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->psiqui_tratamientos != null): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" ><label> <input type="checkbox" >Tratamientos pasados y actuales: <?php echo e($paciente->historial[0]->psiqui_tratamientos); ?></label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->psiqui_apoyo == "Si"): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" ><label> <input type="checkbox" >Apoyo del grupo familiar o social</label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->psiqui_grupo_familiar != null): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" ><label> <input type="checkbox" >Grupo familiar del paciente: <?php echo e($paciente->historial[0]->psiqui_grupo_familiar); ?></label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->psiqui_vida_social != null): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" ><label> <input type="checkbox" >Aspectos de la vida social: <?php echo e($paciente->historial[0]->psiqui_vida_social); ?></label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->psiqui_vida_laboral != null): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" ><label> <input type="checkbox" >Aspectos de la vida laboral: <?php echo e($paciente->historial[0]->psiqui_vida_laboral); ?></label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->psiqui_autoridad != null): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" ><label> <input type="checkbox" >Relación con la autoridad: <?php echo e($paciente->historial[0]->psiqui_autoridad); ?></label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->psiqui_impulsos != null): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" ><label> <input type="checkbox" >Control de los impulsos: <?php echo e($paciente->historial[0]->psiqui_impulsos); ?></label></td>
									</tr>
									<?php endif; ?>
									<?php if($paciente->historial[0]->psiqui_frustracion != null): ?>
									<tr>
										<td style="Word-break:break-all; Word-wrap:break-Word;" ><label> <input type="checkbox" >Manejo de frustración en su vida: <?php echo e($paciente->historial[0]->psiqui_frustracion); ?></label></td>
									</tr>
									<?php endif; ?>

								</tbody>
							</table>
							</td>
						</tbody>
					</table>

					<table style="width: 100%; margin-bottom: 10px; border-top:1px solid gray!important">
						<tbody>
							<td style="width: 100%; text-align: left;">
								<h4>NOTAS DEL HISTORIAL</h4>
								<table style="border-top:1px solid gray!important;width: 100%" >
									<thead>
										<tr>
											<th style="text-align: left;" ><span></span></th>
										</tr>
									</thead>
									<tbody>
										<?php if($paciente->historial[0]->notas_historial != null): ?>
										<tr>
											<td style="Word-break:break-all; Word-wrap:break-Word;" ><label><?php echo $paciente->historial[0]->notas_historial; ?></label></td>
										</tr>
										<?php endif; ?>
									</tbody>
								</table>
							</td>
						</tbody>
					</table>


					<div style="width: 100%;">
						<table style="width: 100%;" >
							<tbody>
								<td style="width: 100%; text-align: center;"">
									<p>
										<br>
										<?php echo e(auth()->user("doctors")->clinicas->where('activa',1)->first()->calle_consultorio); ?>, <?php echo e(auth()->user("doctors")->clinicas->where('activa',1)->first()->colonia_consultorio); ?>, <?php echo e(auth()->user("doctors")->clinicas->where('activa',1)->first()->ciudad_consultorio); ?><br>
										<?php echo e(auth()->user("doctors")->clinicas->where('activa',1)->first()->estado_consultorio); ?>, <?php echo e(auth()->user("doctors")->clinicas->where('activa',1)->first()->pais_consultorio); ?>, <?php echo e(auth()->user("doctors")->clinicas->where('activa',1)->first()->cp_consultorio); ?>				
									</p>
									<p><strong>Tel:  <?php echo e($doctor->clinicas[0]->tel_consultorio); ?> | Correo: <?php echo e($doctor->email); ?></strong> </p>
									<p>
										Reporte de diario<br>
										IMPRESO POR:  <?php echo e($doctor->nombre); ?>	<?php echo e($doctor->apellido_p); ?> <br>
										Fecha de Impreso: <?php echo e(Date("d/m/Y h:i A")); ?>	<br>
										Este documento no es un comprobante fiscal
									</p>
								</td>
							</tbody>
	
						</table>
					</div>



				</div>
				<!-- /Invoice Information -->
			</div>
		</div>
	</div>
</div>		
			<!-- /Page Content -->
	</div>
</body>
</html><?php /**PATH D:\xampp\htdocs\pixelar_doc\laravel-files\template\resources\views/report-view-resumen.blade.php ENDPATH**/ ?>