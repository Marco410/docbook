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

	p,span {

		font-size: 12px;

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
					<div style="width: 100%;">
						<table style="border-bottom:3px solid #3399ff!important;width: 100%;">
							<tbody>
								<td style="width: 25%; text-align: left;" ><img src="assets/img/logo.png" height="65px" width="150px"  alt="logo" /></td>
								<td style="width: 50%; text-align: center;"  >
									<h2><?php echo e(auth()->user("doctors")->clinicas->where('activa',1)->first()->nombre_organizacion); ?></h2>
									<p>
										<strong>Dr. <?php echo e($doctor->nombre); ?> <?php echo e($doctor->apellido_p); ?> <?php echo e($doctor->apellido_m); ?></strong>
										<br>
										<?php echo e($doctor->especialidad[0]->nombre); ?><br>
										<strong>Cédula Profesional:</strong> <?php echo e($doctor->cedula); ?><br>
									</p>
								</td>
								<td style="width: 25%; text-align: right; "  ><img src="assets/img/medicina.png" height="70px" width="70px" alt="logo" /></td>
							</tbody>
						</table>
					</div>
					<div style="width: 100%;">
						<table style="width: 100%;">
							<tbody>
								<td style="width: 40%; text-align: left;" >
									<p class="invoice-details" style="text-align: left;" >
										<strong>Paciente:</strong> <?php echo e($paciente->nombre); ?> <?php echo e($paciente->apellido_p); ?> <?php echo e($paciente->apellido_m); ?> <br>
										<strong>Teléfono:</strong> <?php echo e($paciente->telefono); ?> <br>
										<strong>Dirección:</strong> <?php echo e($paciente->calle); ?>, <?php echo e($paciente->colonia); ?>,<?php echo e($paciente->cp); ?>, <?php echo e($paciente->estado); ?>,<?php echo e($paciente->pais); ?> 
									</p>
								</td>
								<td style="width: 20%; text-align: center;"  >
								</td>
								<td style="width: 40%; text-align: right;"  >
									<p class="invoice-details">
										<strong>Folio:</strong> #<?php echo e($id_consulta); ?> <br>
										<strong>Fecha:</strong> <?php echo e(date("d/m/Y h:i A")); ?>

									</p>
								</td>
							</tbody>
						</table>
					</div>
				</div>
				<!-- Invoice Item -->

			<div style="width: 100%;">
					<div class="table-responsive">
						<table class="invoice-table table table-bordered">
							<thead>
								<tr>
									<th>Descripción</th>
									<th class="text-center">Tipo</th>
									<th class="text-right">Importe</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Consulta Rápida</td>
									<td class="text-center">Consulta</td>
									<td class="text-right"><?php echo e($costo_consulta); ?></td>
								</tr>
								<?php if(!empty($extra)): ?>
								<tr>
									<td>Monto Extra</td>
									<td class="text-center"><?php echo e($motivo_extra); ?></td>
									<td class="text-right"><?php echo e($extra); ?></td>
								</tr>
								<?php endif; ?>
							</tbody>
						</table>
					</div>
				<div class="table-responsive" style="width: 100%; text-align: right;"  >
					<table >
						<tbody>
						<tr>
							<th>Total:</th>
							<td><span>$<?php echo e($cobro); ?></span></td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>
				<!-- /Invoice Item -->
				<!-- Invoice Information -->
				<div style="width: 100%;">
					<table style="width: 100%;" >
						<tbody>
							<td style="width: 50%; text-align: left;"">
								<p>
									<br>
									<?php echo e(auth()->user("doctors")->clinicas->where('activa',1)->first()->calle_consultorio); ?>, <?php echo e(auth()->user("doctors")->clinicas->where('activa',1)->first()->colonia_consultorio); ?>, <?php echo e(auth()->user("doctors")->clinicas->where('activa',1)->first()->ciudad_consultorio); ?><br>
									<?php echo e(auth()->user("doctors")->clinicas->where('activa',1)->first()->estado_consultorio); ?>, <?php echo e(auth()->user("doctors")->clinicas->where('activa',1)->first()->pais_consultorio); ?>, <?php echo e(auth()->user("doctors")->clinicas->where('activa',1)->first()->cp_consultorio); ?>				
								</p>
								<p><strong>Tel:  <?php echo e($doctor->clinicas[0]->tel_consultorio); ?> | Correo: <?php echo e($doctor->email); ?></strong> </p>
							</td>
							<td style="width: 50%; text-align: right;"">
								<p>
									Recibo de Pago <br>
									IMPRESO POR:  <?php echo e($doctor->nombre); ?>	<?php echo e($doctor->apellido_p); ?> <br>
									Fecha de Impreso: <?php echo e(Date("d/m/Y h:i A")); ?>	<br>
									No Expediente: P-<?php echo e($paciente->id); ?>

								</p>
							</td>
						</tbody>

					</table>

				</div>
				<!-- /Invoice Information -->
			</div>
		</div>
	</div>
</div>		
			<!-- /Page Content -->
	</div>
</body>
</html><?php /**PATH D:\xampp\htdocs\pixelar_doc\laravel-files\template\resources\views/ticket-view.blade.php ENDPATH**/ ?>