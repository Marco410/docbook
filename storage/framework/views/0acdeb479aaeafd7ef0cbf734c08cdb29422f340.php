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
	}
	body {
		color: #272b41;
		font-family: "Poppins",sans-serif;
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
								<td style="width: 100%; text-align: center;"  >
									<h2><?php echo e(auth()->user("doctors")->clinicas->where('activa',1)->first()->nombre_organizacion); ?></h2>
									<p>
										<strong>Dr. <?php echo e($doctor->nombre); ?> <?php echo e($doctor->apellido_p); ?> <?php echo e($doctor->apellido_m); ?></strong>
										<br>
										<?php echo e($doctor->especialidad[0]->nombre); ?>  <br>
										<strong>Reporte de caja detallado</strong> <br>
										<?php if($fecha_ini != ""): ?>
										<strong>Entre las Fechas</strong>
										<?php echo e($fecha_ini); ?> a <?php echo e($fecha_fin); ?>

										<?php endif; ?>
										
									</p>
								</td>
							</tbody>
						</table>
					</div>
					<div style="width: 100%;">
						<table style="width: 100%;">
							<tbody>
								<td style="width: 25%; text-align: left;" >
									<p class="invoice-details" style="text-align: left;" >
										<strong>Identificador de Caja:</strong> <?php echo e($caja_id); ?><br>
										<strong>Monto de Apertura:</strong> $<?php echo e(number_format($apertura)); ?> <br>
										<strong>Entradas</strong> $<?php echo e(number_format($entradas)); ?> <br>
										<strong>Salidas</strong> $<?php echo e(number_format($salidas)); ?> <br>
									</p>
									<p>
										<strong>Saldo en Caja: </strong> $<?php echo e(number_format($total)); ?> 
									</p>
								</td>
								<td style="width: 25%; text-align: left;" >
									
									<p class="invoice-details" style="text-align: left;" >
										<strong>-Entradas-</strong><br>
										<strong>Efectivo:</strong> $<?php echo e(number_format($efectivo)); ?><br>
										<strong>Tarjeta:</strong> $<?php echo e(number_format($tarjeta)); ?> <br>
										<strong>Transferencia: </strong> $<?php echo e(number_format($transferencia)); ?> 
									</p>
								</td>
								<td style="width: 25%; text-align: left;" >
									<p class="invoice-details" style="text-align: left;" >
										<strong>-Salidas-</strong> <br>	
										<strong>Efectivo:</strong> $<?php echo e(number_format($efectivoS)); ?><br>
										<strong>Tarjeta:</strong> $<?php echo e(number_format($tarjetaS)); ?> <br>
										<strong>Transferencia: </strong> $<?php echo e(number_format($transferenciaS)); ?> <br>
										
									</p>
								</td>
							
							</tbody>
						</table>
					</div>
					<div style="width: 100%;" >
					<h4>Movimientos</h4>
						<table style="width: 100%" >
							<thead>
								<tr>
									<th style="text-align: left;" > <span> Movimiento</span></th>
									<th style="text-align: left;" > <span> Descripción</span></th>
									<th style="text-align: left;" > <span> Importe</span></th>
									<th style="text-align: left;" > <span> Método de Pago</span></th>
									<th style="text-align: left;" > <span> Observaciones</span></th>
									<th style="text-align: left;" > <span> Fecha</span></th>
								</tr>
							</thead>
							<tbody>
								<?php $__currentLoopData = $pagos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pago): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td style="Word-break:break-all; Word-wrap:break-Word;" > <span> <?php echo e($pago->tipo_movimiento); ?></span></td>
									<td style="Word-break:break-all; Word-wrap:break-Word;" > <span> <?php echo e($pago->descripcion); ?></span></td>
									<td style="Word-break:break-all; Word-wrap:break-Word;" > <span> $<?php echo e(number_format($pago->importe)); ?></span></td>
									<td style="Word-break:break-all; Word-wrap:break-Word;" > <span> <?php echo e($pago->metodo_pago); ?></span></td>
									<td style="Word-break:break-all; Word-wrap:break-Word;" > <span> <?php echo e($pago->observaciones); ?></span></td>
									<td style="Word-break:break-all; Word-wrap:break-Word;" > <span> <?php echo e($pago->created_at); ?></span></td>
									
								</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									
							</tbody>
						</table>
					</div>
					<?php if(!empty($cajas)): ?>
					<h4>Cajas Cerradas</h4>
					<div style="width: 100%;" >
						<table style="width: 100%" >
							<thead>
								<tr>
									<th style="text-align: left;" > <span> Identificador</span></th>
									<th style="text-align: left;" > <span> Apertura</span></th>
									<th style="text-align: left;" > <span> Entradas</span></th>
									<th style="text-align: left;" > <span> Salidas</span></th>
									<th style="text-align: left;" > <span> Ventas Efectivo</span></th>
									<th style="text-align: left;" > <span> Ventas Tarjeta</span></th>
									<th style="text-align: left;" > <span> Ventas Transferencia</span></th>
									<th style="text-align: left;" > <span> Total</span></th>
									<th style="text-align: left;" > <span> Abierta</span></th>
									<th style="text-align: left;" > <span> Cerrada</span></th>
								</tr>
							</thead>
							<tbody>
								<?php $__currentLoopData = $cajas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $caja): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td style="Word-break:break-all; Word-wrap:break-Word;" > <span> #<?php echo e($caja->id); ?></span></td>
									<td style="Word-break:break-all; Word-wrap:break-Word;" > <span> $<?php echo e(number_format($caja->apertura)); ?></span></td>
									<td style="Word-break:break-all; Word-wrap:break-Word;" > <span> $<?php echo e(number_format($caja->entradas)); ?></span></td>
									<td style="Word-break:break-all; Word-wrap:break-Word;" > <span> $<?php echo e(number_format($caja->salidas)); ?></span></td>
									<td style="Word-break:break-all; Word-wrap:break-Word;" > <span> $<?php echo e(number_format($caja->ventas_efectivo)); ?></span></td>
									<td style="Word-break:break-all; Word-wrap:break-Word;" > <span> $<?php echo e(number_format($caja->ventas_tarjeta)); ?></span></td>
									<td style="Word-break:break-all; Word-wrap:break-Word;" > <span> $<?php echo e(number_format($caja->ventas_transferencia)); ?></span></td>
									<td style="Word-break:break-all; Word-wrap:break-Word;" > <span> $<?php echo e(number_format($caja->total)); ?></span></td>
									<td style="Word-break:break-all; Word-wrap:break-Word;" > <span> <?php echo e($caja->created_at); ?></span></td>
									<td style="Word-break:break-all; Word-wrap:break-Word;" > <span> <?php echo e($caja->updated_at); ?></span></td>
									
								</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									
							</tbody>
						</table>
					</div>
						
					<?php endif; ?>
				</div>

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
									Reporte de caja detallado<br>
									IMPRESO POR:  <?php echo e($doctor->nombre); ?>	<?php echo e($doctor->apellido_p); ?> <br>
									Fecha de Impreso: <?php echo e(Date("d/m/Y h:i A")); ?>	<br>
									Este documento no es un comprobante fiscal
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
</html><?php /**PATH D:\xampp\htdocs\pixelar_doc\laravel-files\template\resources\views/report-view-global.blade.php ENDPATH**/ ?>