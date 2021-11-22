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
		background-color: #fff;
		margin-left: 30px;
		margin-right: 30px;
		font-family: "Poppins",sans-serif;

	}
	body {
		color: #272b41;
		font-size: 0.9375rem;
		height: 100%;
		overflow-x: hidden;

	}
	h1,h2 {
		font-size: 18px;
	}
	p,span {
		font-size: 12px;
	}
	table td.v  {
		border: 1px solid #2c2c2c;
		height: 8px;
		font-size: 8px;
		}
	

	.invoice-content {
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
		color:#2c2c2c;
		font-size:36px;
		font-weight:600;
	}

	.invoice-item .invoice-details {
		text-align:right;
		color:#2c2c2c;
		font-weight:500
	}

	.invoice-item .invoice-details strong {
		color:#2c2c2c
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
		color: #2c2c2c;
		font-weight: 600;
		margin-bottom: 8px;
		display: block

	}

	.invoice-table tr th,
	.invoice-table tr td,
	.invoice-table-two tr th,
	.invoice-table-two tr td {

		color: #2c2c2c;
		font-weight: 600;
		padding: 10px 20px;
		line-height: inherit

	}

	.invoice-table tr td,

	.invoice-table-two tr td {
		color: #2c2c2c;
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
								<td style="width: 25%; text-align: left;" >
									<?php if(auth()->user("doctors")->clinicas->where('activa',1)->first()->tipo_logo == "Imagotipo"): ?>
									<img height="80px" width="160px" src="<?php echo e(auth()->user("doctors")->clinicas->where('activa',1)->first()->logotipo_base64); ?>" />
									<?php else: ?>
									<img height="80px" width="80px" src="<?php echo e(auth()->user("doctors")->clinicas->where('activa',1)->first()->logotipo_base64); ?>" />
									<?php endif; ?>
								</td>

								<td style="width: 50%; text-align: center;"  >
									<h2><?php echo e(auth()->user("doctors")->clinicas->where('activa',1)->first()->nombre_organizacion); ?></h2>
									<p>
										<strong>Dr. <?php echo e($doctor->nombre); ?> <?php echo e($doctor->apellido_p); ?> <?php echo e($doctor->apellido_m); ?></strong>
										<br>
										<?php echo e($doctor->especialidad[0]->nombre); ?><br>
										<strong>Recibo de Pago<br>
									</p>
								</td>
								<td style="width: 25%; text-align: right; "  >
									<?php if($doctor->institucion_logo != ""): ?>
									<?php if($doctor->institucion_tipo_logo == "Imagotipo"): ?>
									<img height="70px" width="150px" src="<?php echo e($doctor->institucion_logo); ?>" />
									<?php else: ?>
									<img height="70px" width="70px" src="<?php echo e($doctor->institucion_logo); ?>" />
									
									<?php endif; ?>
								<?php else: ?>
								<img src="assets/img/medicina.png" height="70px" width="70px" alt="logo" />
								<?php endif; ?>
								</td>
							</tbody>
						</table>
					</div>
					<div style="width: 100%;">
						<table style="width: 100%;">
							<tbody>
								<td style="width: 40%; text-align: left;" >
									<p style="text-align: left;" >
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
						<table>
							<thead>
								<tr style="width: 100%;" >
									<th style="margin: 0;" > Descripción</th>
									<th style="margin: 0;" class="text-center">Tipo</th>
									<th style="margin: 0;" class="text-right">Importe</th>
								</tr>
							</thead>
							<tbody>
								<tr style="width: 100%;">
									<td><?php echo e($tipo_consulta); ?></td>
									<td class="text-center">Consulta</td>
									<td class="text-right"><?php echo e(number_format($costo_consulta)); ?></td>
								</tr>
								<?php if(!empty($extra)): ?>
								<tr style="width: 100%;">
									<td>Monto Extra</td>
									<td class="text-center"><?php echo e($motivo_extra); ?></td>
									<td class="text-right"><?php echo e(number_format($extra)); ?></td>
								</tr>
								<?php endif; ?>
							</tbody>
						</table>
					</div>
				<div class="table-responsive" style="width: 100%; text-align: right;"  >
					<table >
						<tbody>
						<tr>
							<th><span> <strong> Descuento:</strong></span></th>
							<td><span>$<?php echo e(number_format($descuento)); ?></span></td>
						</tr>
						<tr>
							<th><span> <strong> Método:</strong></span></th>
							<td><span><?php echo e($metodo); ?></span></td>
						</tr>
						<tr>
							<th><span> <strong>Subtotal:</strong></span></th>
							<td><span>$<?php echo e(number_format($subtotal)); ?></span></td>
						</tr>
						<tr>
							<th><span> <strong>Total:</strong></span></th>
							<td><span>$<?php echo e(number_format($cobro)); ?></span></td>
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